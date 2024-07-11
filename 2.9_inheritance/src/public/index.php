<?php

require_once __DIR__ . "/../vendor/autoload.php";

use App\FancyOven;
use App\Toaster;
use App\ToasterPro;

// $toaster = new Toaster();
$toaster = new ToasterPro();

$toaster->addSlice("bread");
$toaster->addSlice("bread");
$toaster->addSlice("bread");
$toaster->addSlice("bread");
$toaster->addSlice("bread");

$fancyOven = new FancyOven($toaster);
$fancyOven->toast();
$fancyOven->bagel();

// $toaster->toast();
// $toaster->toastBagel();

// foo($toaster);

function foo(Toaster $toaster)
{
    $toaster->toast();
}
