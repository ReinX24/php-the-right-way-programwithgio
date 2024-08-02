<?php

declare(strict_types=1);

namespace App;

use \PDO;
use \PDOException;

class DB
{
    private PDO $pdo;

    public function __construct(array $config)
    {
        $defaultOptions = [
            PDO::ATTR_EMULATE_PREPARES => false,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ];
        //* Instatianting database connection
        try {
            $this->pdo = new PDO(
                $config["driver"] . ":host=" . $config["host"] . ";dbname=" . $config["database"],
                $config["user"],
                $config["pass"],
                $config["options"] ?? $defaultOptions
            );
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), (int) $e->getCode());
        }
    }

    /**
     * This method is called whenever a method is called on a DB object.
     * Method is called when the method does not exist in the DB class.
     * @param string $name
     * @param array $arguments
     * @return mixed
     */
    public function __call(string $name, array $arguments)
    {
        // Executes method in the PDO object
        return call_user_func_array([$this->pdo, $name], $arguments);
    }
}
