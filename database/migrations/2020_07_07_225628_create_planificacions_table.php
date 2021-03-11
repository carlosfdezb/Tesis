<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanificacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planificacions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('asignatura');
            $table->string('nivel'); // -> 1ro° a 8vo° , 1ro° a 4to°,Kinder, Pre-Kinder, Sala Cuna.
            $table->string('grado'); // -> Pre-Básica, Básica, Media.
            $table->string('letra'); // -> A,B,C.
            $table->date('fecha');
            $table->string('unidad'); // Unidad Actual de la Materia.
            $table->string('estado');
            $table->longText('observaciones');
            $table->binary('archivo');
            $table->string('nombre_administrativo');
            $table->timestamps();

            //Claves Foraneas//


            $table->bigInteger('id_profesor')->unsigned();//Declaración de clave foranea//
            $table->foreign('id_profesor')->references('id')->on('profesors');







        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('planificacions');
    }
}
