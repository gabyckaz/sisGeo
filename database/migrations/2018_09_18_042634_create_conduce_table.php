<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConduceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('Conduce', function (Blueprint $table) {
        $table->integer('IdPaquete')->unsigned();
        $table->integer('IdConductor')->unsigned();
        //agregando las relaciones y llaves
        $table->foreign('IdPaquete')->references('IdPaquete')->on('Paquetes');
        $table->foreign('IdConductor')->references('IdConductor')->on('Conductor');

        $table->primary(['IdPaquete', 'IdConductor']);
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Conduce');
    }
}
