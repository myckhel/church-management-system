<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSmsMethodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sms_methods', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sms_client_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->enum('method', ['post', 'get', 'put', 'patch', 'delete'])->default('get');
            $table->json('params')->nullable();
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
        Schema::dropIfExists('sms_methods');
    }
}
