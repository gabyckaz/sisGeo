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
        Schema::create('pago', function (Blueprint $table) {
            $table->increments('IdPago');
            $table->integer('IdTurista')->unsigned()->nullable();
            $table->integer('IdOtroTurista')->unsigned()->nullable();
            $table->string('PagoTotal',15);
            $table->date('FechaPago');
            $table->string('TipoPago',20)->nullable();
            $table->timestamps();

            $table->foreign('IdOtroTurista')->references('IdOtroTurista')->on('otrosturistas')
            ->onDelete('set null');
            $table->foreign('IdTurista')->references('IdTurista')->on('turista')
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
        Schema::dropIfExists('pago');
        Schema::dropIfExists('otrosturistas');
    }
}
