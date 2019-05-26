<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnnouncementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::dropIfExists('announcements');
      Schema::create('announcements', function (Blueprint $table) {
          $table->increments('id');
          $table->bigInteger('branch_id')->unsigned();
          $table->string('details');
          $table->string('by_who');
          $table->date('start_date');
          $table->date('stop_date');
          $table->time('start_time');
          $table->time('stop_time');
          $table->timestamps();
      });

      Schema::table('announcements', function (Blueprint $table) {
        $table->foreign('branch_id')->references('id')->on('users')->onDelete('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('announcements');
    }
}
