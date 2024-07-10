<?php

declare(strict_types=1);

namespace App\PaymentGateway\Paddle;

use App\Enums\Status;
use InvalidArgumentException;

class Transaction
{
    public static int $count = 0;

    private string $status;

    public function __construct()
    {
        $this->setStatus(STATUS::STATUS_PENDING);
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
