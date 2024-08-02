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
