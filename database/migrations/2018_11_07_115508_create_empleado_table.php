<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpleadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleado', function (Blueprint $table) {
            $table->increments('IdEmpleadoGEO');
            $table->integer('IdPersona')->unsigned();
            $table->timestamps();
            $table->foreign('IdPersona')->references('IdPersona')->on('personas')->onDelete('cascade');
        });

         Schema::create('idiomas', function (Blueprint $table) {
            $table->increments('IdIdioma');
            $table->string('Idioma',30);
            $table->timestamps();
        });

        Schema::create('idiomasempleado', function (Blueprint $table) {
            $table->increments('IdIdiomaEmpleado');
            $table->integer('IdIdioma')->unsigned();
            $table->integer('IdEmpleadoGEO')->unsigned();

            $table->foreign('IdIdioma')->references('IdIdioma')->on('idiomas')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('IdEmpleadoGEO')->references('IdEmpleadoGEO')->on('empleado')
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
        Schema::dropIfExists('idiomasempleado');
        Schema::dropIfExists('empleado');
        Schema::dropIfExists('idiomas');

    }

}
