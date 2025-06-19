<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateStockLevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_levels', function (Blueprint $table) {
            $table->id();
            $table->enum('level', ['low', 'medium', 'high']);
            $table->text('description');
            $table->timestamps();
        });

        DB::table('stock_levels')->insert([
            [
                'level' => 'low',
                'description' => 'Limited quantity available. Restock needed soon.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'level' => 'medium',
                'description' => 'Sufficient stock available for near-term needs.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'level' => 'high',
                'description' => 'Plenty of stock available.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stock_levels');
    }
}
