<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvDevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inv_devices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('id_manufacture')->unsigned();
            $table->foreign('id_manufacture')->references('id')->on('inv_manufactures');
            $table->integer('id_type')->unsigned();
            $table->foreign('id_type')->references('id')->on('inv_types');
            $table->json('specifications')->nullable();
            $table->string('photo')->nullable();
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
        Schema::dropIfExists('inv_devices');
    }
}
