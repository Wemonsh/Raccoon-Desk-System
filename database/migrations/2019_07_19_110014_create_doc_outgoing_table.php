<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocOutgoingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doc_outgoing', function (Blueprint $table) {
            $table->increments('id');

            $table->string('nomenclature');
            $table->string('number');
            $table->string('pages');
            $table->string('content');
            $table->date('date_of_registration');
            $table->json('files');

            $table->integer('id_departament')->unsigned();
            $table->foreign('id_departament')->references('id')->on('doc_departaments');

            $table->integer('id_korrespondent')->unsigned();
            $table->foreign('id_korrespondent')->references('id')->on('doc_korrespondents');

            $table->integer('id_executor')->unsigned();
            $table->foreign('id_executor')->references('id')->on('doc_executors');

            $table->integer('id_user')->unsigned();
            $table->foreign('id_user')->references('id')->on('users');

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
        Schema::dropIfExists('doc_outgoing');
    }
}
