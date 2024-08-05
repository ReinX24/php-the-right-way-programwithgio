<?php

namespace App\Attributes;

use Attribute;

#[Attribute]
class Put extends Route
{
    public function __construct(
        public string $routePath,
        public string $method = "get"
    ) {
        // TODO: continue @13:31
    }
}
