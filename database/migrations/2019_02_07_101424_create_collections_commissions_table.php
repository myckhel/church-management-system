<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollectionsCommissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collections_commissions', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('branch_id')->unsigned();
            $table->bigInteger('saving_id')->unique()->unsigned(); //unique
            $table->timestamps();
        });

        Schema::table('collections_commissions', function (Blueprint $table) {
          $table->foreign('branch_id')->references('id')->on('users')->onDelete('cascade');
          $table->foreign('saving_id')->references('id')->on('savings')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('collections_commissions');
    }
}
