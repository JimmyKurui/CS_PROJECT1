<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeProductsColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign('pharmacy_id');
            $table->string('description')->after('name');
            $table->dropColumn('price');
            $table->fullText(['name','description']);
            $table->renameColumn('form', 'dosage_form');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropFullText(['name', 'description']);
            $table->dropColumn('description');
            $table->renameColumn('dosage_form', 'form');
            $table->string('price')->after('dosage_form');
            $table->foreign('pharmacy_id')->references('id')->on('pharmacies')->onDelete('cascade');
        });
    }
}
