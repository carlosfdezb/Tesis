<?php

namespace App\Http\Controllers;

use DB;
use App\Calendario;
use App\Alumno;
use App\Profesor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CalendarioController extends Controller
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
        $alumno = Alumno::all()->where('rut',auth()->user()->rut)->first();
        return view('calendario.index2', compact('alumno'));
    }

    public function indexProfesor()
    {
        $profesor = Profesor::all()->where('rut',auth()->user()->rut)->first();
        return view('calendario.indexProfesor', compact('profesor'));
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
        if($request->input('descripcion') == 'Reunión de apoderados'){
            $profesor = DB::table('profesors')->where('rut',auth()->user()->rut)->first();
            $calendario = new Calendario();
            $calendario->descripcion = $request->input('descripcion');
            $calendario->fecha= $request->input('fecha');
            $calendario->id_curso= $request->input('id_curso');
            $calendario->id_asignatura= 10;
            $calendario->id_profesor= $profesor->id;
            $calendario->save();
            return back()->with('success','¡Reunión de apoderados agendada correctamente!');

        }else{
            if($request->input('fecha') >= date('Y-m-d') and date('l',strtotime($request->input('fecha'))) != 'Sunday' and date('l',strtotime($request->input('fecha'))) != 'Saturday'){
                if(Calendario::all()->where('fecha',$request->input('fecha'))->count()<2){
                $profesor = DB::table('profesors')->where('rut',auth()->user()->rut)->first();
                $calendario = new Calendario();
                $calendario->descripcion = $request->input('descripcion');
                $calendario->fecha= $request->input('fecha');
                $calendario->id_curso= $request->input('id_curso');
                $calendario->id_asignatura= $request->input('id_asignatura');
                $calendario->id_profesor= $profesor->id;
                $calendario->save();
                return back()->with('success','¡Evaluación agendada correctamente!');
                }else{
                    return back()->with('danger','¡Solo se pueden realizar 2 evaluaciones por día!');                
                }
            }else{
                if(date('l',strtotime($request->input('fecha'))) == 'Sunday' or date('l',strtotime($request->input('fecha'))) == 'Saturday'){
                        return back()->with('danger','¡No se pueden agendar evaluaciones los días sábados y domingos!');
                    }else{
                        return back()->with('danger','¡No se pueden agendar evaluaciones para días pasados!'); 
                    }  
            }
        } 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Calendario  $calendario
     * @return \Illuminate\Http\Response
     */
    public function show(Calendario $calendario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Calendario  $calendario
     * @return \Illuminate\Http\Response
     */
    public function edit(Calendario $calendario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Calendario  $calendario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Calendario $calendario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Calendario  $calendario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Calendario $calendario)
    {
        //
    }

    public function delete(Request $request, Calendario $calendario)
    {
        $evaluacion = Calendario::find($request->input('id'));
        $evaluacion->delete();
        return back()->with('warning','¡Evaluación eliminada!');

    }

}
