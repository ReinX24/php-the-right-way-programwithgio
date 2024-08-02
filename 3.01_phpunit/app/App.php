<?php

namespace App;

use App\Exceptions\RouteNotFoundException;

class App
{
    private static DB $db;

    public function __construct(
        protected Router $router,
        protected array $requestInfo,
        protected Config $config
    ) {
        static::$db = new DB($config->db ?? []);
    }

    public static function db(): DB
    {
        return static::$db;
    }

    public function run()
    {
        try {
            echo $this->router->resolve(
                $this->requestInfo["uri"],
                strtolower($this->requestInfo["method"])
            );
        } catch (RouteNotFoundException $e) {
            // If the route requested is not found
            http_response_code(404);

            echo \App\View::make("error/404");
        }
    }
}
