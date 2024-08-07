<?php

declare(strict_types=1);

use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;
use Dotenv\Dotenv;

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

// TODO: resume @20:09
$entityManager = new EntityManager(
    DriverManager::getConnection($connectionParams),
    ORMSetup::createAttributeMetadataConfiguration([
        __DIR__ . '/Entity',
    ])
);

$items = [
    ["Item 1", 1, 15],
    ["Item 2", 2, 7.5],
    ["Item 3", 4, 3.75]
];

$invoice = (new \App\Entity\Invoice())
    ->setAmount(45)
    ->setInvoiceNumber("1")
    ->setStatus(\App\Enums\InvoiceStatus::Pending)
    ->setCreatedAt(new DateTime());


foreach ($items as [$description, $quantity, $unitPrice]) {
    $item = (new \App\Entity\InvoiceItem())
        ->setDescription($description)
        ->setQuantity($quantity)
        ->setUnitPrice($unitPrice);

    $invoice->addItem($item);
    $entityManager->persist($item);
}

$entityManager->persist($invoice);
