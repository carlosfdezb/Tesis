<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumnoAsignaturaelectivaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

         //Tabla pivote entre alumnos y asignatura_electivas= "alumno_asignaturaelectiva"//
        Schema::create('alumno_asignaturaelectiva', function (Blueprint $table) {
            $table->bigInteger('alumno_id')->unsigned();
            $table->bigInteger('asignatura_electiva_id')->unsigned();

            $table->foreign('alumno_id')->references('id')->on('alumnos');
            $table->foreign('asignatura_electiva_id')->references('id')->on('asignatura_electivas');
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
        Schema::dropIfExists('alumno_asignaturaelectiva');
    }
}
