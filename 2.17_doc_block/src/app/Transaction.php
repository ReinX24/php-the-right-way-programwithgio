<?php

namespace App;

use RuntimeException;

/**
 * Summary of Transaction
 * 
 * @property int $x
 * @property float $y
 * 
 * @method int foo(string $x)
 */
class Transaction
{
    /**
     * Summary of customer
     * @var Customer
     */
    private $customer;

    /**
     * Summary of amount
     * @var float
     */
    private $amount;

    /**
     * Summary of foo
     * @param Customer[] $arr
     * @return void
     */
    public function foo(array $arr)
    {
        foreach ($arr as $obj) {
            $obj->name;
        }
    }

    /**
     * Some description
     * 
     * @param Customer $customer
     * @param float $amount
     * 
     * @throws \RuntimeException
     * @throws \InvalidArgumentException
     * 
     * @return bool
     */
    // public function process(Customer $customer, float $amount): bool
    // {
    //     // process transaction

    //     // if failed, return false

    //     // otherwise, return true
    //     return true;
    // }
}
