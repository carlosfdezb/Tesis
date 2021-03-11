<?php

namespace App\Http\Controllers;

use App\Comments;
use App\Especialista;
use App\EquipoPie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;
use DB;

class EspecialistaController extends Controller
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

        $var2 = explode(' ',$request->get('nombre'));
        $var3 = array_pad($var2, 4,null);
        $correo = $request->get('correo');
        $rut   = $request->get('rut');
        $especialidad   = $request->get('especialidad');


        $especialistas = Especialista::orderBy('apellido_paterno','asc')
            ->where('estado','Activo')
            ->Primer($var3)
            ->Segundo($var3)
            ->Tercer($var3)
            ->Cuarto($var3)
            ->Correo($correo)
            ->Rut($rut)
            ->Especialidad($especialidad)
            ->paginate(10);

        $inactivos = Especialista::orderBy('apellido_paterno','asc')
            ->where('estado','Inactivo')
            ->Primer($var3)
            ->Segundo($var3)
            ->Tercer($var3)
            ->Cuarto($var3)
            ->Correo($correo)
            ->Rut($rut)
            ->Especialidad($especialidad)
            ->paginate(10);

        
       return view('especialistas.index', compact('especialistas','inactivos'));
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
        $especialista = new Especialista();
        $especialista->rut= $request->input('rut');
        $especialista->primer_nombre= $request->input('primer_nombre');
        $especialista->segundo_nombre= $request->input('segundo_nombre');
        $especialista->apellido_paterno= $request->input('apellido_paterno');
        $especialista->apellido_materno= $request->input('apellido_materno');
        $especialista->correo= $request->input('correo');
        $especialista->especialidad= $request->input('especialidad');
        $especialista->estado= 'Activo';

        if (trim($request->input('numero_secreduc')) == "") {
            
            $especialista->numero_secreduc = 'No registra';

        }else{

            $especialista->numero_secreduc= $request->input('numero_secreduc');

        };

        $especialista->save();


        return redirect('/especialistas')->with('success','¡Especialista creado con éxito!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Especialista  $especialista
     * @return \Illuminate\Http\Response
     */
    public function show(Especialista $especialista)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Especialista  $especialista
     * @return \Illuminate\Http\Response
     */
    public function edit(Especialista $especialista)
    {
        $especialista=Especialista::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Especialista  $especialista
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Especialista $especialista)
    {
       
        $especialista->rut= $request->input('rut');
        $especialista->primer_nombre= $request->input('primer_nombre');
        $especialista->segundo_nombre= $request->input('segundo_nombre');
        $especialista->apellido_paterno= $request->input('apellido_paterno');
        $especialista->apellido_materno= $request->input('apellido_materno');
        $especialista->correo= $request->input('correo');
        $especialista->especialidad= $request->input('especialidad');

        if (trim($request->input('numero_secreduc')) == "") {
            
            $especialista->numero_secreduc = 'No registra';

        }else{

            $especialista->numero_secreduc= $request->input('numero_secreduc');

        };

        $especialista->update();


        return redirect('/especialistas')->with('warning','¡Especialista actualizado con éxito!');
    }




    public function agregar_quitar_pie($id)
    {


        $especialista=Especialista::findOrFail($id);

        if(DB::table('equipo_pies')->where('id_especialista',$especialista->id)->where('estado','Activo')->count() > 0){
            if($especialista->equipo_pie->alumno_pie->where('estado','Activo')->first()){

                return redirect('/especialistas')->with('warning','¡No se puede modificar a un especialista con alumnos activos asignados!');

            }else{

                $var=(DB::table('equipo_pies')->where('id_especialista',$especialista->id)->first());


                $quitar=EquipoPie::find($var->id);
                $quitar->estado = 'Inactivo';
                $quitar->update();

                return redirect('/especialistas')->with('warning','¡Especialista deshabilitado de PIE con éxito!');
            }

        }else{

            if(DB::table('equipo_pies')->where('id_especialista', $especialista->id)->where('estado','Inactivo')->count() > 0){

                $var=(DB::table('equipo_pies')->where('id_especialista',$especialista->id)->first());


                $quitar=EquipoPie::find($var->id);
                $quitar->estado = 'Activo';
                $quitar->update();

                return redirect('/especialistas')->with('success','¡Especialista agregado a PIE con éxito!');

            }else{

                $asignar = new EquipoPie();
                $asignar->id_especialista = $especialista->id;
                $asignar->estado = 'Activo';
                $asignar->save();

                return back()->with('success','¡Especialista agregado a PIE con éxito!');

            }
        }
       
    }

    public function estado($id)
    {
        $especialista=Especialista::findOrFail($id);

        if(DB::table('equipo_pies')->where('id_especialista',$especialista->id)->where('estado','Activo')->count() > 0){
            if($especialista->equipo_pie->alumno_pie->where('estado','Activo')->first()){

                return redirect('/especialistas')->with('warning','¡No se puede modificar a un especialista con alumnos activos asignados!');

                // Función -> Si especialista se encuentra ACTIVO en TABLA EQUIPO_PIES y tiene alumnos pies ACTIVOS asignados , envia mensaje de advertencia //

            }else{

                if(DB::table('equipo_pies')->where('id_especialista',$especialista->id)->where('estado','Activo')->count() > 0)

                $var=(DB::table('especialistas')->where('id',$especialista->id)->first());
                $var2=(DB::table('equipo_pies')->where('id_especialista',$especialista->id)->first());

                $quitar_especialista_pie=EquipoPie::find($var2->id);
                $quitar_especialista_pie->estado = 'Inactivo';
                

                $quitar_especialista=Especialista::find($var->id);
                $quitar_especialista->estado = 'Inactivo';


                $quitar_especialista->update();
                $quitar_especialista_pie->update();

                
                return redirect('/especialistas')->with('warning','¡Especialista deshabilitado con éxito!');

                // Función -> Si especialista se encuentra ACTIVO en TABLA EQUIPO_PIES y NO tiene alumnos pies asignados , pone INACTIVO en TABLA EQUIPO_PIES y TABLA ESPECIALISTAS , se cambian estado a INACTIVO en ambas tablas //
            }

        }else{

            if(DB::table('especialistas')->where('id',$especialista->id)->where('estado','Inactivo')->count() > 0){

                $var=(DB::table('especialistas')->where('id',$especialista->id)->first());
                $quitar=Especialista::find($var->id);
                $quitar->estado = 'Activo';
                $quitar->update();

                return redirect('/especialistas')->with('success','¡Especialista habilitado con éxito!');

                // Función -> Si especialista se encuentra INACTIVO en TABLA ESPECIALISTAS, cambia estado a ACTIVO //

            }else{

                if(DB::table('especialistas')->where('id',$especialista->id)->where('estado','Activo')->count() > 0){

                $var=(DB::table('especialistas')->where('id',$especialista->id)->first());
                $quitar=Especialista::find($var->id);
                $quitar->estado = 'Inactivo';
                $quitar->update();

                return redirect('/especialistas')->with('warning','¡Especialista deshabilitado con éxito!');

                // Función -> Si especialista se encuentra ACTIVO en TABLA ESPECIALISTAS, cambia estado a INACTIVO //


                }

            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Especialista  $especialista
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        
    }
}
