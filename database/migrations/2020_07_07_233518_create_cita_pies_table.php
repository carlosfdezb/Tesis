<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitaPiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cita_pies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('fecha');
            $table->time('hora');
            $table->longText('resumen'); //Pequeño resumen de la cita.
            $table->timestamps();


            //Claves Foraneas//

            $table->bigInteger('id_especialista')->unsigned();//Declaración de clave foranea//
            $table->foreign('id_especialista')->references('id')->on('especialistas');

            $table->bigInteger('id_alumno_pie')->unsigned();//Declaración de clave foranea//
            $table->foreign('id_alumno_pie')->references('id')->on('alumno_pies');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cita_pies');
    }
}
