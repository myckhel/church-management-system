<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->bigInteger('branch_id')->unsigned();
            $table->enum('title', ['Mr', 'Mrs', 'Miss','Dr (Mrs)', 'Dr', 'Prof', 'Chief', 'Chief (Mrs)', 'Engr', 'Surveyor', 'HRH','Elder','Oba','Olori']);
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('email', 50)->unique();
            $table->string('dob')->nullable();
            $table->string('phone')->nullable();
            $table->string('occupation')->nullable();
            $table->enum('position',['worker','senior pastor','pastor', 'elder','usher','member', 'chorister','technician','instrumentalist', 'deacon','deaconess','evangelist','minister','protocol'])->default('member');
            $table->string('address')->nullable();
            $table->string('address2')->nullable();
            $table->string('postal')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->enum('sex', ['male', 'female']);
            $table->enum('marital_status', ['married', 'single'])->nullable();
            $table->string('member_since')->nullable();
            $table->string('wedding_anniversary')->nullable();
            $table->string('photo');
            $table->string('relative')->nullable();
            $table->enum('member_status', ['old', 'new'])->default('old');
            $table->timestamps();
        });

        Schema::table('members', function (Blueprint $table) {
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
        Schema::dropIfExists('members');
    }
}
