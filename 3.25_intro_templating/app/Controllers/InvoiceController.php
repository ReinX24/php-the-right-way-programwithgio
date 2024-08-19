<?php

namespace App\Controllers;

use App\Attributes\Get;
use App\Enums\Color;
use App\Enums\InvoiceStatus;
use App\Models\Invoice;
use App\View;
use Carbon\Carbon;
use NumberFormatter;
use Symfony\Component\Mailer\MailerInterface;
use Twig\Environment as Twig;

class InvoiceController
{
    public function __construct(private Twig $twig)
    {
        // var_dump($mailer);
    }

    #[Get("/invoices")]
    public function index(): string
    {
        // $status1 = InvoiceStatus::Paid;
        // $status2 = InvoiceStatus::Failed;

        // var_dump($status1 === $status2);
        // var_dump(InvoiceStatus::Paid, gettype(InvoiceStatus::Paid), is_object(InvoiceStatus::Paid));
        // var_dump(InvoiceStatus::fromColor(Color::Green));
        // var_dump(InvoiceStatus::cases());
        // var_dump(enum_exists(InvoiceStatus::class));

        // $invoices = (new Invoice())->all(InvoiceStatus::Paid);

        // $a = new NumberFormatter("it-IT", NumberFormatter::DECIMAL);

        // echo $a->format(12345.12345) . "<br>"; // outputs 12.345,12

        $invoices = Invoice::query()
            ->where('status', InvoiceStatus::Paid)
            ->get()
            ->map(
                fn(Invoice $invoice) => [
                    'id'            => $invoice->id,
                    'invoiceNumber' => $invoice->invoice_number,
                    'amount'        => $invoice->amount,
                    'status'        => $invoice->status->toString(),
                    'dueDate'       => $invoice->due_date->toDateTimeString(),
                ]
            )
            ->toArray();

        return $this->twig->render("invoices/index.twig", ["invoices" => $invoices]);
    }

    #[Get("/invoices/new")]
    public function create()
    {
        $invoice = new Invoice();

        $invoice->invoice_number = 5;
        $invoice->amount = 20;
        $invoice->status = InvoiceStatus::Pending;
        $invoice->due_date = (new Carbon())->addDay();

        $invoice->save();

        echo $invoice->id . ", " . $invoice->due_date->format("m/d/Y");
    }
}
