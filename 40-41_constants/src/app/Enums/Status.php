<?php

declare(strict_types=1);

namespace App\Enums;

class Status
{
    public const STATUS_PAID = 'paid';
    public const STATUS_PENDING = 'pending';
    public const STATUS_DECLINED = 'declined';

    public const ALL_STATUSES = [
        self::STATUS_PAID => "Paid",
        self::STATUS_PENDING => "Pending",
        self::STATUS_DECLINED => "Declined"
    ];
}
