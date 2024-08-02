<?php

namespace App;

use App\Exceptions\Container\NotFoundException;

use Psr\Container\ContainerInterface;

class Container implements ContainerInterface
{
    private array $entries = [];

    public function get(string $id)
    {
        if ($this->has($id)) {
            $entry = $this->entries[$id];

            return $entry($this); // returns an instance of the entry
        }

        // Autowiring, tries to find requested class
        return $this->resolve($id); // tries to resolve the requested class
    }

    public function has(string $id): bool
    {
        return isset($this->entries[$id]);
    }

    public function set(string $id, callable $concrete)
    {
        $this->entries[$id] = $concrete;
    }

    public function resolve(string $id)
    {
        // 1. Inspect the class that we are trying to get from the container

        // 2. Inspect the constructor of the class

        // 3. Inspect the constructor parameter (dependencies)

        // 4. If the parameter is a class then try to resolve that class using the container
    }
}
