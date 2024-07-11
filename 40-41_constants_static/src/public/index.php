<?php

require_once __DIR__ . "/../vendor/autoload.php";

use App\DB;
use App\Enums\Status;
use App\PaymentGateway\Paddle\Transaction;

$db = DB::getInstance([]);
// $db = DB::getInstance([]);
// $db = DB::getInstance([]);
// $db = DB::getInstance([]);
// $db = DB::getInstance([]);

$transaction = new Transaction(25, "Transaction 1");

$transaction->process();

var_dump($transaction->amount);

// var_dump($transaction->getCount()); // not recommended
// var_dump($transaction::getCount());

// $transaction->setStatus(Status::STATUS_PAID);
