<?php

namespace App\Http\Controllers;

use DB;
use App\Alumno;
use Illuminate\Http\Request;
use App\Certificado;
use Barryvdh\DomPDF\Facade;
use Session;


class CertificadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $certificados = Certificado::all();
        return view('certificado.index', compact('certificados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function certificado()
    {
        $alumno = Alumno::all()->where('rut',auth()->user()->rut);

        return view('certificado.create', compact('alumno'));
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function generarCertificado(Request $request)
    {
        if(Alumno::all()->where('rut',$request->rut)->count()){
            //1 . Certificado de alumno regular
            if($request->tipo==1){
                $color = $request->color;
                $alumno= Alumno::all()->where('rut',$request->rut)->first();

                if(!DB::table('certificados')->where('folio','1'.date('Ymd').''.$alumno->id)->count()){
                    $certificado = new Certificado();
                    $certificado->tipo = 'Alumno regular';
                    $certificado->folio = '1'.date('Ymd').''.$alumno->id;
                    $certificado->fecha = date('Y-m-d');
                    $certificado->id_alumno = $alumno->id;
                    $certificado->save();
                }

                $pdf = \PDF::loadView('certificado.alumno-regular', compact('alumno','color'));
                return $pdf->download('certificado-alumno-regular-'.$alumno->primer_nombre.'-'.$alumno->apellido_paterno.'.pdf') ;

            }else{
            //2. Certificado de notas
                $semestre = $request->semestre;
                $color = $request->color;
                $alumno= Alumno::all()->where('rut',$request->rut)->first();
                if(DB::table('notas')->where('semestre',$semestre)->where('ano',date('Y'))->where('id_alumno',$alumno->id)->count()){
                    $asignaturas = DB::table('curso_asignatura')
                    ->join('asignaturas','curso_asignatura.asignatura_id','asignaturas.id')
                    ->join('asignatura_profesor','asignaturas.id','asignatura_profesor.asignatura_id')
                    ->join('profesors','asignatura_profesor.profesor_id','profesors.id')
                    ->where('curso_asignatura.curso_id',$alumno->id_curso)
                    ->where('asignatura_profesor.nivel',$alumno->curso->nivel)
                    ->where('asignatura_profesor.grado',$alumno->curso->grado)
                    ->where('asignatura_profesor.letra',$alumno->curso->letra)
                    ->orderby('nombre')->get();

                    if(!DB::table('certificados')->where('folio','2'.date('Ymd').''.$alumno->id)->count()){
                    $certificado = new Certificado();
                    $certificado->tipo = 'Notas';
                    $certificado->folio = '2'.date('Ymd').''.$alumno->id;
                    $certificado->fecha = date('Y-m-d');
                    $certificado->id_alumno = $alumno->id;
                    $certificado->save();
                    }

                    $pdf = \PDF::loadView('certificado.notas', compact('alumno','color','asignaturas','semestre'));
                    return $pdf->download('certificado-notas-'.$alumno->primer_nombre.'-'.$alumno->apellido_paterno.'.pdf');
                }else{
                    return back()->with('warning','El alumno no presenta notas en el semestre seleccionado');
                }
            }
        }else{
            return back()->with('warning','El rut ingresado no corresponde a ningún alumno');
        }
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Certificado  $certificado
     * @return \Illuminate\Http\Response
     */
    public function show(Certificado $certificado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Certificado  $certificado
     * @return \Illuminate\Http\Response
     */
    public function edit(Certificado $certificado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Certificado  $certificado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Certificado $certificado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Certificado  $certificado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Certificado $certificado)
    {
        //
    }
}
