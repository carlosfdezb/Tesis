<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumnoPiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumno_pies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('estado');
            $table->date('edad');
            $table->date('fecha_diagnostico')->nulleable();
            $table->date('fecha_reevaluacion')->nulleable();
            $table->string('otros_profesionales')->nulleable();
            $table->timestamps();

            //Claves Foraneas//

            $table->bigInteger('id_equipo_pie')->unsigned();//Declaración de clave foranea//
            $table->foreign('id_equipo_pie')->references('id')->on('equipo_pies');

            $table->bigInteger('id_alumno')->unsigned();//Declaración de clave foranea//
            $table->foreign('id_alumno')->references('id')->on('alumnos');

            $table->bigInteger('id_nee')->unsigned();//Declaración de clave foranea//
            $table->foreign('id_nee')->references('id')->on('nees'); 




        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumno_pies');
    }
}
