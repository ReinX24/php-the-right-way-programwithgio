<?php

declare(strict_types=1);

namespace App;

use Stringable;

class Invoice
{
    protected array $data;

    private float $amount;
    private int $id = 1;
    private string $accountNumber = "0123456789";

    public function __construct($name, $value)
    {
        $this->data[$name] = $value;
    }

    // var_dump method output
    public function __debugInfo()
    {
        return [
            "id" => $this->id,
            // Showing only the last 4 characters of accountNumber
            "accountNumber" => "****" . substr($this->accountNumber, -4)
        ];
    }

    public function __invoke()
    {
        var_dump("invoked");
    }

    public function __toString(): string
    {
        return "hello";
    }

    protected function process(float $amount, string $description)
    {
        var_dump($amount, $description);
    }

    // Triggers when an object calls a function
    public function __call(string $name, array $arguments)
    {
        // Checks if the method exists in the class
        if (method_exists($this, $name)) {
            call_user_func_array([$this, $name], $arguments);
        }
        // var_dump($name, $arguments);
    }

    public static function __callStatic($name, $arguments)
    {
        var_dump("static", $name, $arguments);
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

    // Checks if the key is in the data array
    public function __isset($name)
    {
        var_dump("isset");
        return array_key_exists($name, $this->data);
    }

    public function __unset($name)
    {
        var_dump("unset");
        unset($this->data[$name]);
    }
}
