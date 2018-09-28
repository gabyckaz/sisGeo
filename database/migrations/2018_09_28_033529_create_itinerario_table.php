<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItinerarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
       // Create table for storing roles
     Schema::create('Itinerario', function (Blueprint $table) {
         $table->increments('IdItinerario');
         $table->string('NombreItinerario');
         $table->timestamps();
     });

     // Create table for associating gastosextras to paquete (Many-to-Many)
     Schema::create('Itinerario_Paquete', function (Blueprint $table) {
       $table->increments('IdItinerarioPaquete');
         $table->integer('itinerario_id')->unsigned();
         $table->integer('paquete_id')->unsigned();

         $table->foreign('itinerario_id')->references('IdItinerario')->on('Itinerario')
             ->onUpdate('cascade')->onDelete('cascade');
         $table->foreign('paquete_id')->references('IdPaquete')->on('Paquetes')
             ->onUpdate('cascade')->onDelete('cascade');


     });

  }
    public function down()
    {
        Schema::dropIfExists('Incluye');
    }
}
