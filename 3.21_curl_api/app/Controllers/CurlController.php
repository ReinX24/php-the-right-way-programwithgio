<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Attributes\Get;

class CurlController
{
    #[Get("/curl")]
    public function index()
    {
        $handle = curl_init();

        $url = "https://example.com";

        curl_setopt($handle, CURLOPT_URL, $url);

        curl_exec($handle);
    }
}