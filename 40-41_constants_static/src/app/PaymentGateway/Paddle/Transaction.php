<?php

declare(strict_types=1);

namespace App\PaymentGateway\Paddle;

use App\Enums\Status;
use InvalidArgumentException;

class Transaction
{
    private string $status = Status::STATUS_PENDING;

    private static int $count = 0;

    public function __construct(
        public float $amount,
        public string $description
    ) {
        self::$count++;
    }

    public static function getCount()
    {
        return self::$count;
    }

    public function process()
    {
        // array_map(function () {
        //     $this->amount = 35;
        // }, [1]);
        echo "Processing paddle transaction...";
    }

    public function setStatus(string $status): self
    {
        // Checks if the entered status is a constant in our class
        if (!isset(Status::ALL_STATUSES[$status])) {
            throw new InvalidArgumentException("Invalid status");
        }
        $this->status = $status;

        return $this;
    }
}
