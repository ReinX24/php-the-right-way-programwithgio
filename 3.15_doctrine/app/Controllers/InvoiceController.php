<?php

namespace App\Controllers;

use App\Attributes\Get;
use App\Enums\Color;
use App\Enums\InvoiceStatus;
use App\Models\Invoice;
use App\View;

class InvoiceController
{
    #[Get("/invoices")]
    public function index(): View
    {
        // $status1 = InvoiceStatus::Paid;
        // $status2 = InvoiceStatus::Failed;

        // var_dump($status1 === $status2);
        // var_dump(InvoiceStatus::Paid, gettype(InvoiceStatus::Paid), is_object(InvoiceStatus::Paid));
        // var_dump(InvoiceStatus::fromColor(Color::Green));
        // var_dump(InvoiceStatus::cases());
        // var_dump(enum_exists(InvoiceStatus::class));

        // TODO: resume @17:01
        $invoices = (new Invoice())->all(InvoiceStatus::Paid);

        return View::make("invoices/index", ["invoices" => $invoices]);
    }
}
