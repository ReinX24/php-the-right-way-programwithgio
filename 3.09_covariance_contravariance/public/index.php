<?php

declare(strict_types=1);

use App\AllInOneCoffeeMaker;
use App\App;
use App\Config;
use App\Container;
use App\Controllers\GeneratorExampleController;
use App\Controllers\HomeController;
use App\Router;
use App\VarianceExample\AnimalFood;
use App\VarianceExample\CatShelter;
use App\VarianceExample\DogShelter;
use App\VarianceExample\Food;

require_once __DIR__ . '/../vendor/autoload.php';

$kitty = (new CatShelter)->adopt("Ricky");
$kitty->speak();

$catFood = new AnimalFood();
$kitty->eat($catFood);

$doggy = (new DogShelter)->adopt("Mavrick");
$doggy->speak();

$banana = new Food();
$doggy->eat($catFood);

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
