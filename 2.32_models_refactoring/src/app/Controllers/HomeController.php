<?php

declare(strict_types=1);

namespace App\Controllers;

use App\View;
use App\App;
use PDO;

class HomeController
{
    public function index(): View
    {
        $db = App::db();

        $email = "john@doe.com";
        $name = "John Doe";
        $amount = 25;

        try {
            $db->beginTransaction();

            $newUserStmt = $db->prepare(
                "INSERT INTO users (email, full_name, is_active, created_at)
                VALUES (:email, :full_name, 1, NOW())"
            );

            $newInvoiceStmt = $db->prepare(
                "INSERT INTO invoices (amount, user_id)
                VALUES (:amount, :user_id)"
            );

            $newUserStmt->bindValue(":email", $email);
            $newUserStmt->bindValue(":full_name", $name);

            $newUserStmt->execute();

            $userId = (int) $db->lastInsertId();

            $newInvoiceStmt->bindValue(":amount", $amount);
            $newInvoiceStmt->bindValue(":user_id", $userId);

            $newInvoiceStmt->execute();

            $db->commit();
        } catch (\Throwable $e) {
            if ($db->inTransaction()) {
                $db->rollBack();
            }
        }

        //* Getting the data from users and invoices tables
        $fetchStmt = $db->prepare(
            "SELECT invoices.id AS invoice_id, amount, user_id, full_name
            FROM invoices
            INNER JOIN users ON user_id = users.id
            WHERE email = :email"
        );

        $fetchStmt->bindValue(":email", $email);

        $fetchStmt->execute();

        echo "<pre>";
        var_dump($fetchStmt->fetch(PDO::FETCH_ASSOC));
        echo "</pre>";

        $fetchAllStmt = $db->prepare(
            "SELECT invoices.id AS invoice_id, amount, user_id, full_name
            FROM invoices
            INNER JOIN users ON user_id = users.id"
        );

        $fetchAllStmt->execute();

        echo "<pre>";
        var_dump($fetchAllStmt->fetchAll(PDO::FETCH_ASSOC));
        echo "</pre>";

        return View::make(
            "index",
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
