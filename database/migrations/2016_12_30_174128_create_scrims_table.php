<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScrimsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scrims', function (Blueprint $table) {
	        $table->increments('id');
	        $table->integer('team_id');
	        $table->dateTime('startTime');
	        $table->dateTime('endTime');
	        $table->integer('opponentId')->nullable();
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
        Schema::dropIfExists('scrims');
    }
}