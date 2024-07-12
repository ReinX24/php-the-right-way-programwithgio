<?php

namespace App;

interface DebtCollector extends AnotherInferface, SomeOtherInterface
{
    public function collect(float $owedAmount): float;
}
