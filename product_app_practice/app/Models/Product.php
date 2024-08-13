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
    private ?array $newImage = null;
    private ?string $existingImagePath = null;
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
        $this->id = $productData["id"] ?? null;
        $this->title = $productData["title"] ?? null;
        $this->description = $productData["description"] ?? null;
        $this->newImage = $productData["newImage"] ?? null;
        $this->existingImagePath = $productData["existingImagePath"] ?? null;
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

            $imagePath = null;

            if ($this->newImage && $this->newImage["tmp_name"]) {
                // If an image is already set for the object and we want to 
                // update the image
                if ($this->newImage && !empty($this->existingImagePath)) {
                    unlink(__DIR__ . "/../../public" . $this->existingImagePath);
                }

                // Setting imagePath in reference to public
                $imagePath = "/storage/images/" . uniqid("product_") . "/" . $this->newImage["name"];

                // Setting destination path relative to current file
                $destinationPath = __DIR__ . "/../../public" . $imagePath;

                mkdir(dirname($destinationPath));
                move_uploaded_file($this->newImage["tmp_name"], $destinationPath);
            }

            if ($this->id) {
                // If an id is passed to the class, update
                $product = $this->getProductById($this->id);

                $product->setTitle($this->title);
                $product->setDescription($this->description);
                $product->setImage($imagePath ?? null);
                $product->setPrice($this->price);
            } else {
                // Create new product
                $product = (new ProductEntity())
                    ->setTitle($this->title)
                    ->setDescription($this->description)
                    ->setImage($imagePath ?? null)
                    ->setPrice($this->price);
            }

            $this->entityManager->persist($product);
            $this->entityManager->flush();
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

    public function editProduct()
    {
        // TODO: unlink and change the photo of product if new image is uploaded
    }

    public function deleteProductById(int $id)
    {
        $queryBuilder = $this->entityManager->createQueryBuilder();
        $query = $queryBuilder
            ->delete(ProductEntity::class, "i")
            ->where(
                $queryBuilder->expr()->eq("i.id", ":id")
            )
            ->setParameter("id", $id)
            ->getQuery();

        $query->execute();
    }
}