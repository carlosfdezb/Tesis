<?php

namespace App\Http\Controllers;

use App\Planificacion;
use App\Profesor;
use App\Asignatura;
use App\Curso;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;   
use Session;
use DB;
use App\Comments;

class PlanificacionController extends Controller
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

        if(auth()->user()->rol == '3'){

            $ide = Profesor::all()->where('rut','=',auth()->user()->rut)->first();
       
            $planificaciones = Planificacion::orderBy('id')
                ->Where('id_profesor' ,'=',$ide->id)
                ->paginate(10);

                return view('planificaciones.index', compact('planificaciones','ide'));
        }else{


            $var2 = explode(' ',$request->get('scope_nombre_profesor'));
            $var3 = array_pad($var2, 4,null);

            $scope_correo   = $request->get('scope_correo');
            $scope_rut  = $request->get('scope_rut');
            
            $profesores = Profesor::orderBy('apellido_paterno')
                ->Primer($var3)
                ->Segundo($var3)
                ->Tercer($var3)
                ->Cuarto($var3)
                ->Rut($scope_rut)
                ->Correo($scope_correo)
                ->paginate(10);

                return view('planificaciones.index_administrador', compact('profesores'));
        }

    }


    public function vista_perfil_profesor_administrativo($id_profesor)
    {
        $ide = Profesor::all()->where('id','=',$id_profesor)->first();

        $planificaciones = Planificacion::orderBy('id')
            ->Where('id_profesor' ,'=',$id_profesor)
            ->paginate(10);

        return view('planificaciones.index', compact('planificaciones','ide'));

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

        if ($request->hasFile('documentos')) {
            $documentos = $request->file('documentos');
            $name = time().$documentos->getClientOriginalName();
            $name = str_replace(' ', '-', $name);
            $documentos->move(public_path().'/documentos/planificaciones', $name); } // esta funcion permite guardar los documentos en el "public" y en la base de datos , el nombre que se le da al archivo parte con el "time()" para que no se repitan los nombres dentro de la base de datos , en el formulario del "create" hay que agregar el parametro "  'files' => 'true'  " para que el formulario sepa que tiene que aceptar archivos //

        $ide = DB::table('profesors')->where('rut','=',auth()->user()->rut)->first();



        $nombre_completo_asignatura = explode(' ',$request->get('asignatura')); // nombre asignatura completa ej. 'ID de la asignatura' 4 medio B //

        $id_asignatura = Asignatura::where('id',$nombre_completo_asignatura[0])->first(); // se busca la ID de la asignatura para sacar el nombre debido a que algunos nombres de asignaturas contienen espacios //

        $planificacion = new Planificacion();

        $planificacion->asignatura= $id_asignatura->nombre; // nombre asignatura //
        $planificacion->nivel= $nombre_completo_asignatura[1]; // nivel asignatura //
        $planificacion->grado= $nombre_completo_asignatura[2]; // grado asignatura //
        $planificacion->letra= $nombre_completo_asignatura[3]; // letra asignatura //

        $planificacion->unidad= $request->input('unidad');
        $planificacion->fecha= $request->input('fecha');
        $planificacion->estado= 'Pendiente';
        $planificacion->id_profesor= $ide->id;
        $planificacion->archivo= $name;
        $planificacion->nombre_administrativo = 'Sin revisión';
        $planificacion->observaciones = 'Sin revisión';
        $planificacion->save();


        return redirect('/planificaciones')->with('success','¡Planificación ingresada con éxito!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Planificacion  $planificacion
     * @return \Illuminate\Http\Response
     */
    public function show(Planificacion $planificacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Planificacion  $planificacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Planificacion $planificacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Planificacion  $planificacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Planificacion $planificacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Planificacion  $planificacion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $eliminar_planificacion = Planificacion::find($id);
        $eliminar_planificacion->delete();
        return back()->with('danger', '¡Planificación eliminada con éxito!');

    }




    public function actualizar_archivo(Request $request, $id)
    {
            $planificacion=Planificacion::find($id);

            if ($request->hasFile('documentos')){

            $documentos = $request->file('documentos');
            $name = time().$documentos->getClientOriginalName();
            $name = str_replace(' ', '-', $name);
            $documentos->move(public_path().'/documentos/planificaciones', $name);

           $planificacion->archivo= $name;
           $planificacion->fecha= $request->input('fecha');
           $planificacion->unidad= $request->input('unidad');
           $planificacion->update();

           return redirect('/planificaciones')->with('warning','¡Archivo actualizado con éxito!');
        }else{

            $planificacion->fecha= $request->input('fecha');
            $planificacion->unidad= $request->input('unidad');
            $planificacion->update();

            return redirect('/planificaciones')->with('warning','¡Información actualizada con éxito!');

        }
        
         

    }


      public function estado(Request $request, $id)
    {
        $planificacion=Planificacion::find($id);
        
        if($request->input('estado') == 'Aprobado'){
            $planificacion->estado= $request->input('estado');

            if($request->input('observaciones') == NULL){
            $planificacion->observaciones= 'Sin observaciones';
            
            }else{
            $planificacion->observaciones= $request->input('observaciones');
                        
            }

            $planificacion->nombre_administrativo = auth()->user()->name;
            $planificacion->update();
            return back()->with('success','¡Revisión aprobada con éxito!');

        }elseif($request->input('estado') == 'Rechazado'){
            $planificacion->estado= $request->input('estado');

            if($request->input('observaciones') == NULL){
            $planificacion->observaciones= 'Sin observaciones';
            
            }else{
            $planificacion->observaciones= $request->input('observaciones');
            
            }

            $planificacion->nombre_administrativo = auth()->user()->name;
            $planificacion->update();
            return back()->with('success','¡Revisión rechazada con éxito!');

        }elseif($request->input('estado') == 'Pendiente'){
            $planificacion->estado= $request->input('estado');

            if($request->input('observaciones') == NULL){
            $planificacion->observaciones= 'Sin observaciones';
            
            }else{
            $planificacion->observaciones= $request->input('observaciones');
            
            }

            $planificacion->nombre_administrativo = auth()->user()->name;
            $planificacion->update();
            return back()->with('warning','¡Revisión pendiente ingresada con éxito!');

        }
    }

    public function descargar_archivo($file)
    {

        $pathtoFile= public_path(). "/documentos/planificaciones/$file";


        return response()->download($pathtoFile);



    }












}
