<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messaging', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('msg_to')->unsigned();
            $table->bigInteger('msg_from')->unsigned();
            $table->string('subject');
            $table->text('msg');
            $table->boolean('seen')->default(0);
            $table->timestamp('date');
            $table->timestamps();
        });

        Schema::table('messaging', function (Blueprint $table) {
          $table->foreign('msg_to')->references('id')->on('users')->onDelete('cascade');
          $table->foreign('msg_from')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messaging');
    }
}
