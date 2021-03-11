<?php

namespace App\Http\Controllers;

use App\Comments;
use App\AlumnoPie;
use App\Alumno;
use App\Curso;
use App\Nee;
use App\EquipoPie;
use App\CarpetaPie;
use App\DocumentoPie;
use App\Especialista;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;
use DB;

class AlumnoPieController extends Controller
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

    public function index_alumnos(Request $request)
    {

        $var2 = explode(' ',$request->get('nombre'));
        $var3 = array_pad($var2, 4,null);
        $rut   = $request->get('rut');
        $curso   = $request->get('curso');


        $alumnos = Alumno::orderBy('apellido_paterno')
            ->where('estado','Activo')
            ->Primer($var3)
            ->Segundo($var3)
            ->Tercer($var3)
            ->Cuarto($var3)
            ->Rut($rut)
            ->Curso($curso)
            ->paginate(20);

        $inactivos = Alumno::orderBy('apellido_paterno')
            ->where('estado','Inactivo')
            ->Primer($var3)
            ->Segundo($var3)
            ->Tercer($var3)
            ->Cuarto($var3)
            ->Rut($rut)
            ->Curso($curso)
            ->paginate(20);

        $cursos = Curso::all();
        $nees = Nee::all();

        $docentes = EquipoPie::where('estado','Activo')->get();

        return view('modulo_pie.index_alumnos', compact('alumnos','cursos','docentes','inactivos','nees')); 
    }


    public function index_alumnos_pie(Request $request)
    {

        
        $cursos = Curso::all();
        $nees = Nee::all();
        $docentes = EquipoPie::where('estado','Activo')->get();
        

        $var2 = explode(' ',$request->get('nombre'));
        $var3 = array_pad($var2, 4,null);
        $var4 = explode(' ',$request->get('nombre_especialista'));
        $var5 = array_pad($var4, 4,null);
        $rut   = $request->get('rut');
        $curso   = $request->get('curso');


        $alumno_pies = AlumnoPie::orderBy('estado')
            ->where('estado','Activo')
            ->Primer($var3)
            ->Segundo($var3)
            ->Tercer($var3)
            ->Cuarto($var3)
            ->Especialista_primero($var5)
            ->Especialista_segundo($var5)
            ->Especialista_tercero($var5)
            ->Especialista_cuarto($var5)
            ->Rut($rut)
            ->Curso($curso)
            ->paginate(10);

        $inactivos = AlumnoPie::orderBy('estado')
            ->where('estado','Inactivo')
            ->Primer($var3)
            ->Segundo($var3)
            ->Tercer($var3)
            ->Cuarto($var3)
            ->Especialista_primero($var5)
            ->Especialista_segundo($var5)
            ->Especialista_tercero($var5)
            ->Especialista_cuarto($var5)
            ->Rut($rut)
            ->Curso($curso)
            ->paginate(10);
            

        return view('modulo_pie.index_alumnos_pie', compact('alumno_pies','cursos','docentes','inactivos','nees')); 
    }



        public function estado_pie($id)
    {

        $alumno_pie = AlumnoPie::find($id);

        if($alumno_pie->estado == "Activo"){

            $alumno_pie->estado = "Inactivo";
            $alumno_pie->update();

            return redirect('/modulo_pie/alumnos_pie/index')->with('warning','¡Alumno PIE dado de alta con éxito!');

        }else{

            $alumno_pie->estado = "Activo";
            $alumno_pie->update();


            return redirect('/modulo_pie/alumnos_pie/index')->with('success','¡Alumno PIE incorporado con éxito!');

        }
        
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
     * @param  \App\AlumnoPie  $alumnoPie
     * @return \Illuminate\Http\Response
     */
    public function show(AlumnoPie $alumnoPie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AlumnoPie  $alumnoPie
     * @return \Illuminate\Http\Response
     */
    public function edit(AlumnoPie $alumnoPie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AlumnoPie  $alumnoPie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AlumnoPie $alumnoPie)
    {
        //
    }

    public function asignardocente(Request $request, $id)
    {


        $alumno = Alumno::find($id);
        $docente = EquipoPie::find($id);

        $alumno_docente_pie = new AlumnoPie();
        $alumno_docente_pie->id_nee = $request->input('nee');
        $alumno_docente_pie->edad = $request->input('fecha_nacimiento');
        $alumno_docente_pie->fecha_diagnostico = $request->input('fecha_diagnostico');
        $alumno_docente_pie->fecha_reevaluacion = $request->input('fecha_reevaluacion');
        if($request->input('otros_profesionales') == NULL){

            $alumno_docente_pie->otros_profesionales = 'No registra otros profesionales';

        }else{
            $alumno_docente_pie->otros_profesionales = $request->input('otros_profesionales');
        }
        $alumno_docente_pie->estado = 'Activo';
        $alumno_docente_pie->id_equipo_pie = $request->input('id_equipo_pie');
        $alumno_docente_pie->id_alumno = $alumno->id;
        $alumno_docente_pie->save();
        

        return redirect('/modulo_pie/alumnos/index')->with('success','¡Alumno ingresado a PIE con éxito!');

    }

    public function cambiar_docente(Request $request, $id)
    {


        $alumno_pie = AlumnoPie::find($id);

        $alumno_pie->id_equipo_pie = $request->input('id_equipo_pie');
        $alumno_pie->update();
        

        return redirect('/modulo_pie/alumnos_pie/index')->with('success','¡Docente asociado a alumno con éxito!');

    }

        public function modificar_alumno_pie(Request $request, $id)
    {


        $alumno_pie = AlumnoPie::find($id);

        $alumno_pie->edad = $request->input('edad');
        $alumno_pie->id_nee = $request->input('nee');
        $alumno_pie->fecha_diagnostico = $request->input('fecha_diagnostico');
        $alumno_pie->fecha_reevaluacion = $request->input('fecha_reevaluacion');
        $alumno_pie->otros_profesionales = $request->input('otros_profesionales');
        $alumno_pie->update();
        

        return redirect('/modulo_pie/alumnos_pie/index')->with('warning','¡Alumno PIE actualizado con éxito!');

    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AlumnoPie  $alumnoPie
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        
    }
}
