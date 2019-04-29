<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvRepairHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inv_repair_history', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_inventory')->unsigned();
            $table->foreign('id_inventory')->references('id')->on('inv_inventories');
            $table->integer('id_counterparty')->unsigned();
            $table->foreign('id_counterparty')->references('id')->on('inv_counterparty');
            $table->date('date_from');
            $table->date('date_to')->nullable();
            $table->string('cost');
            $table->boolean('repaired');
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
        Schema::dropIfExists('inv_repair_history');
    }
}
