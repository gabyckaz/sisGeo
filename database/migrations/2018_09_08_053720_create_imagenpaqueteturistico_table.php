<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagenpaqueteturisticoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ImagenPaqueteTuristico', function (Blueprint $table) {
            $table->increments('IdImagenPaqueteTuristico');
            $table->string('Imagen1',1024);//extension:jpg, png
            $table->integer('id_paquete')->unsigned();
            $table->foreign('id_paquete')->references('IdPaquete')->on('Paquetes');
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
        Schema::dropIfExists('ImagenPaqueteTuristico');
    }
}
