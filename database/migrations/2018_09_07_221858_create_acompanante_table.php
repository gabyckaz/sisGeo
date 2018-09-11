<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcompananteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Acompanante', function (Blueprint $table) {
            $table->increments('IdFamiliarAmigo');
            $table->integer('IdTurista')->unsigned();;
            $table->integer('IdUsuario')->unsigned();;
            $table->string('EsFamiliar',1);
            $table->timestamps();
            $table->foreign('IdTurista')->references('IdTurista')->on('Turista')->onDelete('cascade');
            $table->foreign('IdUsuario')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Acompanante');
    }
}
