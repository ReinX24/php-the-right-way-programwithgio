<?php

declare(strict_types=1);

use App\Entity\Invoice;
use App\Enums\InvoiceStatus;
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

$entityManager = new EntityManager(
    DriverManager::getConnection($connectionParams),
    ORMSetup::createAttributeMetadataConfiguration([
        __DIR__ . '/Entity',
    ])
);

//* Start of Query Builder
$queryBuilder = $entityManager->createQueryBuilder();
$query = $queryBuilder
    ->select("i")
    ->from(Invoice::class, "i")
    ->where("i.amount > :amount")
    ->setParameter("amount", 100)
    ->orderBy("i.createdAt", "DESC")
    ->getQuery();

// echo $query->getDQL() . PHP_EOL;

$invoices = $query->getResult();

// var_dump($invoices);

/** @var Invoice $invoice */
// TODO: resume @6:24
foreach ($invoices as $invoice) {
    echo $invoice->getCreatedAt()->format("m/d/Y g:ia")
        . ", " . $invoice->getAmount()
        . ", " . $invoice->getStatus()
        ->toString() . PHP_EOL;
}

//* Start of PHP Entities
// $invoice = $entityManager->find(Invoice::class, 10); // finds invoice using id

// $invoice->setStatus(InvoiceStatus::Paid); // setting status to Paid(1)
// $invoice->getItems()->get(0)->setDescription("Foo bar"); // editing first item

// $entityManager->flush();

// $items = [
//     ["Item 1", 1, 15],
//     ["Item 2", 2, 7.5],
//     ["Item 3", 4, 3.75]
// ];

// $invoice = (new \App\Entity\Invoice())
//     ->setAmount(45)
//     ->setInvoiceNumber("1")
//     ->setStatus(\App\Enums\InvoiceStatus::Pending)
//     ->setCreatedAt(new DateTime());

// foreach ($items as [$description, $quantity, $unitPrice]) {
//     $item = (new \App\Entity\InvoiceItem())
//         ->setDescription($description)
//         ->setQuantity($quantity)
//         ->setUnitPrice($unitPrice);

//     $invoice->addItem($item);
//     $entityManager->persist($item); // No need to persist because items cascade into invoice 

// }

// Adding the entities to our database
// $entityManager->persist($invoice);
// $entityManager->flush();

// Removing the entities from our database
// $entityManager->remove($invoice);
// $entityManager->flush();

// echo $entityManager->getUnitOfWork()->size();
