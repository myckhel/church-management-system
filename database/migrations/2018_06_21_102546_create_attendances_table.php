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
            $table->bigInteger('branch_id')->index('branch_id_index');
            $table->bigInteger('male');
            $table->bigInteger('female');
            $table->bigInteger('children');
            $table->enum('type',['sunday service', 'wednessday service', 'thursday service']);
            $table->string('custom_type')->nullable();
            $table->string('attendance_date');
            $table->timestamps();
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