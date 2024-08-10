<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Doctrine\DBAL\DriverManager;
use Doctrine\Migrations\Configuration\Migration\PhpFile;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;
use Doctrine\Migrations\Configuration\EntityManager\ExistingEntityManager;
use Doctrine\Migrations\DependencyFactory;
use Doctrine\ORM\ORMSetup;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$config = new PhpFile('migrations.php'); // Or use one of the Doctrine\Migrations\Configuration\Configuration\* loaders
$connectionParams = [
    'host'     => $_ENV['DB_HOST'],
    'user'     => $_ENV['DB_USER'],
    'password' => $_ENV['DB_PASS'],
    'dbname'   => $_ENV['DB_DATABASE'],
    'driver'   => $_ENV['DB_DRIVER'] ?? 'pdo_mysql',
];

$entityManager = new EntityManager(
    DriverManager::getConnection($connectionParams),
    ORMSetup::createAttributeMetadataConfiguration([
        __DIR__ . '/app/Entity',
    ])
);

return DependencyFactory::fromEntityManager($config, new ExistingEntityManager($entityManager));
