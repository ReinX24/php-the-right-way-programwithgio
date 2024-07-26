<?php

require_once "../vendor/autoload.php";

// TODO: resume @1:18

$router = new App\Router();

$router
    ->get("/", [App\Classes\Home::class, "index"])
    ->post("/upload", [App\Classes\Home::class, "upload"])
    ->get("/invoices", [App\Classes\Invoice::class, "index"])
    ->get("/invoices/create", [App\Classes\Invoice::class, "create"])
    ->post("/invoices/create", [App\Classes\Invoice::class, "store"]);

echo $router->resolve(
    $_SERVER["REQUEST_URI"],
    strtolower($_SERVER["REQUEST_METHOD"])
);
