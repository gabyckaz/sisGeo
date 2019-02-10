<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelationshipToRutaturisticaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rutaturistica', function (Blueprint $table) {
          $table->integer('IdCategoria')->nullable()->unsigned();
          $table->foreign('IdCategoria')->references('IdCategoria')->on('Categoria');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
}
