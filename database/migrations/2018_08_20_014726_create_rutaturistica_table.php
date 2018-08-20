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
            $table->integer('IdPais');
            $table->string('NombreRutaTuristica',60);
            $table->string('DatosGenerales',1024);
            $table->string('DescripcionRutaTuristica',1024);
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
        Schema::dropIfExists('RutaTuristica');
    }
}
