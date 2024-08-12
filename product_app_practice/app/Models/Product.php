<?php

namespace App\Models;

use App\Config;
use App\Model;

use App\Entity\Product as ProductEntity;
use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;
use Dotenv\Dotenv;

class Product extends Model
{
    private EntityManager $entityManager;
    private Config $config;

    private ?int $id = null;
    private ?string $title = null;
    private ?string $description = null;
    private ?float $price = null;
    private ?string $imagePath = null;
    private ?array $imageFile = null;

    public function __construct()
    {
        parent::__construct();

        // Leads to .env file
        $dotenv = Dotenv::createImmutable(__DIR__ . "/../../");
        $dotenv->load();

        $this->config = new Config($_ENV);

        $this->entityManager = new EntityManager(
            DriverManager::getConnection($this->config->db),
            ORMSetup::createAttributeMetadataConfiguration([
                __DIR__ . '/../Entity',
            ])
        );
    }

    public function load(array $productData)
    {
        $this->title = $productData["title"] ?? null;
        $this->description = $productData["title"] ?? null;
        $this->imageFile = $productData["imageFile"] ?? null;
        $this->imagePath = $productData["imagePath"] ?? null;
        $this->price = (float) $productData["price"] ?? null;
    }

    public function saveProduct()
    {
        $errors = [];

        if (empty($this->title)) {
            $errors["noTitleError"] = "Title is required.";
        }

        if (empty($this->price)) {
            $errors["noPriceError"] = "Price is required.";
        }

        // Creates a storage directory
        if (!is_dir(__DIR__ . "/../../public/storage/images")) {
            mkdir(__DIR__ . "/../../public/storage/images");
        }

        if (empty($errors)) {
            if ($this->imageFile && $this->imageFile["tmp_name"]) {
                // Setting imagePath in reference to public
                $this->imagePath = "/storage/images/" . uniqid("product_") . "/" . $this->imageFile["name"];

                // Setting destination path relative to current file
                $destinationPath = __DIR__ . "/../../public" . $this->imagePath;

                $product = (new ProductEntity())
                    ->setTitle($this->title)
                    ->setDescription($this->description)
                    ->setImage($this->imagePath)
                    ->setPrice($this->price);

                // echo "<pre>";
                // var_dump($product);
                // echo "</pre>";
                // exit;

                mkdir(dirname($destinationPath));
                move_uploaded_file($this->imageFile["tmp_name"], $destinationPath);

                $this->entityManager->persist($product);
                $this->entityManager->flush();
            }
        }

        return $errors;
    }

    public function allProducts()
    {
        // return $this->db->createQueryBuilder()
        //     ->select("*")
        //     ->from("products")
        //     ->fetchAllAssociative();

        //* Using query builder to map records to Product entity
        $queryBuilder = $this->entityManager->createQueryBuilder();
        $query = $queryBuilder
            ->select("i")
            ->from(ProductEntity::class, "i")
            ->getQuery();

        return $query->getResult();
    }

    public function getProductById(int $id)
    {
        $queryBuilder = $this->entityManager->createQueryBuilder();
        $query = $queryBuilder
            ->select("i")
            ->from(ProductEntity::class, "i")
            ->where(
                $queryBuilder->expr()->eq("i.id", ":id")
            )
            ->setParameter("id", $id)
            ->getQuery();

        return $query->getSingleResult();
    }

    // TODO: edit product
    // TODO: remove product POST function
}