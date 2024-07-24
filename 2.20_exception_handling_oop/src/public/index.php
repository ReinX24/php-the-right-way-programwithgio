<?php

use App\Customer;
use App\Invoice;
use App\Exception\MissingBillingInfoException;

require_once "../vendor/autoload.php";

// Setting the global exception handler
// set_exception_handler(
//     function (\Throwable $e) {
//         var_dump($e->getMessage());
//     }
// );

// echo array_rand([], 1);

$invoice = new Invoice(new Customer());

$invoice->process(-25);

// var_dump(process());

// function foo()
// {
//     echo "foo" . PHP_EOL;

//     return false;
// }

// function process()
// {
//     $invoice = new Invoice(new Customer(["foo" => "bar"]));

//     try {
//         $invoice->process(-25);

//         return true;
//     } catch (MissingBillingInfoException | \InvalidArgumentException $e) {
//         // echo $e->getMessage() . " " . $e->getFile() . ":" . $e->getLine() . PHP_EOL;
//         echo $e->getMessage() . PHP_EOL;

//         return foo();
//     } finally {
//         echo "Finally block" . PHP_EOL;

//         return -1;
//     }
// }
