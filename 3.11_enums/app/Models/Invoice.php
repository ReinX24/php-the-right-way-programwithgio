<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\InvoiceStatus;
use App\Model;
use PDO;
use RuntimeException;

class Invoice extends Model
{
    public function all(InvoiceStatus $status)
    {
        $stmt = $this->db->prepare(
            "SELECT id, invoice_number, amount, status
            FROM invoices
            WHERE status = :invoiceStatus"
        );

        $stmt->bindValue(":invoiceStatus", $status->value);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}
