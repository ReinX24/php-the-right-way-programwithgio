<?php

namespace App\Attributes;

use App\Enums\HttpMethod;
use Attribute;

#[Attribute(Attribute::TARGET_METHOD | ATTRIBUTE::IS_REPEATABLE)]
class Post extends Route
{
    public function __construct(
        public string $routePath,
    ) {
        parent::__construct($routePath, HttpMethod::Post);
    }
}
