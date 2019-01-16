<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCostoAlquilerTransporteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('CostoAlquilerTransporte', function (Blueprint $table) {
            $table->increments('IdCostoAlquilerTransporte');
            $table->integer('IdPaquete')->unsigned();
            $table->foreign('IdPaquete')->references('IdPaquete')->on('Paquetes');
            $table->double('CostoAlquilerTransporte',8,2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('CostoAlquilerTransporte');
    }
}
