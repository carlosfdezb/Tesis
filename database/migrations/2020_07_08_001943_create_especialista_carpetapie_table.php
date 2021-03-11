<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEspecialistaCarpetapieTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Tabla pivote entre especialista y carpeta_pies= "especialista_carpetapie"//
        Schema::create('especialista_carpetapie', function (Blueprint $table) {
            $table->bigInteger('especialista_id')->unsigned();
            $table->bigInteger('carpeta_pie_id')->unsigned();

            $table->foreign('especialista_id')->references('id')->on('especialistas');
            $table->foreign('carpeta_pie_id')->references('id')->on('carpeta_pies');
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
        Schema::dropIfExists('especialista_carpetapie');
    }
}
