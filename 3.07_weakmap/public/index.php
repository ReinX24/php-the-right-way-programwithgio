<?php

declare(strict_types=1);

use App\App;
use App\Invoice;
use App\Config;
use App\Container;
use App\Controllers\GeneratorExampleController;
use App\Controllers\HomeController;
use App\Router;

require_once __DIR__ . '/../vendor/autoload.php';

$invoice1 = new Invoice();
$invoice2 = new Invoice();

$map = new WeakMap();

$map[$invoice1] = ["a" => 1, "b" => 2];
// $invoice2 = $invoice1;

var_dump(count($map));
unset($invoice1);
var_dump(count($map));

var_dump($map);

// echo "Unsetting Invoice 1" . PHP_EOL;
// unset($invoice1);
// echo "Unset Invoice 1" . PHP_EOL;

// var_dump($invoice2);

// $dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
// $dotenv->load();

// define('STORAGE_PATH', __DIR__ . '/../storage');
// define('VIEW_PATH', __DIR__ . '/../views');

// $container = new Container();
// $router = new Router($container);

// $router
//     ->get('/', [HomeController::class, 'index'])
//     ->post("/upload", [HomeController::class, "upload"])
//     ->get("/transactions", [HomeController::class, "transactions"])
//     ->get("/examples/generator", [GeneratorExampleController::class, "index"]);

// (new App(
//     $container,
//     $router,
//     ['uri' => $_SERVER['REQUEST_URI'], 'method' => $_SERVER['REQUEST_METHOD']],
//     new Config($_ENV)
// ))->run();
