<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCryptoDocumentsKeyTransferTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crypto_documents_key_transfer', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->integer('id_certificate')->unsigned();
            $table->foreign('id_certificate')->references('id')->on('crypto_certificates');
            $table->integer('id_operator')->unsigned();
            $table->foreign('id_operator')->references('id')->on('users');
            $table->integer('id_user')->unsigned();
            $table->foreign('id_user')->references('id')->on('users');
            $table->integer('id_storage')->unsigned();
            $table->foreign('id_storage')->references('id')->on('crypto_storages');
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
        Schema::dropIfExists('crypto_documents_key_transfer');
    }
}
