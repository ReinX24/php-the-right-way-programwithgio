<?php

use App\ClassA;
use App\ClassB;

require_once "../vendor/autoload.php";

var_dump(ClassA::make());
var_dump(ClassB::make());

// Calling methods statically
// echo ClassA::getName();
// echo "<br>";
// echo ClassB::getName();

// $classA = new ClassA();
// $classB = new ClassB();

// echo $classA->getName();
// echo "<br>";
// echo $classB->getName();
