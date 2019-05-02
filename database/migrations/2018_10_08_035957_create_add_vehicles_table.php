<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('add_vehicles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('model_no');
            $table->string('registration_no');
            $table->string('chassis_no');
            $table->string('engine_no');
            $table->string('vehicle_type');
            $table->string('number_of_seat');
            $table->string('owner');
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
        Schema::dropIfExists('add_vehicles');
    }
}
