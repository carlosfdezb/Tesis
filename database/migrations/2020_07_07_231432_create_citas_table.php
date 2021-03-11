<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('fecha'); // Fecha agendada de la cita.
            $table->time('hora'); // Hora agendada de la cita.
            $table->longText('resumen'); // Pequeño resumen de la cita.
            $table->timestamps();

            //Claves Foraneas//

            $table->bigInteger('id_especialista')->unsigned();//Declaración de clave foranea//
            $table->foreign('id_especialista')->references('id')->on('especialistas');

            $table->bigInteger('id_alumno')->unsigned();//Declaración de clave foranea//
            $table->foreign('id_alumno')->references('id')->on('alumnos');



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('citas');
    }
}
