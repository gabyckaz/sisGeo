<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->increments('IdPersona');            
            $table->string('PrimerNombrePersona',25);
            $table->string('SegundoNombrePersona',25)->nullable();;
            $table->string('PrimerApellidoPersona',25);
            $table->string('SegundoApellidoPersona',25)->nullable();
            $table->string('Genero',1);
            $table->string('AreaTelContacto',4);
            $table->string('TelefonoContacto',10);
            $table->timestamps();
            
        });


        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('IdPersona')->unsigned();
           /* $table->string('segundoNombre')->nullable();;
            $table->string('primerApellido');
            $table->string('segundoApellido')->nullable();
            $table->string('sexo');
            $table->string('codigoArea');
            $table->string('telefono'); */
            $table->string('email')->unique();
            $table->string('password');
            $table->string('RecibirNotificacion');
            $table->string('EstadoUsuario');
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('IdPersona')->references('IdPersona')->on('personas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {   
        Schema::dropIfExists('personas');
        Schema::dropIfExists('users');
    }
}
