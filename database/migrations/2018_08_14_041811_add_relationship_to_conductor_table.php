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
      Schema::table('conductor', function (Blueprint $table) {
        $table->integer('IdEmpresaTransporte')->after('IdConductor')->nullable()->unsigned();
        $table->foreign('IdEmpresaTransporte')->references('IdEmpresaTransporte')->on('empresaalquilertransporte');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::table('conductor', function (Blueprint $table) {
           $table->dropColumn('IdEmpresaTransporte');
       });
    }
}
