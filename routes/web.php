<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

/* RESOURCES */
Route::resource('profesores', 'ProfesorController');
Route::resource('alumnos', 'AlumnoController');
Route::resource('cursos', 'CursoController');
Route::resource('asignaturas', 'AsignaturaController');
Route::resource('notas', 'NotaController');
Route::resource('certificado', 'CertificadoController');
Route::resource('calendario', 'CalendarioController');
Route::resource('inicio', 'NoticiasController');
Route::resource('administrativos', 'AdministrativoController');
Route::resource('especialistas', 'EspecialistaController');
Route::resource('planificaciones', 'PlanificacionController');
Route::resource('modulo_pie', 'AlumnoPieController');
Route::resource('modulo_materiales', 'MaterialProfesorController');
Route::resource('licencias_medicas', 'LicenciaMedicaController');
Route::resource('documentos_institucionales', 'DocumentoInstitucionalController');



/* RUTAS PROFESOR */
Route::group(["middleware" => "admin-utp" ], function(){
	Route::get('profesores', 'ProfesorController@index');
	Route::get('profesores/{id}/edit', 'ProfesorController@edit');
	Route::put('profesores/{id}/asignar', 'ProfesorController@asignar')->name('profesores.asignar');
	Route::put('profesores/{id}/eliminar', 'ProfesorController@eliminar')->name('profesores.eliminar');
	Route::GET('pdf-profesores', 'ProfesorController@PDF')->name('PDF_profesor');
	Route::GET('excel-profesores', 'ProfesorController@Excel')->name('Excel_profesor');
});
Route::group(["middleware" => "admin"], function(){
	Route::get('profesores/create', 'ProfesorController@create');
	Route::put('profesores/{id}/delete', 'ProfesorController@delete')->name('profesores.delete');
});
Route::group(["middleware" => "profesor"], function(){
	Route::get('mis-asignaturas', 'ProfesorController@asignaturas');
});


/* RUTAS ALUMNOS */
Route::group(["middleware" => "alumno"], function(){
	Route::get('alumnos', 'AlumnoController@index');
});

Route::group(["middleware" => "admin"], function(){
	Route::get('alumnos/create', 'AlumnoController@store');
	Route::get('alumnos/{id}/delete', 'AlumnoController@delete')->name('alumnos.delete');
});
Route::group(["middleware" => "admin-utp" ], function(){
	Route::get('alumnos/{id}/edit', 'AlumnoController@edit');
	Route::get('alumnos/{id}/cambiarcurso', 'AlumnoController@cambiarcurso')->name('alumnos.cambiarcurso');
});

/* RUTAS CURSOS */

Route::group(["middleware" => "admin-utp" ], function(){
	Route::get('cursos', 'CursoController@index');
});

Route::group(["middleware" => "admin-profesor-utp"], function(){
	Route::get('cursos/{id}/detalle', 'CursoController@detalle')->name('detalle');
	Route::GET('pdf-cursos', 'CursoController@PDF')->name('PDF_cursos');
	Route::GET('pdf-cursos-detalle-{id}', 'CursoController@PDFCurso')->name('PDF_cursos-detalle');
	Route::GET('pdf-cursos-notas-{id_curso}-{id_asignatura}', 'CursoController@PDFCursoNotas')->name('PDF_cursos-notas');
	Route::GET('excel-cursos', 'CursoController@Excel')->name('Excel_cursos');

});

/* RUTAS ASIGNATURAS */
Route::group(["middleware" => "admin-profesor-utp" ], function(){
	Route::get('asignaturas/{id_curso}/detalle/{id_asignatura}', 'AsignaturaController@asignaturaProfesor')->name('asignaturas.asignaturaProfesor');
});

Route::group(["middleware" => "profesor"], function(){
	Route::POST('asignaturas/{id}/descripcion', 'AsignaturaController@editDescripcion')->name('asignaturas.editDescripcion');
});
/* RUTAS NOTAS */


