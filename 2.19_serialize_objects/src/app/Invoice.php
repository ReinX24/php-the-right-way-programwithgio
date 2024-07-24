<?php

namespace App;

class Invoice
{
    public string $id;

    public function __construct(
        public float $amount,
        public string $description,
        public string $creditCardNumber
    ) {
        $this->id = uniqid("invoice_");
    }

    /**
     * Summary of __serialize
     * Gets called before the object is serialized, somewhat similar to the
     * sleep method.
     * Must return an associative array that represents the object.
     * @return void
     */
    public function __serialize(): array
    {
        return [
            "id" => $this->id,
            "amount" => $this->amount,
            "description" => $this->description,
            "creditCardNumber" => base64_encode($this->creditCardNumber),
            "foo" => "bar"
        ];
    }

    public function __unserialize(array $data): void
    {
        $this->id = $data["id"];
        $this->amount = $data["amount"];
        $this->description = $data["description"];
        $this->creditCardNumber = base64_decode($data["creditCardNumber"]);
    }
}
