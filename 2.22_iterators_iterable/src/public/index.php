<?php

use App\Invoice;
use App\InvoiceCollection;
use App\Collection;

require_once "../vendor/autoload.php";

$invoiceCollection = new InvoiceCollection(
    [
        new Invoice(15),
        new Invoice(25),
        new Invoice(50)
    ]
);

// Iterating through the invoices
// Rewind -> Valid -> Current -> Object Value -> Next -> Valid -> Current -> Object Value
// foreach ($invoiceCollection as $invoice) {
//     echo $invoice->id . " - " . $invoice->amount . PHP_EOL;
// }

foo($invoiceCollection);
foo([1, 2, 3]);

function foo(iterable $iterable)
{
    foreach ($iterable as $i => $item) {
        echo $i . PHP_EOL;
    }
}
