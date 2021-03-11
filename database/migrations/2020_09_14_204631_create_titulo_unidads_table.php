<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTituloUnidadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('titulo_unidads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('titulo_unidad');
            $table->string('numero_unidad');
            $table->timestamps();


            //Claves Foraneas//

                $table->bigInteger('id_profesor')->unsigned();//Declaración de clave foranea//
                $table->foreign('id_profesor')->references('id')->on('profesors');

                $table->bigInteger('id_curso')->unsigned();//Declaración de clave foranea//
                $table->foreign('id_curso')->references('id')->on('cursos');

                $table->bigInteger('id_asignatura')->unsigned();//Declaración de clave foranea//
                $table->foreign('id_asignatura')->references('id')->on('asignaturas');



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('titulo_unidads');
    }
}
