<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('classType', ['Bisnis', 'Eksekutif', 'Ekonomi', 'Premium']);  
            $table->dateTimeTz('dateStart');
            $table->unsignedBigInteger('startStation');
            $table->dateTimeTz('startTime');
            $table->unsignedBigInteger('destinationStation');
            $table->dateTimeTz('arrivalTime');
            $table->integer('price');
            $table->integer('qty');
            $table->dateTimeTz("createdAt");
            $table->dateTimeTz("updatedAt");

            $table->foreign('startStation')->references('id')->on('stations')->onDelete('cascade');
            $table->foreign('destinationStation')->references('id')->on('stations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
