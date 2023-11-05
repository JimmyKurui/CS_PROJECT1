<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pharmacy extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class)->orderBy('name', 'DESC');
    }

    public static function boot() {
        parent::boot();

        static::deleted(function($pharmacy) { // before delete() method call this
             $pharmacy->products()->delete();
             // do the rest of the cleanup...
        });
    }

}
