<?php

use App\Invoice;

require_once "../vendor/autoload.php";

$invoice = new Invoice("amount", 15);

echo "<pre>";
var_dump($invoice);
echo "</pre>";

// var_dump(is_callable($invoice)); 

// $invoice(); // calls the __invoke magic method

// var_dump($invoice instanceof Stringable);

// $invoice->amount = 20;

// $invoice->process(15, "This is a description");
// Invoice::process(1, 2, 3);

// echo "<pre>";
// var_dump($invoice->__isset("amount"));
// echo "</pre>";

// echo "<pre>";
// var_dump($invoice);
// echo "</pre>";

// echo "<pre>";
// var_dump($invoice->__unset("amount"));
// echo "</pre>";

// echo "<pre>";
// var_dump($invoice);
// echo "</pre>";

// echo $invoice->amount; // triggers the __get magic method

// echo "<pre>";
// var_dump($invoice);
// echo "</pre>";
