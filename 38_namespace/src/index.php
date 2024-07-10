<?php

require_once "../PaymentGateway/Stripe/Transaction.php";

require_once "../PaymentGateway/Paddle/Transaction.php";
require_once "../PaymentGateway/Paddle/CustomerProfile.php";
require_once "../PaymentGateway/Paddle/DateTime.php";

require_once "../Notification/Email.php";

// use PaymentGateway\Paddle\{Transaction as PaddleTransaction, CustomerProfile};
use PaymentGateway\Paddle as PA;
use PaymentGateway\Stripe\Transaction as StripeTransaction;

$stripeTransaction = new StripeTransaction();

// $paddleTransaction = new PaddleTransaction();
// $paddleCustomerProfile = new CustomerProfile();

$paddleTransaction = new PA\Transaction();
$paddleCustomerProfile = new PA\CustomerProfile();

var_dump($paddleTransaction, $stripeTransaction);
