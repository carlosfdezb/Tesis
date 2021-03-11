<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nivel'); // -> 1ro° a 8vo° , 1ro° a 4to°,Kinder, Pre-Kinder, Sala Cuna.
            $table->string('grado'); // -> Pre-Básica, Básica, Media.
            $table->string('letra'); // A,B,C, etc.
            $table->string('codigo')->nulleable(); // Código interno de la institución.
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
        Schema::dropIfExists('cursos');
    }
}
