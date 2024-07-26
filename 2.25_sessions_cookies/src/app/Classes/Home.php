<?php

declare(strict_types=1);

namespace App\Classes;

class Home
{
    public function index(): string
    {
        setcookie(
            "userName",
            "Rein",
            time() + 24 * 60 * 60,
        );
        return "Home";
    }
}
