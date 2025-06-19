<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function pharmacies()
    {
        return $this->belongsToMany(Pharmacy::class)
            ->using(PharmacyProduct::class)
            ->withPivot(['price_range_id', 'stock_level_id'])
            ->withTimestamps();
    }
}
