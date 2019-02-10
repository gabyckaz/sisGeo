<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuiaPaqueteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guiapaquete', function (Blueprint $table) {
            $table->increments('IdGuiaPaquete');
            $table->integer('IdEmpleadoGEO')->unsigned();
            $table->integer('IdPaquete')->unsigned();

            $table->foreign('IdEmpleadoGEO')->references('IdEmpleadoGEO')->on('empleado')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('IdPaquete')->references('IdPaquete')->on('paquetes')
                ->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('guiapaquete');
    }
}
