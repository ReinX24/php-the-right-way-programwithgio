<?php

namespace App\Attributes;

use App\Contracts\RouteInterface;
use App\Enums\HttpMethod;
use Attribute;

#[Attribute(Attribute::TARGET_METHOD | ATTRIBUTE::IS_REPEATABLE)]
class Route implements RouteInterface
{
    public function __construct(
        public string $routePath,
        public HttpMethod $method = HttpMethod::Get
    ) {
    }
}
