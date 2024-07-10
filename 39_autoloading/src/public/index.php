<?php

// require_once "../App/PaymentGateway/Stripe/Transaction.php";

// require_once "../App/PaymentGateway/Paddle/Transaction.php";
// require_once "../App/PaymentGateway/Paddle/CustomerProfile.php";
// require_once "../App/Notification/Email.php";

// spl_autoload_register(function ($class) {
// lcfirst makes first character lowercase
// Replacing backslashes to forward slashes and adding .php to the end
// $path = __DIR__ . "/../" . lcfirst(str_replace("\\", "/", $class)) . ".php";
// var_dump($path);
//     if (file_exists($path)) {
//         require $path;
//     }
// });

// Prepend makes this autoloader load first
// spl_autoload_register(function ($class) {
//     var_dump("Autoloader 2");
// }, prepend: true);

// Using composer to autoload classes

// phpinfo();
// echo "<pre>";
// var_dump($_SERVER);
// echo "</pre>";

require_once __DIR__ . "/../vendor/autoload.php";

// Imported package
use Ramsey\Uuid\UuidFactory;

$id = new UuidFactory();

echo $id->uuid4();

// Local package
use App\PaymentGateway\Paddle\Transaction;

$paddleTransaction = new Transaction();

var_dump($paddleTransaction);
