<?php

namespace App;

trait LatteTrait
{
    private string $milkType = "whole-milk";
    public static int $x = 1;

    public static $foo;

    final public function makeLatte()
    {
        echo __CLASS__ . " is making latte with " . $this->milkType . "<br>";
    }

    public function setMilkType(string $milkType): static
    {
        $this->milkType = $milkType;

        return $this;
    }
}
