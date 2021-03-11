<?php

namespace App\Http\Controllers;

use App\Comments;
use App\MaterialProfesor;
use App\Profesor;
use App\Alumno;
use App\TituloUnidad;
use App\Curso;
use App\Asignatura;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;
use DB;


class MaterialProfesorController extends Controller
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


    // FUNCIONES DE ADMINISTRADOR DENTRO DE MODULO MATERIALES //

        public function index_administrador(Request $request)
        {

            $var2 = explode(' ',$request->get('scope_nombre'));
            $var3 = array_pad($var2, 4,null);
            $scope_correo = $request->get('scope_correo');
            $scope_rut   = $request->get('scope_rut');
            

            $profesores = Profesor::orderBy('apellido_paterno')
                ->where('estado','Activo')
                ->Primer($var3)
                ->Segundo($var3)
                ->Tercer($var3)
                ->Cuarto($var3)
                ->Correo($scope_correo)
                ->Rut($scope_rut)
                ->paginate(10);



            return view('modulo_materiales.index_administrador',compact('profesores'));
        }

        public function index_administrador_perfil_profesor($id)
        {

            $profesor = Profesor::where('id',$id)->first();


            return view('modulo_materiales.index_profesor',compact('profesor'));
        }


        public function vista_curso_administrador($id,$id_curso,$id_asignatura)
        {

            $profesor = Profesor::where('id',$id)->first();
            $curso = Curso::where('id',$id_curso)->first();
            $asignatura = Asignatura::where('id',$id_asignatura)->first();

            $documentos = MaterialProfesor::where('id_profesor',$profesor->id)->get();
            $titulos = TituloUnidad::where('id_curso',$id_curso)->where('id_asignatura',$id_asignatura)->where('id_profesor',$profesor->id)->get();


            return view('modulo_materiales.vista_curso_profesor',compact('profesor','curso','asignatura','documentos','titulos'));
        }

    // ------------------------------------------------ //

    // FUNCIONES DE PROFESOR DENTRO DE MODULO MATERIALES //
        
        public function index_profesor()
        {

            $ide = Profesor::all()->where('rut','=',auth()->user()->rut)->first(); // obtengo el rut del usuario logeado // 

            $profesor = Profesor::where('id' ,'=',$ide->id)->first();

            


            return view('modulo_materiales.index_profesor',compact('profesor','ide'));
        }

        public function vista_curso_profesor($id_curso,$id_asignatura)
        {

            $ide = Profesor::all()->where('rut','=',auth()->user()->rut)->first(); // obtengo el rut del usuario logeado //
            $profesor = Profesor::where('id' ,'=',$ide->id)->first();

            $curso = Curso::where('id',$id_curso)->first();
            $documentos = MaterialProfesor::where('id_profesor',$profesor->id)->get();
            $asignatura = Asignatura::where('id',$id_asignatura)->first();
            $profesor = Profesor::all()->where('rut','=',auth()->user()->rut)->first();

            $titulos = TituloUnidad::where('id_curso',$id_curso)->where('id_asignatura',$id_asignatura)->where('id_profesor',$profesor->id)->get();


            return view('modulo_materiales.vista_curso_profesor',compact('curso','profesor','asignatura','titulos','documentos'));
        }

        public function agregar_unidad(Request $request)
        {
            $numero = DB::table('titulo_unidads')->where('id_profesor','=',$request->input('id_profesor'))->where('id_asignatura','=',$request->input('id_asignatura'))->where('id_curso','=',$request->input('id_curso'))->count();

            $nueva_unidad = new TituloUnidad();
            $nueva_unidad->titulo_unidad = $request->input('titulo_unidad');
            $nueva_unidad->id_profesor = $request->input('id_profesor');
            $nueva_unidad->id_curso = $request->input('id_curso');
            $nueva_unidad->id_asignatura = $request->input('id_asignatura');
            $nueva_unidad->numero_unidad = $numero+1;
            $nueva_unidad->save();

            return back()->with('success','¡Unidad creada con éxito!');
        }

        public function descargar_archivo($id_curso,$id_asignatura,$file)
        {  

            $file= public_path(). "/documentos/modulo_materiales/materiales_profesores/$file";

            return response()->download($file);
        }



        public function subir_archivo(Request $request)
        {
             

            if ($request->hasFile('documentos')) {
                $documentos = $request->file('documentos');
                $name = time().$documentos->getClientOriginalName();
                $name = str_replace(' ', '-', $name);
                $documentos->move(public_path().'/documentos/modulo_materiales/materiales_profesores/', $name); }// esta funcion permite guardar los documentos en el "public" y en la base de datos , el nombre que se le da al archivo parte con el "time()" para que no se repitan los nombres dentro de la base de datos , en el formulario del "create" hay que agregar el parametro "  'files' => 'true'  " para que el formulario sepa que tiene que aceptar archivos //

            $material_profesor = new MaterialProfesor();
            $material_profesor->titulo = $request->input('titulo_documento');
            $material_profesor->id_titulo_unidad = $request->input('id_unidad');
            $material_profesor->id_profesor = $request->input('id_profesor');
            $material_profesor->id_curso = $request->input('id_curso');
            $material_profesor->id_asignatura = $request->input('id_asignatura');
            $material_profesor->archivo= $name;

            if($request->input('descripcion') == NULL){

                $material_profesor->descripcion = 'Sin descripción';

            }else{
                $material_profesor->descripcion = $request->input('descripcion');
            };

            $material_profesor->save();


            return back()->with('success','¡Documento ingresado con éxito!');

        }

        public function actualizar_archivo(Request $request, $id_curso,$id_asignatura, $id_archivo)
        {
            $ide = Profesor::all()->where('rut','=',auth()->user()->rut)->first();

            $material_profesor = MaterialProfesor::where('id',$id_archivo)->where('id_asignatura',$id_asignatura)->where('id_curso',$id_curso)->where('id_profesor',$ide->id)->first();


                if ($request->hasFile('documentos')){

                    $documentos = $request->file('documentos');
                    $name = time().$documentos->getClientOriginalName();
                    $name = str_replace(' ', '-', $name);
                    $documentos->move(public_path().'/documentos/modulo_materiales/materiales_profesores/', $name);
                


                    $material_profesor->titulo = $request->input('titulo_documento');
                    $material_profesor->archivo= $name;
                    

                        if($request->input('descripcion') == NULL){

                            $material_profesor->descripcion = 'Sin descripción';

                        }else{
                        $material_profesor->descripcion = $request->input('descripcion');
                        };

                    $material_profesor->update();

                    return back()->with('warning','¡Documento actualizado con éxito!');

                }else{


                    if($request->input('descripcion') == NULL){

                        $material_profesor->descripcion = 'Sin descripción';

                    }else{
                        $material_profesor->descripcion = $request->input('descripcion');
                    };

                    $material_profesor->titulo = $request->input('titulo_documento');

                    $material_profesor->update();

                    return back()->with('warning','¡Información actualizada con éxito!');

                }

        }

        public function eliminar_archivo($id_curso,$id_asignatura,$id_archivo)
        {
            $ide = Profesor::all()->where('rut','=',auth()->user()->rut)->first();

            $material_profesor = MaterialProfesor::where('id',$id_archivo)->where('id_asignatura',$id_asignatura)->where('id_curso',$id_curso)->where('id_profesor',$ide->id)->first();

            $eliminar_archivo = MaterialProfesor::find($material_profesor)->first();
            $eliminar_archivo->delete();

            return back()->with('danger', '¡Documento eliminado con éxito!');
        }



        public function actualizar_nombre_unidad(Request $request, $id_curso,$id_asignatura,$id_titulo)
        {
            $ide = Profesor::all()->where('rut','=',auth()->user()->rut)->first();

            $titulo_unidad = TituloUnidad::where('id',$id_titulo)->where('id_asignatura',$id_asignatura)->where('id_curso',$id_curso)->where('id_profesor',$ide->id)->first();


            $titulo_unidad->titulo_unidad = $request->input('titulo_unidad');
            $titulo_unidad->update();

            return back()->with('warning','¡Título actualizado con éxito!');

        }


        public function eliminar_nombre_unidad(Request $request, $id_curso,$id_asignatura,$id_titulo)
        {
            $ide = Profesor::all()->where('rut','=',auth()->user()->rut)->first();

            $titulo_unidad = TituloUnidad::where('id',$id_titulo)->where('id_asignatura',$id_asignatura)->where('id_curso',$id_curso)->where('id_profesor',$ide->id)->first();


            $titulo_unidad = TituloUnidad::find($titulo_unidad)->first();
            $titulo_unidad->delete();

            return back()->with('danger','¡Título eliminado con éxito!');

        }


    // ------------------------------------------------ //

    // FUNCIONES DE ALUMNO DENTRO DE MODULO MATERIALES //
        
        public function index_alumno()
        {

            $ide = Alumno::all()->where('rut','=',auth()->user()->rut)->first(); // obtengo el rut del usuario logeado // 

            $alumno = Alumno::where('id' ,'=',$ide->id)->first();




            return view('modulo_materiales.index_alumno',compact('alumno'));

            
            
        }

        public function vista_curso_alumno($id_profesor,$id_curso,$id_asignatura)
        {

            $profesor = Profesor::where('id' ,'=',$id_profesor)->first();
            $curso = Curso::where('id',$id_curso)->first();
            $documentos = MaterialProfesor::where('id_profesor',$profesor->id)->get();
            $asignatura = Asignatura::where('id',$id_asignatura)->first();
            

            $titulos = TituloUnidad::where('id_curso',$id_curso)->where('id_asignatura',$id_asignatura)->where('id_profesor',$profesor->id)->get();


            return view('modulo_materiales.vista_curso_profesor',compact('curso','profesor','asignatura','titulos','documentos'));
        }

    // --------------------------------------------- //



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
     * @param  \App\MaterialProfesor  $materialProfesor
     * @return \Illuminate\Http\Response
     */
    public function show(MaterialProfesor $materialProfesor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MaterialProfesor  $materialProfesor
     * @return \Illuminate\Http\Response
     */
    public function edit(MaterialProfesor $materialProfesor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MaterialProfesor  $materialProfesor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MaterialProfesor $materialProfesor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MaterialProfesor  $materialProfesor
     * @return \Illuminate\Http\Response
     */
    public function destroy(MaterialProfesor $materialProfesor)
    {
        //
    }
}
