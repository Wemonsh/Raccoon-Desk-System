<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvPlacementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inv_placements', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('comment');
            $table->integer('id_organization')->unsigned();
            $table->foreign('id_organization')->references('id')->on('inv_organizations');
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
        Schema::dropIfExists('inv_placements');
    }
}
