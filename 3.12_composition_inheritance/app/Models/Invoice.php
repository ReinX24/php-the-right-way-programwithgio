<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\InvoiceStatus;
use App\Model;
use PDO;
use RuntimeException;

class Invoice extends Model
{
    public function create(array $lineItems)
    {
        // Calculate sub total
        $lineItemsTotal = $this->calculateLineItemsTotal($lineItems);

        // Calculate sales tax
        $salesTax = $this->calculateSalesTax($lineItemsTotal);

        $total = $lineItemsTotal + $salesTax;

        echo "Sub Total: $" . $lineItemsTotal . PHP_EOL .
            "Sales Tax: $" . $salesTax . PHP_EOL .
            "Total: $" . $total . PHP_EOL;

        // ... Do Some Other Stuff ... //
    }

    public function calculateLineItemsTotal(array $items): float|int
    {
        return array_sum(
            array_map(
                fn ($item) => $item["unitPrice"] * $item["quantity"],
                $items
            )
        );
    }

    public function calculateSalesTax(float|int $total): float
    {
        return round($total * 7 / 100, 2);
    }

    // public function all(InvoiceStatus $status)
    // {
    //     $stmt = $this->db->prepare(
    //         "SELECT id, invoice_number, amount, status
    //         FROM invoices
    //         WHERE status = :invoiceStatus"
    //     );

    //     $stmt->bindValue(":invoiceStatus", $status->value);

    //     $stmt->execute();

    //     return $stmt->fetchAll(PDO::FETCH_OBJ);
    // }
}
