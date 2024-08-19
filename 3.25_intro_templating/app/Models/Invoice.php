<?php

namespace App\Models;

use App\Enums\InvoiceStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

// Class is converted into "invoice" table
/**
 * @property int $id
 * @property string $invoice_number
 * @property float $amount
 * @property InvoiceStatus $status
 * @property Carbon $created_at
 * @property Carbon $due_date
 * 
 * @property-read Collection $items
 */
class Invoice extends Model
{
    const UPDATED_AT = null;

    protected $casts = [
        "created_at" => "datetime",
        "due_date" => "datetime",
        "status" => InvoiceStatus::class
    ];

    //* Ran when the object is saved to the database
    public static function booted()
    {
        static::creating(function (Invoice $invoice) {
            if ($invoice->isClean("due_date")) {
                $invoice->due_date = (new Carbon())->addDays(10);
            }
        });
    }

    public function items(): HasMany
    {
        return $this->hasMany(InvoiceItem::class);
    }
}
