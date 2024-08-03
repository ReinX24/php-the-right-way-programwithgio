<?php

namespace App;

use App\Exceptions\Container\NotFoundException;
use App\Exceptions\Container\ContainerException;

use PHPUnit\Framework\Constraint\IsInstanceOf;
use Psr\Container\ContainerInterface;
use ReflectionNamedType;
use ReflectionUnionType;

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
        $reflectionClass = new \ReflectionClass($id);

        // Checking if the class is instantiable
        if (!$reflectionClass->isInstantiable()) {
            throw new ContainerException("Class " . $id . " is not instantiable");
        }

        // 2. Inspect the constructor of the class
        $constructor = $reflectionClass->getConstructor();

        // Checking if the class has a constructor
        if (!$constructor) {
            return new $id;
        }

        // 3. Inspect the constructor parameter (dependencies)
        $parameters = $constructor->getParameters();

        // Checking if the constructor has parameters
        if (!$parameters) {
            return new $id;
        }

        // 4. If the parameter is a class then try to resolve that class using the container
        $dependencies = array_map(function (\ReflectionParameter $param) use ($id) {
            $name = $param->getName();
            $type = $param->getType();

            if (!$type) {
                throw new ContainerException(
                    "Failed to resolve class " . $id . " because param " . $name . " is missing a type hint"
                );
            }

            // Throws an error if the class is a union type (int, array, other built in data types)
            if ($type instanceof ReflectionUnionType) {
                throw new ContainerException(
                    "Failed to resolve class " . $id . " because of union type for para " . $name
                );
            }

            // If the type is not a built in type, try to resolve as a class
            if ($type instanceof ReflectionNamedType && !$type->isBuiltin()) {
                return $this->get($type->getName()); // adds class dependency to array
            }

            throw new ContainerException(
                "Failed to resolve class " . $id . " because invalid param " . $name
            );
        }, $parameters);

        return $reflectionClass->newInstanceArgs($dependencies);
    }
}
