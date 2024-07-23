<?php

namespace App;

class CappuccinoMaker extends CoffeeMaker
{
    use CappuccinoTrait {
        // Changing visibility status from private to public
        CappuccinoTrait::makeCappuccino as public;
    }
}
