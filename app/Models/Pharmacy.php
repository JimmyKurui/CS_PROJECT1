<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pharmacy extends Model
{
    use HasFactory;
    protected $guarded = [];

    public static function boot()
    {
        parent::boot();

        static::deleted(function ($pharmacy) { // before delete() method call this
            $pharmacy->products()->delete();
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class)
            ->using(PharmacyProduct::class)
            ->withPivot(['stock_level_id', 'price_range_id'])
            ->withTimestamps();
    }

    public function scopeDistanceMeters($query, $latitude, $longitude, $radiusMeters)
    {
        return $query->selectRaw(
            "*, ( 6371000 * acos( cos( radians(?) ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians(?) ) + sin( radians(?) ) * sin( radians( latitude ) ) ) ) AS distance",
            [$latitude, $longitude, $latitude]
        )
            ->having('distance', '<=', $radiusMeters)
            ->orderBy('distance');
    }
}
