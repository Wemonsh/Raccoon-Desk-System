<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCryptoCertificates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crypto_certificates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('serial_number');
            $table->integer('id_organization')->unsigned();
            $table->foreign('id_organization')->references('id')->on('crypto_organizations');
            $table->integer('id_user')->unsigned();
            $table->foreign('id_user')->references('id')->on('users');
            $table->integer('id_assignment')->unsigned();
            $table->foreign('id_assignment')->references('id')->on('crypto_assignment');
            $table->string('file')->nullable();
            $table->date('date_from');
            $table->date('date_to');
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
        Schema::dropIfExists('crypto_certificates');
    }
}
