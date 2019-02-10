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
      Schema::create('condiciones', function (Blueprint $table) {
          $table->increments('IdCondiciones');
          $table->string('NombreCondiciones');
          $table->timestamps();
      });

      // Create table for associating gastosextras to paquete (Many-to-Many)
      Schema::create('condiciones_paquete', function (Blueprint $table) {
        $table->increments('IdCondicionesPaquete');
          $table->integer('condiciones_id')->unsigned();
          $table->integer('paquete_id')->unsigned();

          $table->foreign('condiciones_id')->references('IdCondiciones')->on('condiciones')
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
        Schema::dropIfExists('condiciones_paquete');
        Schema::dropIfExists('condiciones');
    }
}
