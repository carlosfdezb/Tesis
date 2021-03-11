<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certificados', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tipo'); // Certificado de notas, alumno regular, etc.
            $table->string('folio');
            $table->date('fecha');
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
        Schema::dropIfExists('certificados');
    }
}
