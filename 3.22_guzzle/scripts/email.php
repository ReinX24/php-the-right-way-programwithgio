<?php

declare(strict_types=1);

use App\App;
use App\Config;
use App\Container;
use App\Controllers\GeneratorExampleController;
use App\Controllers\HomeController;
use App\Controllers\InvoiceController;
use App\Controllers\UserController;
use App\Router;

require_once __DIR__ . '/../vendor/autoload.php';

define('STORAGE_PATH', __DIR__ . '/../storage');

$container = new Container();

(new App($container))->boot();

$container->get(\App\Services\EmailService::class)->sendQueuedEmails();
