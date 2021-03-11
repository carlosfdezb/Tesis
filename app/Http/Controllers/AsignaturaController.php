<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Crypt;
use App\Asignatura;
use App\Curso;
use App\Profesor;
use App\Alumno;
use App\Nota;
use Illuminate\Support\Facades\Redirect;
use Session;
use DB;
use Illuminate\Http\Request;

class AsignaturaController extends Controller
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

    public function asignaturaProfesor(Request $request, $id_curso, $id_asignatura)
    {
       $asignatura = DB::table('asignaturas')->where('id','=',$id_asignatura);

        $alumnos = DB::table('alumnos')->where('id_curso','=',$id_curso)->orderBy('apellido_paterno', 'asc')->get();

        $curso = Curso::find($id_curso);
        //$profesor = DB::table('profesors')->where('rut','=',auth()->user()->rut)->get(); 
        //$notas = Nota::where('id_curso',$id_curso)->where('id_asignatura',$id_asignatura)->where('ano',date('Y'))->get();

        return view('asignaturas.detalleasignaturaprofesor', compact('alumnos','asignatura','curso'));
    }

    public function editDescripcion(Request $request,$id)
    {   
        $datos = Nota::find($id);
        $id_curso = Alumno::find($datos->id_alumno);
        $descripcion = DB::table('notas')
                        ->where('numero',$datos->numero)
                        ->where('semestre',$datos->semestre)
                        ->where('ano',$datos->ano)
                        ->where('id_asignatura',$datos->id_asignatura)
                        ->where('id_profesor',$datos->id_profesor)
                        ->update(['descripcion'=> $request->input('descripcion')]);



        return redirect('asignaturas/'.$id_curso->id_curso.'/detalle/'.$datos->id_asignatura)->with('success', 'Descripción modificada correctamente');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Asignatura  $asignatura
     * @return \Illuminate\Http\Response
     */
    public function show(Asignatura $asignatura)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Asignatura  $asignatura
     * @return \Illuminate\Http\Response
     */
   
    public function update(Request $request, Asignatura $asignatura)
    {
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Asignatura  $asignatura
     * @return \Illuminate\Http\Response
     */
    public function destroy(Asignatura $asignatura)
    {
        //
    }


}
