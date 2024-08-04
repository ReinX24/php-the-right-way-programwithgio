<?php

declare(strict_types=1);

namespace App\Models;

use App\Model;
use \PDO;

class Transaction extends Model
{
    public function create(
        string $date,
        ?int $checkNumber,
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

        $newTransactionStmt->execute();
    }

    public function getAllTransactions(): array
    {
        $getAllStmt = $this->db->prepare("SELECT * FROM transactions");

        $getAllStmt->execute();

        return $getAllStmt->fetchAll();
    }

    public function getTotalIncome()
    {
        $totalIncome = $this->db->prepare(
            "SELECT 
                SUM(amount) 
            AS 
                totalIncome 
            FROM 
                transactions 
            WHERE 
                amount > 0"
        );

        $totalIncome->execute();

        return $totalIncome->fetch();
    }

    public function getTotalExpense()
    {
        $totalExpense = $this->db->prepare(
            "SELECT 
                SUM(amount) 
            AS
                totalExpense
            FROM 
                transactions 
            WHERE 
                amount < 0"
        );

        $totalExpense->execute();

        return $totalExpense->fetch();
    }

    public function getNetTotal()
    {
        extract($this->getTotalIncome()); // $totalIncome
        extract($this->getTotalExpense()); // $totalExpense

        return $totalIncome + $totalExpense;
    }
}
