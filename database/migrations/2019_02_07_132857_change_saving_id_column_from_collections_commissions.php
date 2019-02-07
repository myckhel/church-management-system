<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeSavingIdColumnFromCollectionsCommissions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('savings', function (Blueprint $table) {
          //
          $table->index('date_collected');
      });

        Schema::table('collections_commissions', function (Blueprint $table) {
            //
            $table->dropForeign(['saving_id']);
            $table->dropColumn('saving_id');
            $table->date('saving_date_collected');
            $table->foreign('saving_date_collected')->references('date_collected')->on('savings')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('collections_commissions', function (Blueprint $table) {
            //
            $table->dropColumn('saving_date_collected');
            $table->bigInteger('saving_id')->unique()->unsigned(); //unique
        });
    }
}
