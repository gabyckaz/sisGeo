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
      Schema::create('Recomendaciones', function (Blueprint $table) {
          $table->increments('IdRecomendaciones');
          $table->string('NombreRecomendaciones');
          $table->timestamps();
      });

      // Create table for associating gastosextras to paquete (Many-to-Many)
      Schema::create('Recomendaciones_Paquete', function (Blueprint $table) {
          $table->integer('recomendaciones_id')->unsigned();
          $table->integer('paquete_id')->unsigned();

          $table->foreign('recomendaciones_id')->references('IdRecomendaciones')->on('Recomendaciones')
              ->onUpdate('cascade')->onDelete('cascade');
          $table->foreign('paquete_id')->references('IdPaquete')->on('Paquetes')
              ->onUpdate('cascade')->onDelete('cascade');

          $table->primary(['recomendaciones_id', 'paquete_id']);
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Recomendaciones');
    }
}
