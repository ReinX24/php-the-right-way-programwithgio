<?php

use App\AllInOneCoffeeMaker;
use App\CappuccinoMaker;
use App\CoffeeMaker;
use App\Customer;
use App\Invoice;
use App\LatteMaker;

require_once "../vendor/autoload.php";

$customer = new Customer();
$customer->updateProfile();

$invoice = new Invoice();
$invoice->process();

// $coffeeMaker = new CoffeeMaker();
// $coffeeMaker->makeCoffee();

// $latteMaker = new LatteMaker();
// $latteMaker = $latteMaker->setMilkType("skimmed-milk");
// $latteMaker->makeCoffee();
// $latteMaker->makeLatte();

// $cappucinoMaker = new CappuccinoMaker();
// $cappucinoMaker->makeCoffee();
// $cappucinoMaker->makeCappuccino();

// $allInOneMaker = new AllInOneCoffeeMaker();
// $allInOneMaker = $allInOneMaker->setMilkType("skimmed-milk");
// $allInOneMaker->makeCoffee();
// $allInOneMaker->makeLatte();
// $allInOneMaker->makeCappuccino();

// LatteMaker::foo();
// echo LatteMaker::$x;

// LatteMaker::$foo = "foo";
// AllInOneCoffeeMaker::$foo = "bar"; // changes the class variable through traits

// echo LatteMaker::$foo;
// echo "<br>";
// echo AllInOneCoffeeMaker::$foo;
