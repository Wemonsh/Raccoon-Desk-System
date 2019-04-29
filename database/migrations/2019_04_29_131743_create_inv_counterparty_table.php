<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvCounterpartyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inv_counterparty', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('tin')->nullable();
            $table->string('code')->nullable();
            $table->boolean('tracking')->nullable();
            $table->text('comment')->nullable();
            $table->boolean('purchase')->nullable();
            $table->boolean('sale')->nullable();
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
        Schema::dropIfExists('inv_counterparty');
    }
}
