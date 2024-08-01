<?php

declare(strict_types=1);

namespace App\Controllers;

use App\View;
use App\Models\Transaction;

class HomeController
{
    public function index(): View
    {
        return View::make('index');
    }

    public function transactions(): View
    {
        $transaction = new Transaction();
        $allTransactions = $transaction->getAllTransactions();

        extract($transaction->getTotalIncome()); // $totalIncome
        extract($transaction->getTotalExpense()); // $totalExpense

        $netTotal = $transaction->getNetTotal();

        return View::make("transactions", [
            "transactions" => $allTransactions,
            "totalIncome" => $totalIncome,
            "totalExpense" => $totalExpense,
            "netTotal" => $netTotal
        ]);
    }

    public function upload()
    {
        $csvTransactions = [];

        $transaction = new Transaction();

        foreach ($_FILES["transactions"]["tmp_name"] as $file) {
            if (!empty($file)) {
                $open = fopen($file, "r");
                fgets($open); // reads the header so that it will not be read

                while (($data = fgetcsv($open, 1000, ",")) !== false) {
                    $csvTransactions[] = $data;
                }

                fclose($open);
            }
        }

        foreach ($csvTransactions as $eachTransaction) {
            // Adding each transaction to our database
            $transactionData = [];

            // Formatting the date
            $transactionData["transaction_date"] = date(
                "Y/m/d",
                strtotime($eachTransaction[0])
            );

            // Converting to integer, checks if the check_number is empty
            if (empty($eachTransaction[1])) {
                $transactionData["check_number"] = null;
            } else {
                $transactionData["check_number"] = (int) $eachTransaction[1];
            }

            // Checking for special characters
            $transactionData["description"] = htmlspecialchars(
                $eachTransaction[2]
            );

            // Removing dollar signs and commas for float conversion
            $eachTransaction[3] = preg_replace(
                "/[$,]/i",
                "",
                $eachTransaction[3]
            );

            $transactionData["amount"] = (float) $eachTransaction[3];

            // Adding transaction to our database
            $transaction->create(
                $transactionData["transaction_date"],
                $transactionData["check_number"],
                $transactionData["description"],
                $transactionData["amount"],
            );
        }

        return View::make("upload");
    }
}
