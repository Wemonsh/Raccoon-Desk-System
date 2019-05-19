<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCryptoDocumentsMcpiIncomeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crypto_documents_mcpi_income', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->integer('id_operator')->unsigned();
            $table->foreign('id_operator')->references('id')->on('users');
            $table->integer('id_organization')->unsigned();
            $table->foreign('id_organization')->references('id')->on('crypto_organizations');
            $table->integer('id_instance')->unsigned();
            $table->foreign('id_instance')->references('id')->on('crypto_mcpi_instance');
            $table->string('file')->nullable();
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
        Schema::dropIfExists('crypto_documents_mcpi_income');
    }
}
