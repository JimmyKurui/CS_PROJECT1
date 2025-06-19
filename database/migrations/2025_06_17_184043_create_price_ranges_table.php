<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\PriceRange;

class CreatePriceRangesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('price_ranges', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('min_price');
            $table->unsignedBigInteger('max_price');
            $table->timestamps();
        });

        $ranges = [
            ['min_price' => 1000, 'max_price' => 5000],
            ['min_price' => 5001, 'max_price' => 10000],
            ['min_price' => 10001, 'max_price' => 20000],
        ];

        foreach ($ranges as $range) {
            if (!PriceRange::overlaps($range['min_price'], $range['max_price'])) {
                PriceRange::create($range);
            } else {
                echo "Skipping overlapping range: {$range['min_price']} - {$range['max_price']}\n";
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('price_ranges');
    }
}
