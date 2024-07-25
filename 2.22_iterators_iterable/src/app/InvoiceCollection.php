<?php

namespace App;

use App\Collection;

// class InvoiceCollection implements \Iterator
class InvoiceCollection extends Collection
{
    // private int $key;

    // public function __construct(public array $invoices)
    // {
    // }

    //* Methods to be implemented due to the Iterator interface
    //     public function current(): mixed
    //     {
    //         echo __METHOD__ . PHP_EOL;
    //         // return current($this->invoices);
    //         return $this->invoices[$this->key];
    //     }

    //     public function next(): void
    //     {
    //         echo __METHOD__ . PHP_EOL;
    //         // next($this->invoices);
    //         ++$this->key;
    //     }

    //     public function key(): mixed
    //     {
    //         echo __METHOD__ . PHP_EOL;
    //         // return key($this->invoices);
    //         return $this->key;
    //     }

    //     public function valid(): bool
    //     {
    //         echo __METHOD__ . PHP_EOL;
    //         // return current($this->invoices) !== false;
    //         return isset($this->invoices[$this->key]);
    //     }

    //     public function rewind(): void
    //     {
    //         echo __METHOD__ . PHP_EOL;
    //         // reset($this->invoices);q
    //         $this->key = 0;
    //     }
}
