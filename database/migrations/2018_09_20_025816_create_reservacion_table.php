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
        Schema::create('Reservacion', function (Blueprint $table) {
            $table->increments('IdReservacion');
            $table->integer('IdTurista');
            $table->integer('IdPaquete');
            $table->date('FechaReservacion');
            $table->integer('NumeroAcompanantes');
            $table->string('IdsAcompanantes',40);
            $table->string('ConfirmacionReservacion',1);

            $table->foreign('IdTurista')->references('IdTurista')->on('Turista');
            $table->foreign('IdPaquete')->references('IdPaquete')->on('Paquetes');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Reservacion');
    }
}
