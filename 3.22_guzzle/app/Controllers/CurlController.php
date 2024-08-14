<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Attributes\Get;
use Dotenv\Dotenv;

class CurlController
{
    #[Get("/curl")]
    public function index()
    {
        $handle = curl_init();

        $apiKey = $_ENV["EMAILABLE_API_KEY"];
        $email = "reinx244@gmail.com";

        $params = [
            "api_key" => $apiKey,
            "email" => $email
        ];

        $url = "https://api.emailable.com/v1/verify?" . http_build_query($params);

        curl_setopt($handle, CURLOPT_URL, $url); // setting curl options
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);

        $content = curl_exec($handle);

        if ($content !== false) {
            $data = json_decode($content, true);

            echo "<pre>";
            print_r($data);
            echo "</pre>";
        }
    }
}