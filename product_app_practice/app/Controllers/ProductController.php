<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Attributes\Get;
use App\Attributes\Post;
use App\Attributes\Route;
use App\Enums\HttpMethod;
use App\Models\Product as ProductModel;
use App\View;
use Carbon\Exceptions\UnknownSetterException;
use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

class ProductController
{
    public function __construct(private ProductModel $productModel)
    {
    }

    #[Get("/")]
    #[Route("/home", HttpMethod::Get)]
    public function index()
    {
        $allProducts = $this->productModel->allProducts();

        // echo "<pre>";
        // var_dump($allProducts[0]->getTitle());
        // echo "</pre>";
        // exit;

        View::make(
            "products/index",
            ["page" => "Home", "products" => $allProducts]
        );
    }

    #[Get("/add")]
    public function addGet()
    {
        View::make("products/add", ["page" => "Add Product"]);
    }

    #[Post("/add")]
    public function addPost()
    {
        $errors = [];

        $formData = [
            "title" => $_POST["title"],
            "description" => $_POST["description"],
            "newImage" => $_FILES["image"],
            "price" => $_POST["price"],
        ];

        $this->productModel->load($formData);
        $errors = $this->productModel->saveProduct();

        // If there are no errors, return to the index page
        if (empty($errors)) {
            header("Location: /");
            exit;
        }

        // If there are errors, return to the add page
        View::make(
            "products/add",
            [
                "page" => "Add Product",
                "formData" => $formData,
                "errors" => $errors
            ]
        );
    }

    #[Get("/edit")]
    public function editGet()
    {
        $id = $_GET["id"];

        if (empty($id)) {
            header("Location: /");
        }

        $result = $this->productModel->getProductById((int) $id);
        View::make(
            "products/edit",
            [
                "page" => "Delete Product",
                "product" => $result
            ]
        );
    }

    #[Post("/edit")]
    public function editPost()
    {
        $errors = [];

        // echo "<pre>";
        // var_dump($_POST);
        // var_dump($_FILES);
        // echo "</pre>";
        // exit;

        $formData = [
            "id" => $_POST["id"],
            "title" => $_POST["title"],
            "description" => $_POST["description"],
            "newImage" => $_FILES["image"] ?? null,
            "price" => $_POST["price"],
            "existingImagePath" => $_POST["existingImage"]
        ];


        $this->productModel->load($formData);

        $this->productModel->editProduct();
    }

    #[Get("/delete")]
    public function deleteGet()
    {
        $id = $_GET["id"];

        // Go back to the index of no id is provided
        if (empty($id)) {
            header("Location: /");
        }

        $result = $this->productModel->getProductById((int) $id);
        View::make(
            "products/delete",
            [
                "page" => "Delete Product",
                "product" => $result
            ]
        );
    }

    #[Post("/delete")]
    public function deletePost()
    {
        $id = (int) $_POST["id"];

        $this->productModel->deleteProductById($id);

        header("Location: /");
    }
}