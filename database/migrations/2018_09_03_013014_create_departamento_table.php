<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartamentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('Departamento', function (Blueprint $table) {
          $table->increments('IdDepartamento');
          $table->string('NombreDepartamento',1024);
          $table->integer('id_pais')->unsigned();
          $table->foreign('id_pais')->references('IdPais')->on('Pais');
          $table->timestamps();

      });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Departamento');
    }
}
