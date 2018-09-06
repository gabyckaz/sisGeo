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
           // $table->string('TipoDocumento',9);
           // $table->string('Dui_Pasaporte',10);
           //$table->date('FechaVenceDocumen');
            $table->string('DomicilioTurista',100);
            $table->string('Problemas_Salud',256)->nullable();
            $table->timestamps();
            $table->foreign('IdPersona')->references('IdPersona')->on('personas')->onDelete('cascade');
            $table->foreign('IdNacionalidad')->references('IdNacionalidad')->on('Nacionalidad')->onDelete('cascade');
        });

        Schema::create('TipoDocumento', function (Blueprint $table) {
            $table->increments('IdTipoDocumento');
            $table->integer('IdTurista');
            $table->string('TipoDocumento',9);
            $table->string('NumeroDocumento',10)->unique();;
            $table->date('FechaVenceDocumento');
            $table->foreign('IdTurista')->references('IdTurista')->on('Turista')->onDelete('cascade');
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
        Schema::dropIfExists('TipoDocumento');
        Schema::dropIfExists('Turista');
        Schema::dropIfExists('Nacionalidad');
    }
}
