<?php

declare(strict_types=1);

namespace App\VarianceExample;

class DogShelter implements AnimalShelter
{
    public function adopt(string $name): Animal
    {
        return new Dog($name);
    }
}
