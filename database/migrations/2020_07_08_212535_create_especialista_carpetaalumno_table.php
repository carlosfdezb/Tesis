<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEspecialistaCarpetaalumnoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Tabla pivote entre especialista y carpeta alumno = "especialista_carpetaalumno"//
        Schema::create('especialista_carpetaalumno', function (Blueprint $table) {
            $table->bigInteger('especialista_id')->unsigned();
            $table->bigInteger('carpeta_alumno_id')->unsigned();

            $table->foreign('especialista_id')->references('id')->on('especialistas');
            $table->foreign('carpeta_alumno_id')->references('id')->on('carpeta_alumnos');
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
        Schema::dropIfExists('especialista_carpetaalumno');
    }
}
