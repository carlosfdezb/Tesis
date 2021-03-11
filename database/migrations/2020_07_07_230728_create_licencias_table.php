<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLicenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('licencias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('fecha_inicio'); // Fecha de inicio de la licencia.
            $table->date('fecha_fin'); // Fecha de fin de la licencia.
            $table->date('fecha_presentacion'); // Fecha en la cual se presenta la licencia.
            $table->binary('archivo'); // Archivo en pdf,word,foto,etc; de la licencia.
            $table->string('estado'); // Pendiente, Revisada, Rechazada, Aprobada, etc. 
            $table->timestamps();

            //Claves Foraneas//

            $table->bigInteger('id_alumno')->unsigned();//Declaración de clave foranea//
            $table->foreign('id_alumno')->references('id')->on('alumnos');

            $table->bigInteger('id_administrativo')->unsigned();//Declaración de clave foranea//
            $table->foreign('id_administrativo')->references('id')->on('administrativos');





        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('licencias');
    }
}
