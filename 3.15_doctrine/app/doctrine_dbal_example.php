<?php

declare(strict_types=1);

use Dotenv\Dotenv;
use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Schema\Column;

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$connectionParams = [
    'dbname' => $_ENV["DB_DATABASE"],
    'user' => $_ENV["DB_USER"],
    'password' => $_ENV["DB_PASS"],
    'host' => $_ENV["DB_HOST"],
    'driver' => $_ENV["DB_DRIVER"] ?? "pdo_mysql",
];

$conn = DriverManager::getConnection($connectionParams);

$schema = $conn->createSchemaManager();

var_dump(
    array_keys(
        $schema->listTableColumns("invoices")
    )

    // array_map(
    //     fn (Column $column) => $column->getName(),
    //     $schema->listTableColumns("invoices")
    // )
);

// $builder = $conn->createQueryBuilder();

// $invoices =
//     $builder->select("id, amount")
//     ->from("invoices")
//     ->where("amount > :amount")
//     ->setParameter("amount", 6000)
    // ->fetchAllAssociative();

// var_dump($invoices);

// $ids = [1, 2, 3];

// $result = $conn->fetchAllAssociative(
//     "SELECT id, created_at 
//     FROM invoices 
//     WHERE id IN (?)",
//     [$ids],
//     [\Doctrine\DBAL\ArrayParameterType::INTEGER]
// );

// var_dump($result);

// Getting records between 2 dates (inclusive of both)
// $stmt = $conn->prepare(
//     "SELECT id, created_at 
//     FROM invoices 
//     WHERE created_at BETWEEN :from AND :to"
// );

// $from = new DateTime("2022-01-01 00:00:00");
// $to = new DateTime("2022-01-31 23:59:59");

// $stmt->bindValue(":from", $from, "datetime");
// $stmt->bindValue(":to", $to, "datetime");

// $result = $stmt->executeQuery();

// var_dump($result->fetchAllAssociative());
