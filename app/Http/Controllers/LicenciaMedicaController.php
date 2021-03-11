<?php

namespace App\Http\Controllers;

use App\LicenciaMedica;
use App\Alumno;
use App\Curso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;   
use Session;
use DB;
use App\Comments;

class LicenciaMedicaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth'); 
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_administrador(Request $request)
    {
        $var2 = explode(' ',$request->get('scope_nombre'));
        $var3 = array_pad($var2, 4,null);
        $scope_rut   = $request->get('scope_rut');
        $scope_curso   = $request->get('scope_curso');

        
        $alumnos = Alumno::orderBy('apellido_paterno')
            ->where('estado','Activo')
            ->Primer($var3)
            ->Segundo($var3)
            ->Tercer($var3)
            ->Cuarto($var3)
            ->Curso($scope_curso)
            ->Rut($scope_rut)
            ->paginate(10);
        $cursos = Curso::all();

        return view('licencias_medicas.index_administrador', compact('alumnos','cursos'));
    }

    public function index_licencias_administrador($id_alumno)
    {
        
        $alumno = Alumno::all()->where('id',$id_alumno)->first();

        $licencias = LicenciaMedica::orderBy('id')
            ->where('id_alumno',$id_alumno)
            ->paginate(10);

        return view('licencias_medicas.index_licencias',compact('licencias','alumno'));

    }

    public function index_licencias_alumno()
    {
        
        $alumno = Alumno::all()->where('rut','=',auth()->user()->rut)->first();

        $licencias = LicenciaMedica::orderBy('id')
            ->where('id_alumno',$alumno->id)
            ->paginate(10);

        return view('licencias_medicas.index_licencias',compact('licencias','alumno'));

    }


    public function subir_archivo_licencia(Request $request)
        {

            
            if ($request->hasFile('documentos')) {
            $documentos = $request->file('documentos');
            $name = time().$documentos->getClientOriginalName();
            $name = str_replace(' ', '-', $name);
            $documentos->move(public_path().'/documentos/licencias_medicas/alumnos', $name); } // esta funcion permite guardar los documentos en el "public" y en la base de datos , el nombre que se le da al archivo parte con el "time()" para que no se repitan los nombres dentro de la base de datos , en el formulario del "create" hay que agregar el parametro "  'files' => 'true'  " para que el formulario sepa que tiene que aceptar archivos //

            $ide = DB::table('alumnos')->where('rut','=',auth()->user()->rut)->first();

            $licencia_medica = new LicenciaMedica();
            $licencia_medica->fecha_licencia= $request->input('fecha_licencia');
            $licencia_medica->estado= 'Pendiente';
            $licencia_medica->id_alumno= $ide->id;
            $licencia_medica->id_curso= $request->input('id_curso');
            $licencia_medica->nombre_administrativo = 'Sin revisión';
            $licencia_medica->observacion = 'Sin revisión';
            $licencia_medica->archivo= $name;

            if($request->input('descripcion') == NULL){
                $licencia_medica->descripcion = 'Sin descripción';
            }else{
                $licencia_medica->descripcion = $request->input('descripcion');
            }

            $licencia_medica->save();

            return back()->with('success','¡Licencia ingresada con éxito!');

        }


    public function descargar_archivo_licencia($file)
    {

        $pathtoFile= public_path(). "/documentos/licencias_medicas/alumnos/$file";


        return response()->download($pathtoFile);



    }



    public function actualizar_archivo_licencia(Request $request, $id_archivo)
    {
            $licencia_medica = LicenciaMedica::find($id_archivo);

            if ($request->hasFile('documentos')){

            $documentos = $request->file('documentos');
            $name = time().$documentos->getClientOriginalName();
            $name = str_replace(' ', '-', $name);
            $documentos->move(public_path().'/documentos/licencias_medicas/alumnos', $name);

           $licencia_medica->archivo= $name;
            if($request->input('descripcion') == NULL){
                $licencia_medica->descripcion = 'Sin descripción';
            }else{
                $licencia_medica->descripcion = $request->input('descripcion');
            }
           $licencia_medica->update();
           return back()->with('warning','¡Archivo actualizado con éxito!');
        }else{

            if($request->input('descripcion') == NULL){
                $licencia_medica->descripcion = 'Sin descripción';
            }else{
                $licencia_medica->descripcion = $request->input('descripcion');
            }

            $licencia_medica->update();

            return back()->with('warning','¡Información actualizada con éxito!');
        }
        
         
    }

    public function eliminar_archivo_licencia($id_archivo)
    {
        $eliminar_licencia_medica = LicenciaMedica::find($id_archivo);
        $eliminar_licencia_medica->delete();
        return back()->with('danger', '¡Licencia Médica eliminada con éxito!');

    }



    public function estado_licencias_administrador(Request $request,$id)
    {
        $licencia_medica=LicenciaMedica::find($id);
        
        if($request->input('estado') == 'Aprobado'){
            $licencia_medica->estado= $request->input('estado');

            if($request->input('observacion') == NULL){
            $licencia_medica->observacion= 'Sin observación';
            
            }else{
            $licencia_medica->observacion= $request->input('observacion');
                        
            }

            $licencia_medica->nombre_administrativo = auth()->user()->name;
            $licencia_medica->update();
            return back()->with('success','¡Licencia aprobada con éxito!');

        }elseif($request->input('estado') == 'Rechazado'){
            $licencia_medica->estado= $request->input('estado');

            if($request->input('observacion') == NULL){
            $licencia_medica->observacion= 'Sin observación';
            
            }else{
            $licencia_medica->observacion= $request->input('observacion');
            
            }

            $licencia_medica->nombre_administrativo = auth()->user()->name;
            $licencia_medica->update();
            return back()->with('success','¡Licencia rechazada con éxito!');

        }elseif($request->input('estado') == 'Pendiente'){
            $licencia_medica->estado= $request->input('estado');

            if($request->input('observacion') == NULL){
            $licencia_medica->observacion= 'Sin observación';
            
            }else{
            $licencia_medica->observacion= $request->input('observacion');
            
            }

            $licencia_medica->nombre_administrativo = auth()->user()->name;
            $licencia_medica->update();

            return back()->with('warning','¡Licencia pendiente ingresada con éxito!');

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
     * @param  \App\licencia_medica  $licencia_medica
     * @return \Illuminate\Http\Response
     */
    public function show(licencia_medica $licencia_medica)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\licencia_medica  $licencia_medica
     * @return \Illuminate\Http\Response
     */
    public function edit(licencia_medica $licencia_medica)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\licencia_medica  $licencia_medica
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, licencia_medica $licencia_medica)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\licencia_medica  $licencia_medica
     * @return \Illuminate\Http\Response
     */
    public function destroy(licencia_medica $licencia_medica)
    {
        //
    }
}
