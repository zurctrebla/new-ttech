<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->enum('type', ['Montagem', 'Venda']);
            $table->string('number');
            $table->integer('amount');
            $table->text('description')->nullable();
            $table->date('delivery');
            $table->enum('status', ['Aberto', 'Finalizado','Rejeitado', 'Cancelado', 'Entregue']);
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
        Schema::dropIfExists('orders');
    }
}