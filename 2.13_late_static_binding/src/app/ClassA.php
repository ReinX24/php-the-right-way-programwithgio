<?php

declare(strict_types=1);

namespace app;

class ClassA
{
    protected static string $name = "A";

    public function getName(): string
    {
        // var_dump(get_class($this));
        // return $this->name;

        // Instead of using $this, we use self since this is a static method
        // return self::$name;
        // Self makes it so that the static variable only points to the parent
        // class variable version, to fix this we will use the static keyword
        return static::$name;
    }

    // Static method that creates classes depending on the current class
    public static function make(): static
    {
        return new static();
    }
}
