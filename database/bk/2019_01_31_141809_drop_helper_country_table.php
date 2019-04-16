<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropHelperCountryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::dropIfExists('helper_country');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::create('helper_country', function (Blueprint $table) {
            $table->integer('ID', 11)->primary();
            $table->string('code', 3);
            $table->string('name', 150);
            $table->string('dial_code', 11);
            $table->string('currency_name', 20);
            $table->string('currency_symbol', 20);
            $table->string('currency_code', 20);
            $table->timestamps();
        });
    }
}
