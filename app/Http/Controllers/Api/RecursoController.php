<?php

namespace App\Http\Controllers\Api;

use DB;
use App\Noticia;
use App\Alumno;
use App\User;
use App\Curso;
use App\Nota;
use App\Calendario;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RecursoController extends Controller
{

    public function noticias(){
        $noticias = Noticia::orderBy('created_at','desc')->where('tipo','Principal')->get();
        return response()->json($noticias);
    }

    public function asignaturas($id){
    	$user = User::find($id);
        $alumno = Alumno::where('rut',$user->rut)->first();


        $asignaturas = DB::table('curso_asignatura')
        ->join('asignaturas','curso_asignatura.asignatura_id','asignaturas.id')
        ->join('asignatura_profesor','asignaturas.id','asignatura_profesor.asignatura_id')
        ->join('profesors','asignatura_profesor.profesor_id','profesors.id')
        ->where('curso_asignatura.curso_id',$alumno->id_curso)
        ->where('asignatura_profesor.nivel',$alumno->curso->nivel)
        ->where('asignatura_profesor.grado',$alumno->curso->grado)
        ->where('asignatura_profesor.letra',$alumno->curso->letra)->orderby('nombre')->get();

        return response()->json($asignaturas);
    }

    public function notas($user_id,$asignatura_id){
        $user = User::find($user_id);
        $alumno = Alumno::where('rut',$user->rut)->first();

        $notas = Nota::where('ano',date('Y'))->where('id_alumno',$alumno->id)->where('id_asignatura',$asignatura_id)->get();
        return response()->json($notas);
    }

    public function promedio($user_id,$asignatura_id){
        $user = User::find($user_id);
        $alumno = Alumno::where('rut',$user->rut)->first();

        $promedio = collect(["promedio" => number_format(round(Nota::where('ano',date('Y'))->where('id_alumno',$alumno->id)->where('id_asignatura',$asignatura_id)->avg('nota'), 1), 1, '.', '.')]);
        return response()->json($promedio);
    }

    public function asignatura($user_id,$asignatura_id){
        $user = User::find($user_id);
        $alumno = Alumno::where('rut',$user->rut)->first();

        $asignatura = DB::table('curso_asignatura')
        ->join('asignaturas','curso_asignatura.asignatura_id','asignaturas.id')
        ->join('asignatura_profesor','asignaturas.id','asignatura_profesor.asignatura_id')
        ->join('profesors','asignatura_profesor.profesor_id','profesors.id')
        ->where('asignaturas.id',$asignatura_id)
        ->where('curso_asignatura.curso_id',$alumno->id_curso)
        ->where('asignatura_profesor.nivel',$alumno->curso->nivel)
        ->where('asignatura_profesor.grado',$alumno->curso->grado)
        ->where('asignatura_profesor.letra',$alumno->curso->letra)->first();
        return response()->json($asignatura);
    }

    public function curso($id){
        $user = User::find($id);
        $alumno = Alumno::where('rut',$user->rut)->first();
        $curso = Curso::where('id',$alumno->curso->id)->with('profesor')->get();
        return response()->json($curso);
    }


    public function alumno($id){
        $user = User::find($id);
        $alumno = Alumno::where('rut',$user->rut)->with('curso')->get();
        return response()->json($alumno);
    }

    public function calendario($id){
        $user = User::find($id);
        $alumno = Alumno::where('rut',$user->rut)->first();

        $calendario = Calendario::orderBy('fecha')->where('fecha','>=',date('Y-m-d'))->where('id_curso',$alumno->curso->id)->with('asignatura','profesor')->get();
        return response()->json($calendario);
    }
}
