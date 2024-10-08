<?php

declare(strict_types=1);

namespace App;

/**
 * @property-read ?array $db
 */
class Config
{
    protected array $config = [];

    public function __construct(array $env)
    {
        $this->config = [
            "db" =>
            [
                "driver" => $env["DB_DRIVER"] ?? "mysql",
                "host" => $env["DB_HOST"],
                "database" => $env["DB_DATABASE"],
                "user" => $env["DB_USER"],
                "pass" => $env["DB_PASS"],
            ]
        ];
    }

    /**
     * This method is called whenever a method is being called from the object.
     * @param string $name
     * @return mixed
     */
    public function __get(string $name)
    {
        return $this->config[$name] ?? null;
    }
}
