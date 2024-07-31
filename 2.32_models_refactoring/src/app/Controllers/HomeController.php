<?php

declare(strict_types=1);

namespace App\Controllers;

use App\View;
use App\Models\User;
use App\Models\Invoice;
use App\Models\SignUp;

class HomeController
{
    public function index(): View
    {
        $email = "gia@doe.com";
        $name = "Gia Doe";
        $amount = 30;

        $userModel = new User();
        $invoiceModel = new Invoice();

        $invoiceId = (new SignUp($userModel, $invoiceModel))->register(
            [
                "email" => $email,
                "name" => $name
            ],
            [
                "amount" => $amount
            ]
        );

        // $fetchAllStmt = $db->prepare(
        //     "SELECT invoices.id AS invoice_id, amount, user_id, full_name
        //     FROM invoices
        //     INNER JOIN users ON user_id = users.id"
        // );

        // $fetchAllStmt->execute();

        // echo "<pre>";
        // var_dump($fetchAllStmt->fetchAll(PDO::FETCH_ASSOC));
        // echo "</pre>";

        return View::make(
            "index",
            ["invoice" => $invoiceModel->find($invoiceId)]
        ); // this runs the __toString function
    }

    public function download()
    {
        header("Content-Type: application/pdf");
        header('Content-Disposition: attachment;filename="myfile.pdf"');

        readfile(STORAGE_PATH . "/Presentation1-2.pdf");
    }

    public function upload()
    {
        // Moving file from tmp directory to local directory
        $filePath = STORAGE_PATH . "/" . $_FILES["receipt"]["name"];

        move_uploaded_file($_FILES["receipt"]["tmp_name"], $filePath);

        echo "<pre>";
        var_dump(pathinfo($filePath));
        echo "</pre>";

        header("Location: /");
        exit;
    }
}
