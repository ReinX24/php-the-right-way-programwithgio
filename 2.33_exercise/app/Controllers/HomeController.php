<?php

declare(strict_types=1);

namespace App\Controllers;

use App\View;
use Ramsey\Uuid\Builder\FallbackBuilder;

class HomeController
{
    public function index(): View
    {
        return View::make('index');
    }

    public function transactions(): View
    {
        return View::make("transactions");
    }

    public function upload()
    {
        $csvTransactions = [];

        foreach ($_FILES["transactions"]["tmp_name"] as $file) {
            $open = fopen($file, "r");
            fgets($open); // reads the header so that it will not be read
            while (($data = fgetcsv($open, 1000, ",")) !== false) {
                $csvTransactions[] = $data;
            }
            fclose($open);
        }

        foreach ($csvTransactions as $transaction) {
            // Adding each transaction to our database

            $transactionData = [];

            // Formatting the date
            $transactionData["transaction_date"] = date("M/d/Y", strtotime($transaction[0]));

            // Converting to integer
            $transactionData["check_number"] = (int) $transaction[1];

            // Checking for special characters
            $transactionData["description"] = htmlspecialchars($transaction[2]);

            // Removing dollar signs and commas for float conversion
            // TODO: replace with regex
            $transaction[3] = str_replace("$", "", $transaction[3]);
            $transaction[3] = str_replace(",", "", $transaction[3]);
            $transactionData["amount"] = $transaction[3];

            echo "<pre>";
            var_dump($transactionData);
            echo "<pre>";
        }
    }
}
