<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocIncomingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doc_incoming', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date_of_registration')->nullable();
            $table->string('pages')->nullable();
            $table->string('other_korrespondent')->nullable();
            $table->string('index_korrespondent')->nullable();
            $table->date('date')->nullable();;
            $table->string('content')->nullable();
            $table->date('date_of_resolution')->nullable();
            $table->string('resolution')->nullable();
            $table->date('date_of_execution')->nullable();
            $table->date('date_of_end_execution')->nullable();
            $table->string('performance_mark')->nullable();
            $table->json('files')->nullable();
            $table->json('users')->nullable();

            $table->integer('id_departament')->unsigned();
            $table->foreign('id_departament')->references('id')->on('doc_departaments');

            $table->integer('id_korrespondent')->unsigned();
            $table->foreign('id_korrespondent')->references('id')->on('doc_korrespondents');

            $table->integer('id_type')->unsigned();
            $table->foreign('id_type')->references('id')->on('doc_types');

            $table->integer('id_kurator')->unsigned();
            $table->foreign('id_kurator')->references('id')->on('doc_kurators');

            $table->integer('id_executor')->unsigned();
            $table->foreign('id_executor')->references('id')->on('users');

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
        Schema::dropIfExists('doc_incoming');
    }
}
