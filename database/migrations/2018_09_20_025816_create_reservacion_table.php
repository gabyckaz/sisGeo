<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservacion', function (Blueprint $table) {
            $table->increments('IdReservacion');
            $table->integer('IdTurista')->unsigned();
            $table->integer('IdPaquete')->unsigned();
            $table->date('FechaReservacion');
            $table->integer('NumeroAcompanantes');
            $table->string('IdsAcompanantes',40);
            $table->string('ConfirmacionReservacion',1);

            $table->foreign('IdTurista')->references('IdTurista')->on('turista');
            $table->foreign('IdPaquete')->references('IdPaquete')->on('paquetes');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservacion');
    }
}
