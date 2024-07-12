<?php

use App\Invoice;

require_once "../vendor/autoload.php";

$invoice = new Invoice("amount", 15);

$invoice->amount = 20;

// echo $invoice->amount; // triggers the __get magic method

echo "<pre>";
var_dump($invoice);
echo "</pre>";
