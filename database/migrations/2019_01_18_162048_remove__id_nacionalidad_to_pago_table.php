<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveIdNacionalidadToPagoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pago', function (Blueprint $table) {
          $table->dropForeign(['IdNacionalidad']);
          $table->dropForeign(['IdPersona']);
          $table->dropColumn(['IdNacionalidad', 'IdPersona', 'FechaPago']);
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
            $table->integer('IdNacionalidad')->unsigned()->nullable();
            $table->integer('IdPersona')->unsigned()->nullable();
            $table->date('FechaPago');
        });
    }
}
