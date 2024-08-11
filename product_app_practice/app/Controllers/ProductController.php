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
    public function __construct(private ProductModel $product)
    {
    }

    #[Get("/")]
    #[Route("/home", HttpMethod::Get)]
    public function index()
    {
        $allProducts = $this->product->allProducts();

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

        $this->product->load($formData);
        $errors = $this->product->saveProduct();

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
}