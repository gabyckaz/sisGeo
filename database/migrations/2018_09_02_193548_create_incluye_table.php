<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIncluyeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
       // Create table for storing roles
     Schema::create('incluye', function (Blueprint $table) {
         $table->increments('IdIncluye');
         $table->string('NombreIncluye');
         $table->timestamps();
     });

     // Create table for associating gastosextras to paquete (Many-to-Many)
     Schema::create('incluye_paquete', function (Blueprint $table) {
       $table->increments('IdIncluyePaquete');
         $table->integer('incluye_id')->unsigned();
         $table->integer('paquete_id')->unsigned();

         $table->foreign('incluye_id')->references('IdIncluye')->on('incluye')
             ->onUpdate('cascade')->onDelete('cascade');
         $table->foreign('paquete_id')->references('IdPaquete')->on('paquetes')
             ->onUpdate('cascade')->onDelete('cascade');


     });

  }
    public function down()
    {
        Schema::dropIfExists('incluye_paquete');
        Schema::dropIfExists('incluye');
    }
}
