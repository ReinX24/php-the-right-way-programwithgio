<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

// Class is converted into "invoice_items" table
/**
 * @property int $id
 * @property string $invoice_id
 * @property string $description
 * @property int $quantity
 * @property float $unit_price
 */
class InvoiceItem extends Model
{
    public $timestamps = false;

    public function invoice(): BelongsTo
    {
        return $this->belongsTo(Invoice::class);
    }
}
