<?php

declare(strict_types=1);

namespace App\Php_8_1_examples\NewInitializers;

class Customer
{
    public function __construct(public Address $address = new Address())
    {
    }
}
