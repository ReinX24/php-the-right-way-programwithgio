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

    public function addProduct(array $postData)
    {
        $errors = [];

        $title = $postData["title"];
        $description = $postData["title"];
        $image = $postData["image"];
        $price = $postData["amount"];

        // TODO: check for empty fields and return errors if there are any
        if (empty($errors)) {
            $product = (new ProductEntity())
                ->setTitle($title)
                ->setDescription($description)
                ->setImage($image)
                ->setPrice($price);

            // $this->entityManager->persist($product);
            // $this->entityManager->flush();
        }

        return $errors;
    }

    // TODO: edit product
    // TODO: remove product
}