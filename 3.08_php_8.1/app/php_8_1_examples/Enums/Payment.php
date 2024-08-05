<?php

declare(strict_types=1);

namespace App\php_8_1_examples\Enums;

class Payment
{
    private PaymentStatus $status;

    public function updateStatus(PaymentStatus $status): Payment
    {
        $this->status = $status;

        return $this;
    }

    public function status(): PaymentStatus
    {
        return $this->status;
    }
}
