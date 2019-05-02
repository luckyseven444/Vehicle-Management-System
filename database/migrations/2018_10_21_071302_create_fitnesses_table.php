<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFitnessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fitnesses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('vehicle_number');
            $table->date('last_fitness_check');
            $table->date('next_fitness_check');
            $table->text('fitness_description');
            $table->text('fitness_certificate');
            $table->tinyInteger('status');
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
        Schema::dropIfExists('fitnesses');
    }
}
