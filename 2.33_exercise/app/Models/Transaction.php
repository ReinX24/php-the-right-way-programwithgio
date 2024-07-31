<?php

declare(strict_types=1);

namespace App\Models;

use App\Model;

class Transaction extends Model
{
    public function create(
        string $date,
        int $checkNumber,
        string $description,
        float $amount
    ) {
        $newTransactionStmt = $this->db->prepare(
            "INSERT INTO 
                transactions (transaction_date, check_number, description, amount)
            VALUES 
                (:transaction_date, :check_number, :description, :amount)"
        );

        $newTransactionStmt->bindValue(":transaction_date", $date);
        $newTransactionStmt->bindValue(":check_number", $checkNumber);
        $newTransactionStmt->bindValue(":description", $description);
        $newTransactionStmt->bindValue(":amount", $amount);
    }
}
