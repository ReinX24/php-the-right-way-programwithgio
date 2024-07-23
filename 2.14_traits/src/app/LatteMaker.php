<?php

namespace App;

class LatteMaker extends CoffeeMaker
{
    use LatteTrait; // imports code from LatteTrait

    public function makeLatte()
    {
        echo "MAKING LATTE <br>";
    }
}
