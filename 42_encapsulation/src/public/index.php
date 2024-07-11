<?php

require_once __DIR__ . "/../vendor/autoload.php";

use App\PaymentGateway\Paddle\Transaction;

$transaction = new Transaction(25);

$transaction->copyFrom(new Transaction(100));

// Accessing values using ReflectionProperty class
// $reflectionProperty = new ReflectionProperty(Transaction::class, "amount");
// $reflectionProperty->setAccessible(true);
// $reflectionProperty->setValue($transaction, 125);
// var_dump($reflectionProperty->getValue($transaction));

// $transaction->process();
