<?php

declare(strict_types=1);

use App\App;
use App\Config;
use App\Container;
use App\Controllers\GeneratorExampleController;
use App\Controllers\HomeController;
use App\Router;

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

define('STORAGE_PATH', __DIR__ . '/../storage');
define('VIEW_PATH', __DIR__ . '/../views');

$container = new Container();
$router = new Router($container);

// Registering routes using their controllers
$router->registerRoutesFromControllerAttributes(
    [
        HomeController::class,
        GeneratorExampleController::class
    ]
);

echo "<pre>";
var_dump($router->routes());
echo "</pre>";

// $router
//     ->get('/', [HomeController::class, 'index'])
//     ->post("/upload", [HomeController::class, "upload"])
//     ->get("/transactions", [HomeController::class, "transactions"])
//     ->get("/examples/generator", [GeneratorExampleController::class, "index"]);

(new App(
    $container,
    $router,
    ['uri' => $_SERVER['REQUEST_URI'], 'method' => $_SERVER['REQUEST_METHOD']],
    new Config($_ENV)
))->run();
