<?php

declare(strict_types=1);

namespace App\php_8_1_examples\ReadOnlyProperty;

class Address
{
    public function __construct(
        public readonly string $street,
        public readonly string $city,
        public readonly string $state,
        public readonly string $postalCode,
        public readonly string $country = "US",
    ) {
    }
}
