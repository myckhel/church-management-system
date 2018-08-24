<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MembersAttendance extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('members_attendance', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('firstname');
            $table->string('lastname');
            $table->date('date');
            $table->enum('attendance',['yes','no']);
            $table->enum('service_type', ['sunday service', 'thursday service', 'wednesday service', 'monday service', 'tuesday service', 'saturday service', 'friday service']);
          });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
