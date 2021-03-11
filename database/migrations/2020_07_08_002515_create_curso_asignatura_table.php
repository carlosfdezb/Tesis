<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCursoAsignaturaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Tabla pivote entre curso y asignatura = "curso_asignatura"//
        Schema::create('curso_asignatura', function (Blueprint $table) {
            $table->bigInteger('curso_id')->unsigned();
            $table->bigInteger('asignatura_id')->unsigned();

            $table->foreign('curso_id')->references('id')->on('cursos');
            $table->foreign('asignatura_id')->references('id')->on('asignaturas');
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
        Schema::dropIfExists('curso_asignatura');
    }
}
