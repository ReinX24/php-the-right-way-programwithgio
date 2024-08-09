<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Doctrine\DBAL\DriverManager;
use Doctrine\Migrations\Configuration\Connection\ExistingConnection;
use Doctrine\Migrations\Configuration\Migration\PhpFile;
use Doctrine\Migrations\DependencyFactory;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;
use Dotenv\Dotenv;

$config = new PhpFile('migrations.php'); // Or use one of the Doctrine\Migrations\Configuration\Configuration\* loaders

//* Loading environment variables to connect to db
$dotenv = Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$connectionParams = [
    'dbname' => $_ENV["DB_DATABASE"],
    'user' => $_ENV["DB_USER"],
    'password' => $_ENV["DB_PASS"],
    'host' => $_ENV["DB_HOST"],
    'driver' => $_ENV["DB_DRIVER"] ?? "pdo_mysql",
];

$entityManager = new EntityManager(
    DriverManager::getConnection($connectionParams),
    ORMSetup::createAttributeMetadataConfiguration([
        __DIR__ . '/app/Entity',
    ])
);

$conn = DriverManager::getConnection(['driver' => 'pdo_sqlite', 'memory' => true]);

return DependencyFactory::fromConnection($config, new ExistingConnection($conn));
