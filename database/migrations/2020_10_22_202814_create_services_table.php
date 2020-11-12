<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('church_id')->unsigned();
            $table->string('name', 70);
            $table->datetime('start');
            $table->bigInteger('duration'); //mins
            // $table->enum('recurrence', ['daily', 'weekly', 'monthly', 'yearly'])->nullable();
            $table->json('recurrence')->nullable(); //{day:1, week: 2}
            $table->boolean('regular')->default(false);
            $table->boolean('isGlobal')->default(false);
            $table->timestamps();
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
        Schema::dropIfExists('services');
    }
}
