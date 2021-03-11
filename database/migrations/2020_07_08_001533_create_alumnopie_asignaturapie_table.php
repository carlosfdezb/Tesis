<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumnopieAsignaturapieTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Tabla pivote entre alumno_pies y asignatura_pies= "alumno_asignaturapie"//
        Schema::create('alumnopie_asignaturapie', function (Blueprint $table) {
            $table->bigInteger('alumno_pie_id')->unsigned();
            $table->bigInteger('asignatura_pie_id')->unsigned();

            $table->foreign('alumno_pie_id')->references('id')->on('alumno_pies');
            $table->foreign('asignatura_pie_id')->references('id')->on('asignatura_pies');
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
        Schema::dropIfExists('alumnopie_asignaturapie');
    }
}
