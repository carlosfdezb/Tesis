<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarpetaPiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carpeta_pies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('fecha');
            $table->binary('archivo');
            $table->timestamps();


            //Claves Foraneas//


            $table->bigInteger('id_alumno_pie')->unsigned();//Declaración de clave foranea//
            $table->foreign('id_alumno_pie')->references('id')->on('alumno_pies');

            $table->bigInteger('id_equipo_pie')->unsigned();//Declaración de clave foranea//
            $table->foreign('id_equipo_pie')->references('id')->on('equipo_pies');

            $table->bigInteger('id_nee')->unsigned();//Declaración de clave foranea//
            $table->foreign('id_nee')->references('id')->on('nees');

            $table->bigInteger('id_documento_pie')->unsigned();//Declaración de clave foranea//
            $table->foreign('id_documento_pie')->references('id')->on('documento_pies');  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carpeta_pies');
    }
}
