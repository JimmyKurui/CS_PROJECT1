<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class PharmacyProduct extends Pivot
{
    protected $table = 'pharmacy_product';

    protected $guarded = [];

    public function stockLevel()
    {
        return $this->belongsTo(StockLevel::class);
    }

    public function priceRange()
    {
        return $this->belongsTo(PriceRange::class);
    }
}
