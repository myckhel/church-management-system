<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropCurrencyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::dropIfExists('currency');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::create('currency', function (Blueprint $table) {
          $table->string('name', 100)->nullable();
          $table->string('code', 100)->nullable();
          $table->string('symbol', 100)->nullable();
          $table->timestamps();
        });
    }
}
