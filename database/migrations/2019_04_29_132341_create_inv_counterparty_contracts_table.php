<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvCounterpartyContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inv_counterparty_contracts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('number');
            $table->string('name');
            $table->date('date_from');
            $table->date('date_to')->nullable();
            $table->boolean('valid')->nullable();
            $table->text('comment')->nullable();
            $table->json('files')->nullable();
            $table->integer('id_counterparty')->unsigned();
            $table->foreign('id_counterparty')->references('id')->on('inv_counterparty');
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
        Schema::dropIfExists('inv_counterparty_contracts');
    }
}
