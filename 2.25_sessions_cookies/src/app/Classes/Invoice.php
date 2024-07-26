<?php

declare(strict_types=1);

namespace App\Classes;

class Invoice
{
    public function index(): string
    {
        setcookie(
            "userName",
            "Rein",
            time() - 24 * 60 * 60,
        );
        return "Invoices";
    }

    public function create(): string
    {
        return
            '<form action="/invoices/create" method="POST">
                <label>Amount</label>
                <input type="text" name="amount">
            </form>';
    }

    public function store()
    {
        $amount = $_POST["amount"];
        var_dump($amount);
    }
}