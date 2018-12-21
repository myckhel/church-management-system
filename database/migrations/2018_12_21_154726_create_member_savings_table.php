<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberSavingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_savings', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('branch_id')->unsigned();
            $table->bigInteger('member_id')->unsigned();
            $table->integer('collections_types_id')->unsigned();
            $table->integer('service_types_id')->unsigned();
            $table->bigInteger('amount');
            $table->date('date_collected');
            $table->timestamps();
        });

        Schema::table('member_savings', function (Blueprint $table) {
            $table->foreign('branch_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('member_savings', function (Blueprint $table) {
            $table->foreign('member_id')->references('id')->on('members')->onDelete('cascade');
        });


        Schema::table('member_savings', function (Blueprint $table) {
            $table->foreign('collections_types_id')->references('id')->on('collections_types')->onDelete('cascade');
        });

        Schema::table('member_savings', function (Blueprint $table) {
            $table->foreign('service_types_id')->references('id')->on('service_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('member_savings');
    }
}
