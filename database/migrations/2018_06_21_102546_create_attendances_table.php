<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('attendances', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->bigInteger('branch_id')->unsigned();
          $table->bigInteger('male');
          $table->bigInteger('female');
          $table->bigInteger('children');
          $table->bigInteger('service_types_id')->unsigned();
          $table->timestamp('attendance_date');
          $table->timestamps();
      });

      Schema::table('attendances', function (Blueprint $table) {
          $table->foreign('service_types_id')->references('id')->on('service_types')->onDelete('cascade');
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
        Schema::dropIfExists('attendances');
    }
}
