<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('church_id')->unsigned();
            $table->date('member_since')->nullable();
            $table->timestamps();
            // $table->enum('position',['worker','senior pastor','pastor', 'elder','usher','member', 'chorister','technician','instrumentalist', 'deacon','deaconess','evangelist','minister','protocol'])->default('member');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('church_id')->references('id')->on('churches')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members');
    }
}
