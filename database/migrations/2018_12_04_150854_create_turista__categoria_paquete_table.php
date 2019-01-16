<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTuristaCategoriaPaqueteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TuristaCategoria', function (Blueprint $table) {
            $table->increments('IdTuristaCategoria');
            $table->integer('IdTurista')->unsigned();
            $table->integer('IdCategoria')->unsigned();

            $table->foreign('IdTurista')->references('IdTurista')->on('Turista')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('IdCategoria')->references('IdCategoria')->on('Categoria')
                ->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('TuristaCategoria');
    }
}
