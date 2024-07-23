<?php

use App\Customer;
use App\CustomInvoice;
use App\Invoice;

require_once "../vendor/autoload.php";

$customer1 = new Customer("Customer 1");
$customer2 = new Customer("Customer 2");

$invoice1 = new Invoice($customer1, 25, "My Invoice");
$invoice2 = new Invoice($customer2, 25, "My Invoice");

// Causes a recursive error
// $invoice1->linkedInvoice = $invoice2;
// $invoice2->linkedInvoice = $invoice1;

// Simple comparisons, checks if the values are the same
echo "invoice1 == invoice2 <br>";
var_dump($invoice1 == $invoice2);

echo "<br>";

// Checks if the two objects are the same object
echo "invoice1 === invoice2 <br>";
var_dump($invoice1 === $invoice2);
