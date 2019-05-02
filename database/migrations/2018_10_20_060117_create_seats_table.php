<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seats', function (Blueprint $table) {
            $table->increments('id');
            $table->string('vehicle_id');
            $table->string('seat_number');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('employee_seat', function (Blueprint $table) {
            $table->integer('employee_id');
            $table->integer('seat_id');
            $table->primary(['employee_id', 'seat_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seats');
        Schema::dropIfExists('employee_seat');
    }
}
