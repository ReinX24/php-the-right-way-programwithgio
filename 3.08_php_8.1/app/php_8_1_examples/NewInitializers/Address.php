<?php

declare(strict_types=1);

namespace App\Php_8_1_examples\NewInitializers;

class Address
{
    public function __construct()
    {
        var_dump("Hello");
    }
}
