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
        $errors = $this->product->addProduct($_POST);
    }
}