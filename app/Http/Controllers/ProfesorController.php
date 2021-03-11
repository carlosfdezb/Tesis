<?php

namespace App\Http\Controllers;

use App\Profesor;
use App\User;
use App\ProfesorPie;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProfesoresExport;

class ProfesorController extends Controller
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
        $var2 = explode(' ',$request->get('scope_nombre'));
        $var3 = array_pad($var2, 4,null);
        $scope_rut = $request->input('scope_rut');
        $scope_correo = $request->input('scope_correo');
        $profesor = Profesor::orderBy('apellido_paterno', 'asc')->where('estado','Activo')
            ->Primer($var3)
            ->Segundo($var3)
            ->Tercer($var3)
            ->Cuarto($var3)
            ->Rut($scope_rut)
            ->Correo($scope_correo)
            ->paginate(10);
        $profesoreliminado = Profesor::orderBy('apellido_paterno', 'asc')->where('estado','Inactivo')
            ->Primer($var3)
            ->Segundo($var3)
            ->Tercer($var3)
            ->Cuarto($var3)
            ->Rut($scope_rut)
            ->Correo($scope_correo)
            ->paginate(10);

        $cursos = DB::table('cursos')->distinct()->get(['nivel']);

        return view('profesores.index', compact('profesor', 'cursos', 'profesoreliminado'));
    }

    public function asignaturas()
    {
        $profesor = Profesor::where('rut', auth()->user()->rut);

        $asignaturastotal = DB::table('asignatura_profesor')->join('asignaturas', 'asignatura_profesor.asignatura_id', 'asignaturas.id')
            ->where('profesor_id', '=', $profesor->first()->id)->count();

       
        return view('profesores.asignaturasprofesor', compact('profesor', 'asignaturastotal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $profesores                   = new Profesor();
        $profesores->primer_nombre    = $request->input('primer_nombre');
        $profesores->segundo_nombre   = $request->input('segundo_nombre');
        $profesores->apellido_paterno = $request->input('apellido_paterno');
        $profesores->apellido_materno = $request->input('apellido_materno');
        $profesores->rut              = $request->input('rut');
        $profesores->correo           = $request->input('correo');
        $profesores->estado           = 'Activo';
        $profesores->save();

        return redirect('/profesores')->with('success', 'Profesor agregado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Profesor  $profesor
     * @return \Illuminate\Http\Response
     */
    public function show(Profesor $profesor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profesor  $profesor
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profesor  $profesor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profesor $profesor)
    {
        $profesores                   = Profesor::find($request->input('id'));
        $profesores->primer_nombre    = $request->input('primer_nombre');
        $profesores->segundo_nombre   = $request->input('segundo_nombre');
        $profesores->apellido_paterno = $request->input('apellido_paterno');
        $profesores->apellido_materno = $request->input('apellido_materno');
        $profesores->rut              = $request->input('rut');
        $profesores->correo           = $request->input('correo');
        $profesores->update();

        return redirect('/profesores')->with('success', 'Datos de profesor actualizados correctamente');
    }

    public function asignar(Request $request, Profesor $profesor)
    {
        if (is_null($var = DB::table('asignatura_profesor')->where('asignatura_id', '=', $request->input('selectasignaturas'))->Where('letra', '=', $request->input('selectletra'))->Where('nivel', '=', $request->input('selectnivel'))->Where('grado', '=', $request->input('selectgrado'))->first())) {
            DB::table('asignatura_profesor')
                ->insert(['asignatura_id' => $request->input('selectasignaturas'),
                    'profesor_id'             => $request->input('id'),
                    'nivel'                   => $request->input('selectnivel'),
                    'grado'                   => $request->input('selectgrado'),
                    'letra'                   => $request->input('selectletra')]);

            return redirect('/profesores')->with('success', 'Asignatura agregada al profesor correctamente');
        } else {
            return redirect('/profesores')->with('warning', 'Asignatura ya se encuentra asignada al curso');
        }

    }

    public function eliminar(Request $request, Profesor $profesor)
    {

        $var = DB::table('asignatura_profesor')->where('profesor_id', $request->input('id'))->where('asignatura_id', $request->input('selectasignaturas'))->delete();

        return redirect('/profesores')->with('danger', 'Asignatura dictada por profesor eliminada');
    }

    public function delete(Request $request, Profesor $profesor, $id)
    {

        $profesor = Profesor::find($id);
        $usuario = User::where('rut',$profesor->rut);

        if($profesor->curso){
            return back()->with('warning','No es posible eliminar a un profesor con jefatura');
            
        }else{
            if($profesor->asignaturas->count()>0){
                return back()->with('warning','No es posible eliminar a un profesor con asignaturas asignadas');
            }else{
                $usuario->delete();

                if($profesor->estado == 'Activo'){

                    $profesor->estado = 'Inactivo';
                    $profesor->update();

                }
                else{

                    $profesor->estado = 'Activo';
                    $profesor->update();
                }

                return redirect('/profesores')->with('warning','¡Estado actualizado con éxito!');
            }
        }
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profesor  $profesor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profesor $profesor)
    {
        //
    }

    public function PDF(Request $request)
    {
        $profesor = Profesor::orderBy('apellido_paterno', 'asc')->where('estado','Activo')->get();

        $pdf = \PDF::loadView('certificado.pdf_profesor', compact('profesor'));
        return $pdf->download('listado-profesores.pdf');
    }

    public function Excel()
    {
        return Excel::download(new ProfesoresExport, 'listado-profesores.xlsx');
    }


//RUTAS API

    public function apiAll()
    {
        $profesores = Profesor::all();
        return response()->json(['data' => $profesores], 200, [], JSON_NUMERIC_CHECK);
    }

}
