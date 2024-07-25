<?php

namespace App;

class Collection implements \IteratorAggregate
{
    public function __construct(private array $items)
    {
    }

    //* IteratorAggregate implemented methods
    public function getIterator(): \Traversable
    {
        return new \ArrayIterator($this->items);
    }
}
