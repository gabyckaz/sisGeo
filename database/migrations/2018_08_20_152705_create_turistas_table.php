<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateTuristasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
           Schema::create('Nacionalidad', function (Blueprint $table) {
            $table->increments('IdNacionalidad');
            $table->string('Nacionalidad',25)->unique();
            $table->timestamps();
        });


        Schema::create('Turista', function (Blueprint $table) {
            $table->increments('IdTurista');
            $table->integer('IdNacionalidad');
            $table->integer('IdPersona');
            $table->string('CategoriaTurista',1);
            $table->date('FechaNacimiento');
            $table->string('TipoDocumento',9);
            $table->string('Dui_Pasaporte',10);
            $table->date('FechaVenceDocumen');
            $table->string('DomicilioTurista',100);
            $table->string('Problemas_Salud',256);
            $table->timestamps();
            $table->foreign('IdPersona')->references('IdPersona')->on('personas')->onDelete('cascade');
            $table->foreign('IdNacionalidad')->references('IdNacionalidad')->on('Nacionalidad')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Turista');
        Schema::dropIfExists('Nacionalidad');
    }
}
