<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCryptoMcpiInstance extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crypto_mcpi_instance', function (Blueprint $table) {
            $table->increments('id');
            $table->string('serial_number');
            $table->integer('id_models')->unsigned();
            $table->foreign('id_models')->references('id')->on('crypto_mcpi_models');
            $table->text('comment');
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
        Schema::dropIfExists('crypto_mcpi_instance');
    }
}
