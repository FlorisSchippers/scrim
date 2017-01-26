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
	        $table->date('date');
	        $table->time('startTime');
	        $table->time('endTime');
	        $table->integer('opponent_id')->nullable();
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