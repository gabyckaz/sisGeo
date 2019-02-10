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
      Schema::create('conduce', function (Blueprint $table) {
        $table->integer('IdPaquete')->unsigned();
        $table->integer('IdConductor')->unsigned();
        //agregando las relaciones y llaves
        $table->foreign('IdPaquete')->references('IdPaquete')->on('paquetes');
        $table->foreign('IdConductor')->references('IdConductor')->on('conductor');

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
        Schema::dropIfExists('conduce');
    }
}
