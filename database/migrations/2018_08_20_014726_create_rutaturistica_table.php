<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRutaturisticaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('RutaTuristica', function (Blueprint $table) {
            $table->increments('IdRutaTuristica');
            $table->string('NombreRutaTuristica',60);
            $table->string('DatosGenerales',1024);
            $table->string('DescripcionRutaTuristica',1024);
            $table->integer('IdPais')->unsigned();
            $table->foreign('IdPais')->references('IdPais')->on('Pais');
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
        Schema::dropIfExists('RutaTuristica');
    }
}
