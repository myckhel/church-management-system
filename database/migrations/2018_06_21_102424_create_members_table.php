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
            $table->bigInteger('branch_id')->index('branch_id_index');
            $table->enum('title', ['Mr', 'Mrs', 'Dr (Mrs)', 'Dr', 'Prof', 'Chief', 'Chief (Mrs)', 'Engr', 'Surveyor', 'HRH']);
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('email', 30)->unique();
            $table->string('dob')->nullable();
            $table->string('phone')->nullable();
            $table->string('occupation')->nullable();
            $table->enum('position',['senior pastor','pastor', 'elder','usher','member', 'chorister','technician','instrumentalist'])->default('member');
            $table->string('address')->nullable();
            $table->enum('sex', ['male', 'female']);
            $table->enum('marital_status', ['married', 'single'])->nullable();
            $table->string('member_since')->nullable();
            $table->string('photo');
            $table->string('relative')->nullable();
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
        Schema::dropIfExists('members');
    }
}
