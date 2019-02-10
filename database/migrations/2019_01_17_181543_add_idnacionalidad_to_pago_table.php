<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIdnacionalidadToPagoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pago', function (Blueprint $table) {
            $table->integer('IdNacionalidad')->after('IdPago')->unsigned()->nullable();
            $table->integer('IdPersona')->after('IdNacionalidad')->unsigned()->nullable();
            $table->string('Descripcion',256)->after('IdOtroTurista')->nullable();
            $table->double('CostoPersona',8,2)->after('Descripcion')->nullable();
            $table->string('Url',150)->after('CostoPersona')->nullable();
            $table->integer('IdUsuario')->after('Url')->unsigned()->nullable();
            $table->string('NombreCliente',30)->after('IdUsuario')->nullable();
            $table->integer('Estado')->after('NombreCliente')->unsigned()->nullable();
            $table->string('NAP',8)->after('Estado')->nullable();
            $table->timestamp('FechaTransaccion')->after('NAP')->nullable();
            $table->string('Ern',256)->after('FechaTransaccion')->nullable();
            $table->integer('NumeroAcompanante')->after('TipoPago')->unsigned()->nullable();
            $table->string('IdsAcompanantes',60)->after('NumeroAcompanante')->nullable();
            $table->string('IdsOtroTurista')->after('IdsAcompanantes')->nullable();

            $table->foreign('IdNacionalidad')->references('IdNacionalidad')->on('turista');
            $table->foreign('IdPersona')->references('IdPersona')->on('turista');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pago', function (Blueprint $table) {
            $table->dropColumn('IdNacionalidad');
            $table->dropColumn('IdPersona');
            $table->dropColumn('Descripcion');
            $table->dropColumn('Cupos');
            $table->dropColumn('CostoPersona');
            $table->dropColumn('Url');
            $table->dropColumn('IdUsuario');
            $table->dropColumn('NombreCliente');
            $table->dropColumn('Estado');
            $table->dropColumn('NAP');
            $table->dropColumn('FechaTransaccion');
            $table->dropColumn('Ern');
            $table->dropColumn('NumeroAcompanante');
            $table->dropColumn('IdsAcompanantes');
            $table->dropColumn('ConfirmacionReservacion');
            $table->dropColumn('IdsOtroTurista');

        });
    }
}
