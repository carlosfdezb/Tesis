<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;   
use DB;
use Session;
use App\Curso;
use App\Profesor;
use App\Asignatura;
use App\Alumno;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CursosExport;

class CursoController extends Controller
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



    public function index(Request $request)
    {
        $scope_curso = $request->input('scope_curso');
        $scope_rut = $request->input('scope_rut');
        $var2 = explode(' ',$request->get('scope_nombre'));
        $var3 = array_pad($var2, 4,null);
        $curso = Curso::orderBy('id', 'asc')
        ->Curso($scope_curso)
        ->Primer($var3)
        ->Segundo($var3)
        ->Tercer($var3)
        ->Cuarto($var3)
        ->Rut($scope_rut)
        ->paginate(10);

        $cursolista = Curso::orderBy('id', 'asc')->get();
     
     
        return view('cursos.index', compact('curso','cursolista'));
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
     * @param  \App\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function show(Curso $curso)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function edit(Curso $curso)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Curso $curso)
    {
        /* FALTA LA MODIFICACIÓN DEL ROL */
        $curso = Curso::find($request->input('id'));

         /* CAMBIAR CONSEJO DE CURSO cc A PROFESOR JEFE NUEVO */
        $cc = DB::table('asignatura_profesor')->where('asignatura_id',10)->where('nivel',$curso->nivel)->where('grado',$curso->grado)->where('letra',$curso->letra)
            ->update(['profesor_id' => $request->input('selectprofes')]);
         /* ASIGNAR JEFATURA A PROFESOR NUEVO */
        $profesorjefe=Curso::find($request->input('id'));
        $profesorjefe->id_profesor= $request->input('selectprofes');
        $profesorjefe->update();        

        return redirect('/cursos')->with('success','Jefatura actualizada');
    }

    public function detalle($id)
    {
      
        $alumnos = Alumno::where('id_curso','=',$id)->where('estado','Activo')
        ->orderBy('apellido_paterno', 'asc')
        ->paginate(10);

        $curso = Curso::find($id);
     
        return view('cursos.detallecurso', compact('alumnos','curso'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function destroy(Curso $curso)
    {
        //
    }

    public function PDF(Request $request)
    {
        $curso = Curso::all();

        $pdf = \PDF::loadView('certificado.pdf_curso', compact('curso'));
        return $pdf->download('listado-curso.pdf');
    }

    public function Excel()
    {
        return Excel::download(new CursosExport, 'listado-curso.xlsx');
    }

    public function PDFCurso($id)
    {
        $curso = Curso::find($id);

        $pdf = \PDF::loadView('certificado.pdf_curso_detalle', compact('curso'));
        return $pdf->download('listado-alumnos-'.$curso->nivel.'-'.$curso->grado.'-'.$curso->letra.'.pdf');
    }

    public function PDFCursoNotas($id_curso, $id_asignatura)
    {
        $curso = Curso::find($id_curso);
        $asignatura = Asignatura::find($id_asignatura);

        $pdf = \PDF::loadView('certificado.pdf_curso_notas', compact('curso','asignatura'));
        return $pdf->download('listado-notas-'.$asignatura->nombre.'-'.$curso->nivel.'-'.$curso->grado.'-'.$curso->letra.'.pdf');
    }

}
