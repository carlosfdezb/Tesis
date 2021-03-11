<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nota');
            $table->longText('descripcion'); // Descripcion de las unidades evaluadas en la calificacion. 
            $table->string('numero'); // Numero de la evaluacion (1 a N) segun asignatura.
            $table->string('semestre');
            $table->string('ano');
            $table->timestamps();


            //Claves Foraneas//

            $table->bigInteger('id_profesor')->unsigned();//Declaración de clave foranea//
            $table->foreign('id_profesor')->references('id')->on('profesors');

            $table->bigInteger('id_alumno')->unsigned();//Declaración de clave foranea//
            $table->foreign('id_alumno')->references('id')->on('alumnos');

            $table->bigInteger('id_asignatura')->unsigned();//Declaración de clave foranea//
            $table->foreign('id_asignatura')->references('id')->on('asignaturas');

            $table->bigInteger('id_curso')->unsigned();//Declaración de clave foranea//
            $table->foreign('id_curso')->references('id')->on('cursos');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notas');
    }
}
