<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContrataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contrata', function (Blueprint $table) {
          $table->integer('IdPaquete')->unsigned();
          $table->integer('IdTransporte')->unsigned();
          //agregando las relaciones y llaves
          $table->foreign('IdPaquete')->references('IdPaquete')->on('paquetes');
          $table->foreign('IdTransporte')->references('IdTransporte')->on('transporte');

          $table->primary(['IdPaquete', 'IdTransporte']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contrata');
    }
}
