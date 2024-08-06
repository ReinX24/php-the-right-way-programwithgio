<?php

declare(strict_types=1);

// use App\App;
// use App\Models\Invoice;
// use App\Config;
// use App\Container;
// use App\Controllers\GeneratorExampleController;
// use App\Controllers\HomeController;
// use App\Controllers\InvoiceController;
// use App\Router;

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

use App\Invoice;
use App\SalesTaxCalculator;

(new Invoice(new SalesTaxCalculator()))->create(
    [
        ["description" => "Item 1", "quantity" => 1, "unitPrice" => 15.25],
        ["description" => "Item 2", "quantity" => 2, "unitPrice" => 2],
        ["description" => "Item 3", "quantity" => 3, "unitPrice" => 0.25],
    ]
);

// define('STORAGE_PATH', __DIR__ . '/../storage');
// define('VIEW_PATH', __DIR__ . '/../views');

// $container = new Container();
// $router = new Router($container);

// $router->registerRoutesFromControllerAttributes(
//     [
//         HomeController::class,
//         GeneratorExampleController::class,
//         InvoiceController::class
//     ]
// );


// (new App(
//     $container,
//     $router,
//     ['uri' => $_SERVER['REQUEST_URI'], 'method' => $_SERVER['REQUEST_METHOD']],
//     new Config($_ENV)
// ))->run();
