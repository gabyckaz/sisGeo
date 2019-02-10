<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecomendacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('recomendaciones', function (Blueprint $table) {
          $table->increments('IdRecomendaciones');
          $table->string('NombreRecomendaciones');
          $table->timestamps();
      });

      // Create table for associating gastosextras to paquete (Many-to-Many)
      Schema::create('recomendaciones_paquete', function (Blueprint $table) {
        $table->increments('IdRecomendacionesPaquete');
          $table->integer('recomendaciones_id')->unsigned();
          $table->integer('paquete_id')->unsigned();

          $table->foreign('recomendaciones_id')->references('IdRecomendaciones')->on('recomendaciones')
              ->onUpdate('cascade')->onDelete('cascade');
          $table->foreign('paquete_id')->references('IdPaquete')->on('paquetes')
              ->onUpdate('cascade')->onDelete('cascade');


      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recomendaciones_paquete');
        Schema::dropIfExists('recomendaciones');
    }
}
