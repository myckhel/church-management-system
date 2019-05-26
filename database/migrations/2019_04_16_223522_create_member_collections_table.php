<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberCollectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('member_collections', function (Blueprint $table) {
          $table->increments('id');
          $table->bigInteger('branch_id')->unsigned();
          $table->bigInteger('member_id')->unsigned();
          $table->bigInteger('collections_types_id')->unsigned();
          $table->bigInteger('service_types_id')->unsigned();
          $table->bigInteger('amount');
          $table->date('date_collected');
          $table->timestamps();
      });

      Schema::table('member_collections', function (Blueprint $table) {
          $table->foreign('branch_id')->references('id')->on('users')->onDelete('cascade');
          $table->foreign('member_id')->references('id')->on('members')->onDelete('cascade');
          $table->foreign('collections_types_id')->references('id')->on('collections_types')->onDelete('cascade');
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
        Schema::dropIfExists('member_collections');
    }
}
