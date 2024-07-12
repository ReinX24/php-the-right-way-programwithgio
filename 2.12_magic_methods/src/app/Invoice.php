<?php

namespace App;

class Invoice
{
    protected array $data;

    public function __construct($name, $value)
    {
        $this->data[$name] = $value;
    }

    public function __get($name)
    {
        // Checks if the key exists in the data array
        if (array_key_exists($name, $this->data)) {
            return $this->data[$name];
        }

        return null;
    }

    public function __set($name, $value)
    {
        // Sets the key and value in the data array
        $this->data[$name] = $value;
    }
}
