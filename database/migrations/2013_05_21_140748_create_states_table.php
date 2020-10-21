<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('states', function (Blueprint $table) {
          $table->id();
          $table->string('name', 30)->index();
          $table->bigInteger('country_id')->default(1)->unsigned();
        });

        Schema::table('states', function (Blueprint $table) {
          $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('states');
    }
}
