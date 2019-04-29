<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inv_inventories', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date_arrival');
            $table->integer('id_counterparty')->unsigned();
            $table->foreign('id_counterparty')->references('id')->on('inv_counterparty');
            $table->integer('id_device')->unsigned();
            $table->foreign('id_device')->references('id')->on('inv_devices');
            $table->json('specifications')->nullable();
            $table->string('inventory_number')->nullable();
            $table->integer('id_placement')->unsigned();
            $table->foreign('id_placement')->references('id')->on('inv_placements');
            $table->integer('id_responsible')->unsigned();
            $table->foreign('id_responsible')->references('id')->on('users');
            $table->integer('id_status')->unsigned();
            $table->foreign('id_status')->references('id')->on('inv_statuses');
            $table->string('cost')->nullable();
            $table->string('cost_current')->nullable();
            $table->date('date_warranty')->nullable();
            $table->string('accounting_code')->nullable();
            $table->string('barcode')->nullable();
            $table->string('serial_number')->nullable();
            $table->ipAddress('ip')->nullable();
            $table->string('qr_code')->nullable();
            $table->boolean('cancelled')->nullable();
            $table->integer('id_operator')->unsigned();
            $table->foreign('id_operator')->references('id')->on('users');
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
        Schema::dropIfExists('inv_inventories');
    }
}
