<?php

namespace App\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_METHOD | ATTRIBUTE::IS_REPEATABLE)]
class Put extends Route
{
    public function __construct(
        public string $routePath,
    ) {
        parent::__construct($routePath, "put");
    }
}
