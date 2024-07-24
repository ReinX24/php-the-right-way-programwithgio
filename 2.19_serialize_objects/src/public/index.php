<?php

use App\Invoice;

require_once "../vendor/autoload.php";

/* 
    Serialization - coverting a value into a string
*/

$invoice = new Invoice(25, "Invoice 1", "1234567890");

$str = serialize($invoice);

$invoice2 = unserialize($str);

var_dump($invoice2);

// echo $str . PHP_EOL;

// $serializedInvoice = serialize($invoice) . PHP_EOL;

// $invoice2 = unserialize($serializedInvoice);
// $invoice2 = unserialize("randomstr");
// $invoice2 = serialize(false);

// var_dump(unserialize($invoice2));
// var_dump($invoice, $invoice2, $invoice == $invoice2);

// echo serialize(true) . PHP_EOL;
// echo serialize(1) . PHP_EOL;
// echo serialize(2.5) . PHP_EOL;
// echo serialize("hello world") . PHP_EOL;
// echo serialize([1, 2, 3]) . PHP_EOL;
// var_dump(unserialize(serialize(["a" => 1, "b" => 2])));
