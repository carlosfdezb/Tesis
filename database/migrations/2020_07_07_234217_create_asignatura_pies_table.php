<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsignaturaPiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignatura_pies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('nivel'); // -> 1ro° a 8vo° , 1ro° a 4to°,Kinder, Pre-Kinder, Sala Cuna.
            $table->string('grado'); // -> Pre-Básica, Básica, Media.
            $table->string('codigo')->nulleable(); // Código interno de la institución.
            $table->timestamps();

            //Claves Foraneas//

            $table->bigInteger('id_equipo_pie')->unsigned();//Declaración de clave foranea//
            $table->foreign('id_equipo_pie')->references('id')->on('equipo_pies');




        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asignatura_pies');
    }
}
