<?php

use App\CollectionAgency;
use App\DebtCollectionService;
use App\Rocky;

require_once __DIR__ . "/../vendor/autoload.php";

$collector = new DebtCollectionService;

// echo $collector->collectDebt(new CollectionAgency);
echo $collector->collectDebt(new Rocky());
