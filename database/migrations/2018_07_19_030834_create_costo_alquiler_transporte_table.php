<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCostoAlquilerTransporteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('EmpresaAlquilerTransporte', function (Blueprint $table) {
          $table->increments('IdEmpresaTransporte');
          $table->string('NombreEmpresaTransporte',80);
          $table->string('NombreContacto',40);
          $table->string('NumeroTelefonoContacto',8);
          $table->string('EmailEmpresaTransporte',30)->unique();
          $table->string('ObservacionesEmpresaTransporte',256);
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('EmpresaAlquilerTransporte');
    }
}
