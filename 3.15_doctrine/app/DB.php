<?php

declare(strict_types=1);

namespace App;

use Doctrine\DBAL\Connection;
use Doctrine\DBAL\DriverManager;
// use PDO;

/**
 * @mixin Connection
 */
class DB
{
    // private PDO $pdo;
    private Connection $connection;

    public function __construct(array $config)
    {
        // $defaultOptions = [
        //     PDO::ATTR_EMULATE_PREPARES   => false,
        //     PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        // ];

        // $connectionParams = [
        //     'host' => $config["host"],
        //     'user' => $config["user"],
        //     'password' => $config["password"],
        //     'dbname' => $config["dbname"],
        //     'driver' => $config["driver"] ?? "pdo_mysql",
        // ];

        $this->connection = DriverManager::getConnection($config);

        // try {
        //     $this->pdo = new PDO(
        //         $config['driver'] . ':host=' . $config['host'] . ';dbname=' . $config['database'],
        //         $config['user'],
        //         $config['pass'],
        //         $config['options'] ?? $defaultOptions
        //     );
        // } catch (\PDOException $e) {
        //     throw new \PDOException($e->getMessage(), (int) $e->getCode());
        // }
    }

    public function __call(string $name, array $arguments)
    {
        // return call_user_func_array([$this->pdo, $name], $arguments);
        return call_user_func_array([$this->connection, $name], $arguments);
    }
}