Route::group(["middleware" => "profesor"], function(){
	Route::get('notas/create', 'NotaController@create');
});
Route::group(["middleware" => "admin-profesor-utp" ], function(){
	Route::get('notas/{id}/detalle', 'NotaController@detalle')->name('detalle');
	Route::get('notas-pdf-{id}', 'NotaController@PDFNotas')->name('PDF_notas');
});
Route::group(["middleware" => "utp"], function(){
	Route::get('notas/{id}/utp', 'NotaController@utpEdit')->name('nota.utp');
});
	


/* RUTAS CERTIFICADO */

Route::group(["middleware" => "administrativo"], function(){
	Route::get('certificado/index', 'CertificadoController@index');
	Route::get('certificado/create', 'CertificadoController@create');
});

Route::group(["middleware" => "administrativo-alumno" ], function(){
	Route::get('descargar','CertificadoController@generarCertificado')->name('certificado.generarCertificado');
});
Route::group(["middleware" => "alumno"], function(){
	Route::get('nuevo-certificado', 'CertificadoController@certificado');
});
/* RUTAS CALENDARIO */

Route::group(["middleware" => "alumno"], function(){
	Route::get('calendario', 'CalendarioController@index');
});
Route::group(["middleware" => "profesor"], function(){
	Route::get('calendario/profesor/index', 'CalendarioController@indexProfesor');
	Route::get('calendario/create', 'CalendarioController@create');
	Route::put('calendario/{id}/delete', 'CalendarioController@delete')->name('calendario.delete');
});

/* RUTAS NOTICIAS */


Route::get('inicio', 'NoticiasController@index');

Route::group(["middleware" => "admin-administrativo-utp" ], function(){
	Route::get('inicio/create', 'NoticiasController@create');

	Route::get('inicio/delete/{id}', 'NoticiasController@delete')->name('noticias.delete');
});

/* RUTA PARA MODIFICAR DATOS DE USUARIO */
Route::PUT('inicio/edit/{id}', 'NoticiasController@editUserDatos')->name('datosUsuarios.Edit');




Route::get('/home', 'HomeController@index')->name('home');





































































































































































































