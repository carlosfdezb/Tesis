<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::group(["middleware" => "apikey.validate"], function(){
	Route::post('login','Api\Auth\LoginController@login');
	//rutas
	Route::get('news','Api\RecursoController@noticias');
	Route::get('asignaturas/{id}','Api\RecursoController@asignaturas');
	Route::get('asignaturas/{user_id}/{asignatura_id}','Api\RecursoController@asignatura');
	Route::get('notas/{user_id}/{asignatura_id}','Api\RecursoController@notas');
	Route::get('promedio/{user_id}/{asignatura_id}','Api\RecursoController@promedio');
	Route::get('curso/{id}','Api\RecursoController@curso');
	Route::get('alumno/{id}','Api\RecursoController@alumno');
	Route::get('calendario/{id}','Api\RecursoController@calendario');

});




