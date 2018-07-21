<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persona', function (Blueprint $table) {
            $table->increments('id');
            $table->string('primerNombrePersona');
            $table->string('segundoNombrePersona')->nullable();;
            $table->string('primerApellidoPersona');
            $table->string('segundoApellidoPersona')->nullable();
            $table->string('genero');
            $table->string('areaTelContacto');
            $table->string('telefonoContacto');
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
        Schema::dropIfExists('persona');
    }
}
