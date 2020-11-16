<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSmsClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sms_clients', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50)->index();
            $table->foreignId('church_id')->constrained()->onDelete('cascade');
            $table->string('endpoint');
            $table->string('auth_type', 20)->nullable();
            $table->json('auth')->nullable();
            $table->boolean('is_primary')->default(0);
            $table->boolean('is_global')->default(0);
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
        Schema::dropIfExists('sms_clients');
    }
}
