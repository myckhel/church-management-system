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
            $table->integer('branch_id')->index('branch_id_index');
            //$table->integer('member_id')->index('member_id_index');
            $table->bigInteger('amount');
            $table->string('date');
            $table->enum('type',['offering', 'donation','tithe', 'special','first fruit', 'covenant seed','love seed','sacrifice','thanksgiving','other']);
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
