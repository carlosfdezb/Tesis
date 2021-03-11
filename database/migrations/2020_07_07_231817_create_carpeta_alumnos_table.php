<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarpetaAlumnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carpeta_alumnos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('fecha');
            $table->binary('archivo'); // Archivos que tiene el alumno con el especialista.
            $table->timestamps();

            //Claves Foraneas//

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
        Schema::dropIfExists('carpeta_alumnos');
    }
}
