<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collections', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->bigInteger('branch_id')->unsigned();
          $table->bigInteger('collections_types_id')->unsigned();
          $table->bigInteger('service_types_id')->unsigned();
          $table->bigInteger('amount');
          $table->date('date')->index();
          $table->timestamps();
        });

        Schema::table('collections', function (Blueprint $table) {
            $table->foreign('branch_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('collections_types_id')->references('id')->on('collections_types')->onDelete('cascade');
            $table->foreign('service_types_id')->references('id')->on('service_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('collections');
    }
}
