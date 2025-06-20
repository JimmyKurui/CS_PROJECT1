<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class ChangeLocationFieldOnPharmacies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Add new columns first
        Schema::table('pharmacies', function (Blueprint $table) {
            $table->dropColumn(['location']);
            $table->decimal('latitude', 10, 5)->nullable();
            $table->decimal('longitude', 11, 5)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
