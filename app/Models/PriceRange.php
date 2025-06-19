<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PriceRange extends Model
{
    use HasFactory;

    protected $fillable = ['min_price', 'max_price'];

    public static function overlaps($min, $max)
    {
        return self::where(function ($query) use ($min, $max) {
            $query->whereBetween('min_price', [$min, $max])
                ->orWhereBetween('max_price', [$min, $max])
                ->orWhere(function ($q) use ($min, $max) {
                    $q->where('min_price', '<=', $min)
                      ->where('max_price', '>=', $max);
                });
        })->exists();
    }
}
