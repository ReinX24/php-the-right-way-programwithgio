<?php

namespace App;

class AllInOneCoffeeMaker extends CoffeeMaker
{
    use LatteTrait;

    use CappuccinoTrait {
        CappuccinoTrait::makeCappuccino as public;
    }

    // use CappuccinoTrait {
    //     CappuccinoTrait::makeLatte insteadof LatteTrait;
    // }
    // use LatteTrait {
    // Resolving conflicts in functions, makes use of makeLatte in LatteTrait
    // LatteTrait::makeLatte insteadof CappuccinoTrait;
    // Setting an alias for a function
    // LatteTrait::makeLatte as makeOriginalLatte;
    // }
}
