<?php

declare(strict_types=1);

namespace Tests\DataProviders;

final class RouterDataProvider
{
    public static function routeNotFoundCases(): array
    {
        // Providing values for arguments
        return [
            ["/users", "put"], // request method does not exist
            ["/invoices", "post"], // request uri does not exist
            ["/users", "get"], // users class does not exist
            ["/users", "post"], // method in class does not exist
        ];
    }
}
