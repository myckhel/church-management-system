<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email', 50)->unique();
            $table->enum('title', ['Mr', 'Mrs', 'Miss','Dr (Mrs)', 'Dr', 'Prof', 'Chief', 'Chief (Mrs)', 'Engr', 'Surveyor', 'HRH','Elder'])->default('Mr');
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->enum('sex', ['male', 'female'])->default('male');
            $table->date('dob')->nullable();
            $table->string('phone_code', 4)->nullable();
            $table->integer('phone')->nullable();
            $table->enum('marital_status', ['married', 'single', 'divorced'])->nullable();
            $table->string('occupation', 100)->nullable();
            $table->bigInteger('country_id')->nullable()->unsigned();
            $table->bigInteger('state_id')->nullable()->unsigned();
            $table->string('city', 80)->nullable();
            $table->string('address')->nullable();
            $table->date('wedding_anniversary')->nullable();
            $table->string('password');
            $table->softDeletes();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamps();
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
            $table->foreign('state_id')->references('id')->on('states')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
