<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Pago', function (Blueprint $table) {
            $table->increments('IdPago');
            $table->integer('IdTurista')->unsigned()->nullable();;
            $table->integer('IdOtroTurista')->unsigned()->nullable();;
            $table->string('PagoTotal',15);
            $table->date('FechaPago');
            $table->string('TipoPago',20)->nullable();
            $table->timestamps();

            $table->foreign('IdOtroTurista')->references('IdOtroTurista')->on('OtrosTuristas')
            ->onDelete('set null');
            $table->foreign('IdTurista')->references('IdTurista')->on('Turista')
            ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Pago');
        Schema::dropIfExists('OtrosTuristas');
    }
}
