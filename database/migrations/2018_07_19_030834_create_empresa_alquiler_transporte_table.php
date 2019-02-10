<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresaAlquilerTransporteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('empresaalquilertransporte', function (Blueprint $table) {
          $table->increments('IdEmpresaTransporte');
          $table->string('NombreEmpresaTransporte',80);
          $table->string('NombreContacto',40);
          $table->string('NumeroTelefonoContacto',12);
          $table->string('EmailEmpresaTransporte',30)->unique();
          $table->string('ObservacionesEmpresaTransporte',256)->nullable();
      });
    }


    public function down()
    {
        Schema::dropIfExists('empresaalquilertransporte');
    }
}
