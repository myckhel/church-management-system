<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropMembersAttendanceColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('members_attendances', function($table) {
        $table->dropColumn('title');
        $table->dropColumn('firstname');
        $table->dropColumn('lastname');
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
        Schema::table('members_attendances', function($table) {
          $table->string('title');
          $table->string('firstname');
          $table->string('lastname');
        });
    }
}
