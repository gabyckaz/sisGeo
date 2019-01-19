<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Paga', function (Blueprint $table) {
          $table->integer('IdPago')->unsigned();
          $table->integer('IdPaquete')->unsigned();

          $table->foreign('IdPago')->references('IdPago')->on('Pago')
              ->onUpdate('cascade')->onDelete('cascade');
          $table->foreign('IdPaquete')->references('IdPaquete')->on('Paquetes')
              ->onUpdate('cascade')->onDelete('cascade');

          $table->primary(['IdPago', 'IdPaquete']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Paga');
    }
}
