<?php

namespace App;

abstract class Field
{
    public function __construct(protected string $name)
    {
    }

    // Abstract method
    public abstract function render(): string;
}
