<?php

declare(strict_types=1);

namespace App\Controllers;

use App\View;
use PDO;
use PDOException;

class HomeController
{
    public function index(): View
    {
        try {
            $db = new PDO("mysql:host=db;dbname=my_db", "root", "root", []);
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), (int) $e->getCode());
        }

        // $email = "gia@doe.com";
        // $name = "Gia Doe";
        // $isActive = 1;
        // $createdAt = date("Y-m-d H:i:s", strtotime("07/11/2021 9:00PM"));

        // $query =
        //     'INSERT INTO 
        //         users (email, full_name, is_active, created_at, updated_at)
        //     VALUES 
        //         (:email, :full_name, :is_active, :created_at, :updated_at)';

        // $stmt = $db->prepare($query);

        // $stmt->bindValue(":email", $email);
        // $stmt->bindValue(":full_name", $name);
        // $stmt->bindValue(":is_active", $isActive, PDO::PARAM_BOOL);
        // $stmt->bindValue(":created_at", $createdAt);
        // $stmt->bindValue(":updated_at", $createdAt);

        // $stmt->execute();

        // $id = $db->lastInsertId();
        $id = 1;
        $user = $db->query("SELECT * FROM users WHERE id = $id")->fetch();

        echo "<pre>";
        var_dump($user);
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
