<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfesorAsignaturaelectivaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Tabla pivote entre profesor y asignatura electiva= "profesor_asignaturaelectiva"//
        Schema::create('profesor_asignaturaelectiva', function (Blueprint $table) {
            $table->bigInteger('profesor_id')->unsigned();
            $table->bigInteger('asignatura_electiva_id')->unsigned();

            $table->foreign('profesor_id')->references('id')->on('profesors');
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
        Schema::dropIfExists('profesor_asignaturaelectiva');
    }
}
