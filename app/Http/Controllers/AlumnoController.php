<?php

namespace App\Http\Controllers;

use DB;
use App\Alumno;
use App\Curso;

use Illuminate\Http\Request;
use Spipu\Html2Pdf\Html2Pdf;

class AlumnoController extends Controller
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
        $alumno = Alumno::all()->where('rut',auth()->user()->rut);

 
        $asignaturas = DB::table('curso_asignatura')
        ->join('asignaturas','curso_asignatura.asignatura_id','asignaturas.id')
        ->join('asignatura_profesor','asignaturas.id','asignatura_profesor.asignatura_id')
        ->join('profesors','asignatura_profesor.profesor_id','profesors.id')
        ->where('curso_asignatura.curso_id',$alumno->first()->id_curso)
        ->where('asignatura_profesor.nivel',$alumno->first()->curso->nivel)
        ->where('asignatura_profesor.grado',$alumno->first()->curso->grado)
        ->where('asignatura_profesor.letra',$alumno->first()->curso->letra)->orderby('nombre')->get();


        return view('alumnos.index', compact('alumno','asignaturas'));

    }
    public function calendario()
    {
        return view('calendario.index');
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $alumno                   = new Alumno();
        $alumno->primer_nombre    = $request->input('primer_nombre');
        $alumno->segundo_nombre   = $request->input('segundo_nombre');
        $alumno->apellido_paterno = $request->input('apellido_paterno');
        $alumno->apellido_materno = $request->input('apellido_materno');
        $alumno->rut              = $request->input('rut');
        $alumno->correo           = $request->input('correo');
        $alumno->id_curso         = $request->input('id_curso');
        $alumno->estado           = 'Activo';
        $alumno->save();

        return redirect('/cursos/' . $request->input('id_curso') . '/detalle')->with('success', 'Alumno agregado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function show(Alumno $alumno)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function edit(Alumno $alumno)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alumno $alumno)
    {
        $alumno                   = Alumno::find($request->input('id'));
        $alumno->primer_nombre    = $request->input('primer_nombre');
        $alumno->segundo_nombre   = $request->input('segundo_nombre');
        $alumno->apellido_paterno = $request->input('apellido_paterno');
        $alumno->apellido_materno = $request->input('apellido_materno');
        $alumno->rut              = $request->input('rut');
        $alumno->correo           = $request->input('correo');
        $alumno->update();

        return redirect('/cursos/' . $alumno->id_curso . '/detalle')->with('success', 'Datos de alumno actualizados correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alumno $alumno)
    {
        //
    }

    public function delete($id)
    {
        $alumno = Alumno::find($id);
        $alumno->estado = "Inactivo";
        $alumno->update();

        return back()->with('danger','Alumno eliminado correctamente');
    }

    public function cambiarcurso(Request $request, $id)
    {
        $curso = Curso::find($request->input('curso'));

        $alumno = Alumno::find($id);
        $alumno->id_curso = $curso->id;
        $alumno->update();

        return back()->with('success','Alumno modificado de curso correctamente');
    }



    //RUTAS API

    public function misAsignaturasAPK()
    {
        $alumno = Alumno::where('rut',auth()->user()->rut)->first();
        return response()->json(['data' => $alumno->curso->asignaturas], 200, [], JSON_NUMERIC_CHECK);
    }
}
