<?php

use App\MyInterface;
use App\ClassA;

require_once "../vendor/autoload.php";

$obj = new ClassA(1, 2);

var_dump($obj->bar()); // returns an anonymous class

// $obj = new class(1, 2, 3) implements MyInterface
// {
//     public function __construct(public int $x, public int $y, public int $z)
//     {
//     }
// };

// foo($obj);

// function foo(MyInterface $obj)
// {
//     var_dump($obj);
// }
