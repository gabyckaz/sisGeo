<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaqueteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('Paquetes', function (Blueprint $table) {
            $table->increments('IdPaquete');
            $table->string('NombrePaquete',100);
            $table->date('FechaSalida');
            $table->time('HoraSalida');
            $table->date('FechaRegreso');
            $table->string('LugarRegreso',200);
            $table->string('Precio');
            $table->string('Itinerario',1024);
            $table->string('AprobacionPaquete',1);
            $table->string('DisponibilidadPaquete',1);
            $table->integer('IdTuristica')->unsigned();
            $table->foreign('IdTuristica')->references('IdRutaTuristica')->on('RutaTuristica')->onDelete('cascade');
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
        Schema::dropIfExists('Paquete');
    }
}
