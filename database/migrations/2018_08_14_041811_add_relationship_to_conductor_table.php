<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelationshipToConductorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('Conductor', function (Blueprint $table) {
        $table->integer('IdEmpresaTransporte')->after('IdConductor')->nullable();
        $table->foreign('IdEmpresaTransporte')->references('IdEmpresaTransporte')->on('EmpresaAlquilerTransporte');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::table('Conductor', function (Blueprint $table) {
           $table->dropColumn('IdEmpresaTransporte');
       });
    }
}
