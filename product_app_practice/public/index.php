<?php

declare(strict_types=1);

use App\App;
use App\Config;

use App\Controllers\GeneratorExampleController;
use App\Controllers\HomeController;
use App\Controllers\InvoiceController;
use App\Controllers\ProductController;
use App\Controllers\UserController;
use App\Router;
use Illuminate\Container\Container;

require_once __DIR__ . "/../vendor/autoload.php";

define('STORAGE_PATH', __DIR__ . '/../storage');
define('VIEW_PATH', __DIR__ . '/../views');

$container = new Container();
$router = new Router($container);

$router->registerRoutesFromControllerAttributes(
    [
            // HomeController::class,
        ProductController::class
        // GeneratorExampleController::class,
        // InvoiceController::class,
        // UserController::class
    ]
);

(
    new App(
        $container,
        $router,
        ['uri' => $_SERVER['REQUEST_URI'], 'method' => $_SERVER['REQUEST_METHOD']],
    )
)->boot()->run();
