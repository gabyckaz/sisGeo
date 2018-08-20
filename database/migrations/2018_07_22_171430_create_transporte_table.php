<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransporteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Transporte', function (Blueprint $table) {
            $table->increments('IdTransporte');
            $table->integer('IdTipoTransporte');
            $table->integer('IdEmpresaTransporte');
            $table->string('Marca',25);
            $table->string('Modelo',30);
            $table->string('Color',25);
            $table->string('Placa_Matricula',7)->unique();
            $table->integer('NumeroAsientos');
            $table->string('TieneAC',2)->nullable();
            $table->string('TieneTV',2)->nullable();
            $table->string('TieneWifi',2)->nullable();
            $table->string('ObservacionesTransporte',250)->nullable();
            $table->foreign('IdTipoTransporte')->references('IdTipoTransporte')->on('TipoTransporte');
            $table->foreign('IdEmpresaTransporte')->references('IdEmpresaTransporte')->on('EmpresaAlquilerTransporte');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Transporte');
    }
}
