<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('branch_id')->unsigned();
            $table->string('order_ids');
            $table->decimal('amount');
            $table->string('order_type');
            $table->string('status');
            $table->string('reference')->nullable();
            $table->string('authorization_code')->nullable();
            $table->string('currency_code')->nullable();
            $table->timestamp('payed_at')->nullable();
            $table->timestamps();
        });

        Schema::table('payments', function (Blueprint $table) {
            $table->foreign('branch_id')->references('id')->on('users')->onDelete('cascade');
        });

        DB::statement("ALTER TABLE payments AUTO_INCREMENT = 345226;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
