<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->uuid('uuid');
            $table->string('equipment');
            $table->string('brand')->nullable();
            $table->string('model')->unique();
            $table->string('condition');
            $table->integer('amount');
            $table->enum('status', ['Ativo', 'Inativo'])->default('Ativo');
            $table->enum('export', ['Y', 'N'])->default('N');
            $table->double('price', 10, 2)->nullable();
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
        Schema::dropIfExists('inventories');
    }
}
