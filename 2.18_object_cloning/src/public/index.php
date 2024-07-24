<?php

use App\Invoice;

require_once "../vendor/autoload.php";

$invoice = new Invoice();

$invoice2 = clone $invoice;

echo "<pre>";
var_dump($invoice, $invoice2, $invoice === $invoice2);
echo "</pre>";
