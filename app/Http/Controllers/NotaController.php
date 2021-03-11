<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;   
use DB;
use App\Curso;
use Illuminate\Support\Facades\Validator;
use Session;
use App\Nota;
use Illuminate\Http\Request;

class NotaController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules =  array('captcha' => ['required', 'captcha']); 
        $validator = Validator::make( 
            [ 'captcha' => $request->input('captcha') ], 
            $rules, 
            // Mensaje de error personalizado 
            [ 'captcha' => 'El captcha ingresado es incorrecto.' ]
        ); 
        if ($validator->passes()) { 
            $alumnos = DB::table('alumnos')->where('id_curso','=',$request->input('id_curso'))->get();
        $profesor = DB::table('profesors')->where('rut','=',$request->input('id_profesor'))->get();
        $semestre = date('m');
        $ano = date('Y');
        if($semestre < 8 ){
            foreach($alumnos as $alumno) {
                $numero = DB::table('notas')->where('id_alumno','=',$alumno->id)->where('id_asignatura','=',$request->input('id_asignatura'))
                ->where('id_profesor','=',$profesor->first()->id)->count();
                $nota = new Nota();
                if($request->input($alumno->id) > 0.1){
                    $nota->nota = str_replace(',','.',$request->input($alumno->id));  
                }else{
                    $nota->nota = 'P';
                }
                $nota->descripcion = $request->input('titulo');
                $nota->numero = $numero+1;
                $nota->semestre = "Primer";
                $nota->ano = $ano;
                $nota->id_profesor = $profesor->first()->id;
                $nota->id_alumno = $alumno->id;
                $nota->id_curso = $request->input('id_curso');
                $nota->id_asignatura = $request->input('id_asignatura');
                $nota->save();

            }
            return redirect('asignaturas/'.$request->input('id_curso').'/detalle/'.$request->input('id_asignatura'))->with('success', 'Nota agregada correctamente');

        }else{
            foreach($alumnos as $alumno) {
                $numero = DB::table('notas')->where('id_alumno','=',$alumno->id)->where('id_asignatura','=',$request->input('id_asignatura'))
                ->where('id_profesor','=',$profesor->first()->id)->count();
                $nota = new Nota();
                if($request->input($alumno->id) >= 1.0){
                    $nota->nota = str_replace(',','.',$request->input($alumno->id));  
                }else{
                    $nota->nota = 'P';
                }
                $nota->descripcion = $request->input('titulo');
                $nota->numero = $numero+1;
                $nota->semestre = "Segundo";
                $nota->ano = $ano;
                $nota->id_profesor = $profesor->first()->id;
                $nota->id_alumno = $alumno->id;
                $nota->id_curso = $request->input('id_curso');
                $nota->id_asignatura = $request->input('id_asignatura');
                $nota->save();

            }
            return redirect('asignaturas/'.$request->input('id_curso').'/detalle/'.$request->input('id_asignatura'))->with('success', 'Nota agregada correctamente');


        }
        } else { 
            return back()->withInput($request->all())->with('danger','Captcha mal ingresado'); 
        } 
        



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function show(Nota $nota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function edit(Nota $nota)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nota $nota)
    {
        //
    }

     public function detalle($id)
    {
        $curso = Curso::find($id);
     
        return view('notas.notascurso', compact('curso',));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nota $nota)
    {
        //
    }


    public function utpEdit(Request $request, $id)
    {
        $nota = Nota::find($id);
        $nota->nota = $request->input('nota');
        $nota->update();
        return back()->with('success','Nota modificada correctamente');
    }

    public function PDFNotas($id)
    {
        $curso = Curso::find($id);
     
        $pdf = \PDF::loadView('certificado.pdf_curso_notas_all', compact('curso'));
        return $pdf->download('listado-notas-'.$curso->nivel.'-'.$curso->grado.'-'.$curso->letra.'.pdf');
    }   

}
