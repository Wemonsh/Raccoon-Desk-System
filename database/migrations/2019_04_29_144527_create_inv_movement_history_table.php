<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvMovementHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inv_movement_history', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->integer('id_placement_from')->unsigned();
            $table->foreign('id_placement_from')->references('id')->on('inv_placements');
            $table->integer('id_responsible_from')->unsigned();
            $table->foreign('id_responsible_from')->references('id')->on('users');
            $table->integer('id_placement_to')->unsigned();
            $table->foreign('id_placement_to')->references('id')->on('inv_placements');
            $table->integer('id_responsible_to')->unsigned();
            $table->foreign('id_responsible_to')->references('id')->on('users');
            $table->integer('id_operator')->unsigned();
            $table->foreign('id_operator')->references('id')->on('users');
            $table->string('comment');
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
        Schema::dropIfExists('inv_movement_history');
    }
}
