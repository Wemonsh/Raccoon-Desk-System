<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_messages', function (Blueprint $table) {
            $table->increments('id');
            $table->text('message');
            $table->json('files')->nullable();
            $table->integer('id_room')->unsigned();
            $table->foreign('id_room')->references('id')->on('user_message_rooms');
            $table->integer('id_sender')->unsigned();
            $table->foreign('id_sender')->references('id')->on('users');
            $table->integer('id_receiver')->unsigned();
            $table->foreign('id_receiver')->references('id')->on('users');
            $table->boolean('unread')->default('0');
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
        Schema::dropIfExists('user_messages');
    }
}
