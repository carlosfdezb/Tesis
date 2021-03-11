<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsignaturaProfesorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Tabla pivote entre profesor y asignatura= "profesor_asignatura"//
        Schema::create('asignatura_profesor', function (Blueprint $table) {
            $table->bigInteger('asignatura_id')->unsigned();
            $table->bigInteger('profesor_id')->unsigned();
            $table->string('nivel');
            $table->string('grado');
            $table->string('letra');
          
            $table->foreign('asignatura_id')->references('id')->on('asignaturas');
            $table->foreign('profesor_id')->references('id')->on('profesors');
            
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
        Schema::dropIfExists('asignatura_profesor');
    }
}
