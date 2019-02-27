<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeIdColumnFromPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("ALTER TABLE payments AUTO_INCREMENT = 345226;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('payments', function (Blueprint $table) {
            //
            $table->dropColumn('id');
        });

        Schema::table('payments', function (Blueprint $table) {
            //
            // $table->dropColumn('id')->jsit();
            $table->increments('id');
        });
    }
}
