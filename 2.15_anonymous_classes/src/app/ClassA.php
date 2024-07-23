<?php

namespace App;

class ClassA
{
    public function __construct(public int $x, public int $y)
    {
    }

    public function foo()
    {
        return "foo";
    }

    public function bar(): object
    {
        return new class($this) extends ClassA
        {
            public function __construct(ClassA $myObj)
            {
            }
        };

        // return new class($this->x, $this->y) extends ClassA
        // {
        //     public function __construct(public int $x, public int $y)
        //     {
        //         parent::__construct($x, $y);

        //         echo $this->foo();
        //     }
        // };
    }
}
