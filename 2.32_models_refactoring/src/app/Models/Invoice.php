<?php

declare(strict_types=1);

namespace App\Models;

use App\Model;
use \PDO;

class Invoice extends Model
{
    public function create(float $amount, int $userId): int
    {
        $newInvoiceStmt = $this->db->prepare(
            "INSERT INTO invoices (amount, user_id)
                VALUES (:amount, :user_id)"
        );

        $newInvoiceStmt->bindValue(":amount", $amount);
        $newInvoiceStmt->bindValue(":user_id", $userId);

        $newInvoiceStmt->execute();

        return (int) $this->db->lastInsertId();
    }

    public function find(int $invoiceId): array
    {
        //* Getting the data from users and invoices tables
        $fetchStmt = $this->db->prepare(
            "SELECT invoices.id, amount, full_name
            FROM invoices
            INNER JOIN users ON user_id = users.id
            WHERE invoices.id = :invoiceId"
        );

        $fetchStmt->bindValue(":invoiceId", $invoiceId);

        $fetchStmt->execute();

        $invoice = $fetchStmt->fetch(PDO::FETCH_ASSOC);

        return $invoice ?? [];
    }
}
