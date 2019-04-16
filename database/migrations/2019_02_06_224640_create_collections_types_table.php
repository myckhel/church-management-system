<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollectionsTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collections_types', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->bigInteger('branch_id')->unsigned();
          $table->string('name');
          $table->timestamps();
      });

      Schema::table('collections_types', function (Blueprint $table) {
          $table->foreign('branch_id')->references('id')->on('users');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('collections_types');
    }
}
