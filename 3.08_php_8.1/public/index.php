<?php

declare(strict_types=1);

use App\App;
use App\Config;
use App\Container;
use App\Controllers\GeneratorExampleController;
use App\Controllers\HomeController;
use App\php_8_1_examples\Enums\Payment;
use App\php_8_1_examples\Enums\PaymentStatus;
use App\Php_8_1_examples\FinalConstant\InvoiceQuery;
use App\Php_8_1_examples\NewInitializers\Customer;
use App\Php_8_1_examples\NewInitializers\Address;
use App\Router;
// use App\php_8_1_examples\ReadOnlyProperty\Address;

require_once __DIR__ . '/../vendor/autoload.php';

// echo InvoiceQuery::DEFAULT_LIMIT . PHP_EOL;

// $customer = new Customer(new Address());

// var_dump($customer->address);

// function sum(float ...$num): float
// {
//     return array_sum($num);
// }

// $closure = Closure::fromCallable("sum");
// $closure = sum(...);

// var_dump($closure);

// echo $closure(2, 5) . PHP_EOL;

// $list = ["a", "b", "c"];
// $notList = [1 => "a", "b", "c"];

// var_dump(array_is_list($list));
// var_dump(array_is_list($notList));

// $list = array_filter($list, fn (string $value) => $value !== "b");

// var_dump($list);
// var_dump(array_is_list($list));

// $list = array_values($list);

// var_dump($list);
// var_dump(array_is_list($list));

// function foo(): never
// {
//     echo 1;
//     exit;
// }

// foo();

// echo "I should *never* be printed";

// $address = new Address(
//     "123 Main St.",
//     "New York",
//     "NY",
//     "10011",
//     "US",
// );

// $address->street = "abc"; // throws an error

// echo $address->street . PHP_EOL;

// $payment = new Payment();

// $payment->updateStatus(PaymentStatus::PAID);

// echo $payment->status()->value . PHP_EOL;

// Array unpacking
// $array1 = ["a" => 1, "b" => 2, "c" => 3];
// $array2 = [4, "b" => 5, 6];

// $array3 = [...$array1, ...$array2];

// print_r($array3);

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
