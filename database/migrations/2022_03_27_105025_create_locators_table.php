<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locators', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('partner_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('game_id')->constrained('games')->onDelete('cascade');
            $table->foreignId('client_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->foreignId('device_id')->nullable()->constrained('devices')->onDelete('cascade');
            $table->string('locator')->unique();
            $table->string('serial')->unique()->nullable();
            $table->enum('status', ['Ativo', 'Inativo']);
            $table->softDeletes();
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
        Schema::dropIfExists('locators');
    }
}
