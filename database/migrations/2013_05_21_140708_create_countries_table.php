<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
          $table->id();
          $table->string('sortname', 3)->index();
          $table->string('name', 50)->index();
          $table->integer('phonecode')->index();
          $table->string('flag', 100);
          $table->string('currency_symbol', 4);
          $table->string('currency_code', 10)->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('countries');
    }
}
