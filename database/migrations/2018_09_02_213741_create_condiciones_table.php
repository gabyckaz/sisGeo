<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCondicionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('Condiciones', function (Blueprint $table) {
          $table->increments('IdCondiciones');
          $table->string('NombreCondiciones');
          $table->timestamps();
      });

      // Create table for associating gastosextras to paquete (Many-to-Many)
      Schema::create('Condiciones_Paquete', function (Blueprint $table) {
          $table->integer('condiciones_id')->unsigned();
          $table->integer('paquete_id')->unsigned();

          $table->foreign('condiciones_id')->references('IdCondiciones')->on('Condiciones')
              ->onUpdate('cascade')->onDelete('cascade');
          $table->foreign('paquete_id')->references('IdPaquete')->on('Paquetes')
              ->onUpdate('cascade')->onDelete('cascade');

          $table->primary(['condiciones_id', 'paquete_id']);
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Condiciones');
    }
}
