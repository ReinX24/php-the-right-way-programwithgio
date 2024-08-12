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

        return View::make(
            "index",
            ["page" => "Home", "products" => $allProducts]
        );
    }

    #[Get("/add")]
    public function addGet()
    {
        return View::make("add", ["page" => "Add Product"]);
    }

    #[Post("/add")]
    public function addPost()
    {
        $errors = [];

        $formData = [
            "title" => $_POST["title"],
            "description" => $_POST["description"],
            "imageFile" => $_FILES["image"],
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
        return View::make(
            "add",
            [
                "page" => "Add Product",
                "formData" => $formData,
                "errors" => $errors
            ]
        );
    }

    #[Get("/delete")]
    public function deletePost()
    {
        $id = $_GET["id"];

        // Go back to the index of no id is provided
        if (empty($id)) {
            header("Location: /");
        }

        $result = $this->productModel->getProductById((int) $id);
        return View::make(
            "delete",
            [
                "page" => "Delete Product",
                "product" => $result
            ]
        );
    }
}