<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('description');
            $table->ipAddress('ip');
            $table->json('files')->nullable();

            $table->integer('id_priority')->unsigned();
            $table->foreign('id_priority')->references('id')->on('requests_priority');
            $table->integer('id_category')->unsigned();
            $table->foreign('id_category')->references('id')->on('requests_category');
            $table->integer('id_user')->unsigned();
            $table->foreign('id_user')->references('id')->on('users');
            $table->integer('id_operator')->unsigned()->nullable();
            $table->foreign('id_operator')->references('id')->on('users');
            $table->integer('id_status')->unsigned();
            $table->foreign('id_status')->references('id')->on('requests_statuses');

            $table->dateTime('date_of_creation');
            $table->dateTime('date_of_planned')->nullable();
            $table->dateTime('date_of_closing')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requests');
    }
}
