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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('segundoNombre')->nullable();;
            $table->string('primerApellido');
            $table->string('segundoApellido')->nullable();
            $table->string('sexo');
            $table->string('codigoArea');
            $table->string('telefono');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('notificacion');
            $table->string('estado');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
