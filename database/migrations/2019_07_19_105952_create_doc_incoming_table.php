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
            $table->date('date_of_registration');
            $table->string('pages');
            $table->string('other_korrespondent');
            $table->string('index_korrespondent');
            $table->date('date');
            $table->string('content');
            $table->date('date_of_resolution');
            $table->string('resolution');
            $table->date('date_of_execution');
            $table->date('date_of_end_execution');
            $table->string('performance_mark');
            $table->json('files');

            $table->integer('id_departament')->unsigned();
            $table->foreign('id_departament')->references('id')->on('doc_departaments');

            $table->integer('id_korrespondent')->unsigned();
            $table->foreign('id_korrespondent')->references('id')->on('doc_korrespondents');

            $table->integer('id_type')->unsigned();
            $table->foreign('id_type')->references('id')->on('doc_types');

            $table->integer('id_kurator')->unsigned();
            $table->foreign('id_kurator')->references('id')->on('doc_kurators');

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
        Schema::dropIfExists('doc_incoming');
    }
}
