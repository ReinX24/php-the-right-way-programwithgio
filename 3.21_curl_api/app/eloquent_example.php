<?php

declare(strict_types=1);

use App\Enums\InvoiceStatus;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use Carbon\Carbon;
use Illuminate\Database\Capsule\Manager as Capsule;

require_once __DIR__ . "/../vendor/autoload.php";
require __DIR__ . "/../eloquent.php";

// Updating a record from our database
$invoiceId = 3;

$invoices = Capsule::table("invoices")->where("status", InvoiceStatus::Paid)->get();

var_dump($invoices);
exit;

Invoice::query()
    ->where("id", $invoiceId)
    ->update(["status" => InvoiceStatus::Paid]);

Invoice::query()
    ->where("status", InvoiceStatus::Paid)
    ->get()
    ->each(function (Invoice $invoice) {
        echo $invoice->id . ", "
            . $invoice->status->toString() . ", "
            . $invoice->created_at->format("m/d/Y")
            . PHP_EOL;

        $invoice->items()->where("description", "Item 2")->delete();
        // $item = $invoice->items()->first();

        // $item->delete(); // deletes first item from each invoice

        // $item->description = "Item 1";

        // $invoice->invoice_number = "1";

        // $invoice->push(); // updates invoice model along with relationships
    });

// Adding records to our database
// Capsule::connection()->transaction(
//     function () {
//         $invoice = new Invoice();

//         $invoice->amount = 45;
//         $invoice->invoice_number = 1;
//         $invoice->status = InvoiceStatus::Pending;
//         $invoice->due_date = (new Carbon())->addDays(10);

//         $invoice->save();

//         $items = [
//             ["Item 1", 1, 15],
//             ["Item 2", 2, 7.5],
//             ["Item 3", 4, 3.75]
//         ];

//         foreach ($items as [$description, $quantity, $unitPrice]) {
//             $item = new InvoiceItem();

//             $item->description = $description;
//             $item->quantity = $quantity;
//             $item->unit_price = $unitPrice;

//             $item->invoice()->associate($invoice);
//             $item->save();
//         }
//     }
// );
