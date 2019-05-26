<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_attendances', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->bigInteger('member_id')->unsigned();
          $table->bigInteger('service_types_id')->unsigned();
          $table->enum('attendance',['yes','no']);
          $table->date('date');
          $table->timestamps();
        });

        Schema::table('member_attendances', function (Blueprint $table) {
            $table->foreign('service_types_id')->references('id')->on('service_types')->onDelete('cascade');
            $table->foreign('member_id')->references('id')->on('members')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('member_attendances');
    }
}
