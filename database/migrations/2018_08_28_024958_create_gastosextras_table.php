<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGastosextrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     */
    public function up()
    {
      // Create table for storing roles
    Schema::create('GastosExtras', function (Blueprint $table) {
        $table->increments('IdGastosExtras');
        $table->string('NombreGastos');
        $table->double('Gastos',8,2);
        $table->timestamps();
    });

    // Create table for associating gastosextras to paquete (Many-to-Many)
    Schema::create('GastosExtras_Paquete', function (Blueprint $table) {

		$table->increments('IdGastosExtraPaquete');//Este anda arreglalo en el modelo--> protected $primaryKey = 'IdPersona';
		$table->integer('gastosextras_id')->unsigned();
        $table->integer('paquete_id')->unsigned();

        $table->foreign('gastosextras_id')->references('IdGastosExtras')->on('GastosExtras')
            ->onUpdate('cascade')->onDelete('cascade');
        $table->foreign('paquete_id')->references('IdPaquete')->on('Paquetes')
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
        Schema::dropIfExists('GastosExtras_Paquete');
        Schema::dropIfExists('GastosExtras');
    }
}
