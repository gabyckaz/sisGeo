<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDisponibilidadGuiaToGuiaPaqueteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('guiapaquete', function (Blueprint $table) {
            $table->string('DisponiblidadGuia')->after('IdPaquete')->default('0');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('guiapaquete', function (Blueprint $table) {
            $table->dropColumn('DisponiblidadGuia');
        });
    }
}