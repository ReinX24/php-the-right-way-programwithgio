<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Attributes\Route;
use App\Attributes\Get;
use App\Attributes\Post;
use App\Attributes\Put;
use App\Enums\HttpMethod;
use App\View;
use App\Models\Transaction;
use App\Services\InvoiceService;

class HomeController
{
    public function __construct()
    {
    }

    // #[Get("/")]
    // #[Route("/home", HttpMethod::Head)]
    // public function index(): View
    // {
    //     return View::make("index", ["page" => "Home"]);
    // }
}
