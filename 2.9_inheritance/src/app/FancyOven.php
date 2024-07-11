<?php

declare(strict_types=1);

namespace App;

class FancyOven
{

    public function __construct(private ToasterPro $toaster)
    {
    }

    public function fry()
    {
        // fry stuff
    }

    public function toast()
    {
        $this->toaster->toast();
    }

    public function bagel()
    {
        $this->toaster->toastBagel();
    }
}
