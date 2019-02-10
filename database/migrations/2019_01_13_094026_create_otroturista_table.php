<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOtroturistaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('otrosturistas', function (Blueprint $table) {
            $table->increments('IdOtroTurista');
            $table->string('CodigoOtroTurista',15);
            $table->string('NumTelOtroTurista',15)->nullable();
            $table->string('NombreApellido',60);
            $table->string('DuiOtroTurista',10)->nullable();
            $table->string('PasaporteOtroTurista',10)->nullable();
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

    }
}
