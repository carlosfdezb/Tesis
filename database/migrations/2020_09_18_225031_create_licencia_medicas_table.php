<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLicenciaMedicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('licencia_medicas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('fecha_licencia'); // Fecha de la licencia médica //
            $table->string('estado'); // aprobada, rechazada , pendiente //
            $table->longText('descripcion');
            $table->longText('observacion');
            $table->binary('archivo');
            $table->string('nombre_administrativo'); // nombre encargado de revisión licencia médica // 
            $table->timestamps();

            
            //Claves Foraneas//

                $table->bigInteger('id_alumno')->unsigned();//Declaración de clave foranea//
                $table->foreign('id_alumno')->references('id')->on('alumnos');


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
        Schema::dropIfExists('licencia_medicas');
    }
}
