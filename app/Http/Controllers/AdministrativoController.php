<?php

namespace App\Http\Controllers;
use App\Comments;
use App\Administrativo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;
use DB;


class AdministrativoController extends Controller
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
        $cargo   = $request->get('cargo');

        $administrativos = Administrativo::orderBy('apellido_paterno')
            ->where('estado','Activo')
            ->Primer($var3)
            ->Segundo($var3)
            ->Tercer($var3)
            ->Cuarto($var3)
            ->Correo($correo)
            ->Rut($rut)
            ->Cargo($cargo)
            ->paginate(10);

        $inactivos = Administrativo::orderBy('apellido_paterno')
            ->where('estado','Inactivo')
            ->Primer($var3)
            ->Segundo($var3)
            ->Tercer($var3)
            ->Cuarto($var3)
            ->Correo($correo)
            ->Rut($rut)
            ->Cargo($cargo)
            ->paginate(10);



        // $administrativos = Administrativo::onlyTrashed()->get();  // Funcion para mostrar los datos borrados // //


        return view('administrativos.index', compact('administrativos','inactivos')); 

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


        $administrativo = new Administrativo();
        $administrativo->rut= $request->input('rut');
        $administrativo->primer_nombre= $request->input('primer_nombre');
        $administrativo->segundo_nombre= $request->input('segundo_nombre');
        $administrativo->apellido_paterno= $request->input('apellido_paterno');
        $administrativo->apellido_materno= $request->input('apellido_materno');
        $administrativo->correo= $request->input('correo');
        $administrativo->cargo= $request->input('cargo');
        $administrativo->estado= 'Activo';
        $administrativo->save();


        return redirect('/administrativos')->with('success','¡Administrativo creado con éxito!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Administrativo  $administrativo
     * @return \Illuminate\Http\Response
     */
    public function show(Administrativo $administrativo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Administrativo  $administrativo
     * @return \Illuminate\Http\Response
     */
    public function edit(Administrativo $administrativo)
    {
        $administrativo=Administrativo::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Administrativo  $administrativo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Administrativo $administrativo)
    {

        $administrativo->primer_nombre= $request->input('primer_nombre');
        $administrativo->segundo_nombre= $request->input('segundo_nombre');
        $administrativo->apellido_paterno= $request->input('apellido_paterno');
        $administrativo->apellido_materno= $request->input('apellido_materno');
        $administrativo->rut= $request->input('rut');
        $administrativo->correo= $request->input('correo');
        $administrativo->cargo= $request->input('cargo');
        $administrativo->update();
        

        return redirect('/administrativos')->with('warning','¡Administrativo actualizado con éxito!');
    }


    public function estado($id)
    {
        $administrativo=Administrativo::findOrFail($id);

        if($administrativo->estado == 'Activo'){

            $administrativo->estado = 'Inactivo';
            $administrativo->update();

        }
        else{

            $administrativo->estado = 'Activo';
            $administrativo->update();
        }

        return redirect('/administrativos')->with('warning','¡Estado actualizado con éxito!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Administrativo  $administrativo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       


    }
}
