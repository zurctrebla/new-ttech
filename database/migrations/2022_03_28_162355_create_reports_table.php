<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->string('equipment');
            $table->string('string');
            $table->string('abnormality');
            $table->string('tag');
            $table->foreignId('created_for')->constrained('users')->onDelete('cascade');
            $table->string('status');
            $table->string('conclusion');
            $table->string('fail');
            $table->string('obs');
            $table->foreignId('finished_for')->constrained('users')->onDelete('cascade');
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
        Schema::dropIfExists('reports');
    }
}
