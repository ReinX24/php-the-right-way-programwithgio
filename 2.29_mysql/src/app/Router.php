<?php

declare(strict_types=1);

namespace App;

use App\Exceptions\RouteNotFoundException;

class Router
{
    private array $routes;

    private function register(
        string $requestMethod,
        string $route,
        callable|array $action
    ): self {
        $this->routes[$requestMethod][$route] = $action;

        return $this;
    }

    public function get(string $route, callable|array $action): self
    {
        return $this->register("get", $route, $action);
    }

    public function post(string $route, callable|array $action)
    {
        return $this->register("post", $route, $action);
    }

    public function routes(): array
    {
        return $this->routes;
    }

    public function resolve(string $requestUri, string $requestMethod)
    {
        // Parsing REQUEST_URI'
        // Separate the query string
        $route = explode("?", $requestUri)[0];

        // Getting the registered function in our routes
        $action = $this->routes[$requestMethod][$route] ?? null;

        if (!$action) {
            throw new RouteNotFoundException();
        }

        // Checks if the stored action is a function
        if (is_callable($action)) {
            return call_user_func($action);
        }

        // If the action is an array
        if (is_array($action)) {
            [$class, $method] = $action; // desctructuring array

            if (class_exists($class)) {
                $class = new $class();

                if (method_exists($class, $method)) {
                    return call_user_func([$class, $method], []);
                }
            }
        }

        // Throw exception if it is neither a callable or an array
        throw new RouteNotFoundException();
    }
}
