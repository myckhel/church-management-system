<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSavingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('savings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('branch_id')->unsigned();
            $table->integer('collections_types_id')->unsigned();
            $table->integer('service_types_id')->unsigned();
            $table->bigInteger('amount');
            $table->timestamps();
        });

        Schema::table('savings', function (Blueprint $table) {
            $table->foreign('branch_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('savings', function (Blueprint $table) {
            $table->foreign('collections_types_id')->references('id')->on('collections_types')->onDelete('cascade');
        });

        Schema::table('savings', function (Blueprint $table) {
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
        Schema::dropIfExists('savings');
    }
}