/* RUTAS JAVIER */

	/* RUTAS ADMINISTRATIVOS */

		
	Route::group(["middleware" => "admin"], function(){
		Route::get('administrativos/index', 'AdministrativoController@index');

		Route::get('administrativos/create', 'AdministrativoController@create');

		Route::get('administrativos/{id}/edit', 'AdministrativoController@edit');

		Route::put('administrativos/{id}/estado', 'AdministrativoController@estado')->name('administrativo_estado');

		Route::POST('administrativos/{id}/destroy', 'AdministrativoController@destroy');
	});
	/* RUTAS ESPECIALISTAS */
	Route::group(['middleware' => "admin-utp" ], function (){

		Route::get('especialistas', 'EspecialistaController@index');
		Route::put('especialistas/{id}/agregar_quitar_pie', 'EspecialistaController@agregar_quitar_pie')->name('agregar_quitar_pie');
	});

	Route::group(["middleware" => "admin" ], function(){
		Route::put('especialistas/{id}/estado', 'EspecialistaController@estado')->name('estado');
		Route::get('especialistas/create', 'EspecialistaController@create');

		Route::get('especialistas/{id}/edit', 'EspecialistaController@edit');
	});

	/* RUTAS MODULO PLANIFICACIONES */

		

		

		/* SUBRUTA -> PROFESORES */
		Route::group(["middleware" => "profesor"], function(){

			Route::get('planificaciones/create', 'PlanificacionController@create');

			Route::get('planificaciones/{id}/edit', 'PlanificacionController@edit');

			Route::POST('planificaciones/{id}/destroy', 'PlanificacionController@destroy')->name('planificaciones.eliminar_archivo');

			Route::put('planificaciones/{id}/actualizar_archivo', 'PlanificacionController@actualizar_archivo')-> name('planificaciones.actualizar_archivo'); 

		});
		/* SUBRUTA -> UTP-PROFESOR */
		Route::group(["middleware" => "profesor-utp" ], function(){
			Route::get('planificaciones', 'PlanificacionController@index');

			Route::get('planificaciones/download/{file}', 'PlanificacionController@descargar_archivo');
		});

		/* SUBRUTA -> UTP */
		Route::group(["middleware" => "utp"], function(){

			Route::put('planificaciones/{id}/estado', 'PlanificacionController@estado')-> name('planificaciones.estado');

			Route::get('planificaciones/{id_profesor}/perfil_profesor', 'PlanificacionController@vista_perfil_profesor_administrativo')-> name('planificaciones.administrativo.vista_profesor');	
		});


	/* RUTAS MODULO PIE */

		
		
		/* SUBRUTA -> ALUMNOS */
		Route::group(["middleware" => "utp"], function(){
			Route::get('modulo_pie/alumnos/index', 'AlumnoPieController@index_alumnos');

		});

		/* SUBRUTA -> ALUMNOS PIE */
		Route::group(["middleware" => "especialista-utp" ], function(){
			Route::get('modulo_pie/alumnos_pie/index', 'AlumnoPieController@index_alumnos_pie');
		});
		Route::group(["middleware" => "utp"], function(){
			Route::put('modulo_pie/alumno_pies/{id}/estado', 'AlumnoPieController@estado_pie')->name('modulo_pie.estado_pie');
		
			Route::put('modulo_pie/alumno_pies/{id}/asignardocente', 'AlumnoPieController@asignardocente')->name('modulo_pie.asignardocente');

			Route::put('modulo_pie/alumno_pies/{id}/cambiardocente', 'AlumnoPieController@cambiar_docente')->name('modulo_pie.cambiar_docente');
		
			Route::put('modulo_pie/alumno_pies/{id}/modificar_alumno_pie', 'AlumnoPieController@modificar_alumno_pie')->name('modulo_pie.modificar_alumno_pie');
		});

		/* SUBRUTA -> CARPETA PIE */
		Route::group(["middleware" => "especialista-utp" ], function(){
			Route::get('modulo_pie/alumno_pies/{id}/carpeta', 'CarpetaPieController@index')->name('modulo_pie.carpeta_alumnos_pie');
			Route::get('modulo_pie/alumno_pies/{id}/carpeta/download/{file}', 'CarpetaPieController@descargar_archivo')->name('modulo_pie.descargar_archivo');
		});
		Route::group(["middleware" => "especialista"], function(){
			Route::put('modulo_pie/alumno_pies/create', 'CarpetaPieController@store');

			Route::put('modulo_pie/alumno_pies/{id}/carpeta/{id_archivo}/archivo', 'CarpetaPieController@actualizar_archivo')->name('modulo_pie.actualizar_archivo'); 

			Route::POST('modulo_pie/alumno_pies/{id}/carpeta/{id_archivo}/destroy', 'CarpetaPieController@destroy')->name('modulo_pie.eliminar_archivo');
		});

	/* RUTAS MODULO MATERIALES */

		Route::get('modulo_materiales/profesor/{id_curso}/{id_asignatura}/vista_curso/download/{file}', 'MaterialProfesorController@descargar_archivo')->name('modulo_materiales.descargar_archivo');

		/* SUBRUTA -> ADMINISTRADOR */
		Route::group(["middleware" => "utp"], function(){
			Route::get('modulo_materiales/administrador/index', 'MaterialProfesorController@index_administrador');

			Route::get('modulo_materiales/administrador/profesor/{id}/index', 'MaterialProfesorController@index_administrador_perfil_profesor')->name('modulo_materiales.administrador.index_profesor');

			Route::get('modulo_materiales/administrador/profesor/{id}/index/{id_curso}/{id_asignatura}/vista_curso', 'MaterialProfesorController@vista_curso_administrador')->name('modulo_materiales.administrador.vista_curso');
		});

		/* SUBRUTA -> PROFESORES */
		Route::group(["middleware" => "profesor"], function(){

			Route::get('modulo_materiales/profesor/index', 'MaterialProfesorController@index_profesor');

			Route::get('modulo_materiales/profesor/{id_curso}/{id_asignatura}/vista_curso', 'MaterialProfesorController@vista_curso_profesor')->name('modulo_materiales.profesor.vista_curso');

			Route::put('modulo_materiales/profesor/{id_curso}/{id_asignatura}/vista_curso/agregar_unidad', 'MaterialProfesorController@agregar_unidad');

			Route::put('modulo_materiales/profesor/{id_curso}/{id_asignatura}/vista_curso/subir_archivo', 'MaterialProfesorController@subir_archivo');

			Route::put('modulo_materiales/profesor/{id_curso}/{id_asignatura}/vista_curso/{id_archivo}/actualizar_archivo', 'MaterialProfesorController@actualizar_archivo')->name('modulo_materiales.actualizar_archivo');

			Route::POST('modulo_materiales/profesor/{id_curso}/{id_asignatura}/vista_curso/{id_archivo}/eliminar_archivo', 'MaterialProfesorController@eliminar_archivo')->name('modulo_materiales.eliminar_archivo');

			Route::put('modulo_materiales/profesor/{id_curso}/{id_asignatura}/vista_curso/{id_titulo}/actualizar_nombre_unidad', 'MaterialProfesorController@actualizar_nombre_unidad')->name('modulo_materiales.actualizar_nombre_unidad');

			Route::POST('modulo_materiales/profesor/{id_curso}/{id_asignatura}/vista_curso/{id_titulo}/eliminar_nombre_unidad', 'MaterialProfesorController@eliminar_nombre_unidad')->name('modulo_materiales.eliminar_nombre_unidad');

		});

			

		/* SUBRUTA -> ALUMNOS */
		Route::group(["middleware" => "alumno"], function(){
			Route::get('modulo_materiales/alumno/index', 'MaterialProfesorController@index_alumno');

			Route::get('modulo_materiales/alumno/index/{id_profesor}/{id_curso}/{id_asignatura}/vista_curso', 'MaterialProfesorController@vista_curso_alumno')->name('modulo_materiales.alumno.vista_curso');
		});
		
	/* RUTAS LICENCIAS MEDICAS */

		

		/* SUBRUTA -> ADMINISTRADOR */
		Route::group(["middleware" => "utp"], function(){
			Route::get('licencias_medicas/administrador/index', 'LicenciaMedicaController@index_administrador');

			Route::get('licencias_medicas/administrador/{id_alumno}/licencias_medicas', 'LicenciaMedicaController@index_licencias_administrador')->name('licencias_medicas.administrador');

			Route::put('licencias_medicas/administrador/{id_alumno}/licencias_medicas/estado', 'LicenciaMedicaController@estado_licencias_administrador')->name('licencias_medicas.administrador.estado');
		});

		/* SUBRUTA -> ALUMNOS */
		Route::group(["middleware" => "alumno"], function(){
			Route::get('licencias_medicas/alumno/index', 'LicenciaMedicaController@index_licencias_alumno');

			Route::put('licencias_medicas/alumno/index/subir_archivo_licencia', 'LicenciaMedicaController@subir_archivo_licencia');

			Route::put('licencias_medicas/alumno/index/{id_archivo}', 'LicenciaMedicaController@actualizar_archivo_licencia')->name('licencias_medicas.actualizar_archivo_licencia');

			Route::POST('licencias_medicas/alumno/index/{id_archivo}', 'LicenciaMedicaController@eliminar_archivo_licencia')->name('licencias_medicas.eliminar_archivo_licencia');
		});

		Route::get('licencias_medicas/alumno/index/{file}', 'LicenciaMedicaController@descargar_archivo_licencia');
	/* RUTAS DOCUMENTOS INSTITUCIONALES */

		

		Route::get('documentos_institucionales/index', 'DocumentoInstitucionalController@index');

		Route::put('documentos_institucionales/index/subir_archivo', 'DocumentoInstitucionalController@subir_archivo');

		Route::get('documentos_institucionales/index/{file}', 'DocumentoInstitucionalController@descargar_archivo');

		Route::put('documentos_institucionales/index/actualizar_archivo/{id_archivo}', 'DocumentoInstitucionalController@actualizar_archivo')->name('documentos_institucionales.actualizar_archivo');

		Route::POST('documentos_institucionales/index/eliminar_archivo/{id_archivo}', 'DocumentoInstitucionalController@eliminar_archivo')->name('documentos_institucionales.eliminar_archivo');




	/* RUTAS ALUMNOS */
	
