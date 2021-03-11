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
use Illuminate\Http\Response;

class CarpetaPieController extends Controller
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

    public function index(Request $request, $id)
    {
        $alumno_pie = AlumnoPie::where('id', $id)->first();
        $prueba = AlumnoPie::find($id);
        $carpeta_pie_actual = CarpetaPie::where('id_alumno_pie',$alumno_pie->id)->where('fecha','>=',date("Y-m-d", mktime(0, 0, 0, 1, 1, date('Y'))))->get();
        $carpeta_pie_historial = CarpetaPie::where('id_alumno_pie',$alumno_pie->id)->get();
        $cursos = Curso::all();
        $profesor_pies = EquipoPie::all();
        $titulo_documentos = DocumentoPie::all();

        return view('modulo_pie.carpeta_alumnos_pie', compact('alumno_pie','cursos','profesor_pies','titulo_documentos','carpeta_pie_actual','prueba','carpeta_pie_historial'));
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
        $id_especialista_pie = Especialista::where('rut', $request->input('id_equipo_pie'))->first();
        $id_especialista_en_pie = EquipoPie::where('id_especialista',$id_especialista_pie->id)->first(); 


        if ($request->hasFile('documentos')) {
            $documentos = $request->file('documentos');
            $name = time().$documentos->getClientOriginalName();
            $name = str_replace(' ', '-', $name);
            $documentos->move(public_path().'/documentos/modulo_pie/carpeta_pie', $name); }// esta funcion permite guardar los documentos en el "public" y en la base de datos , el nombre que se le da al archivo parte con el "time()" para que no se repitan los nombres dentro de la base de datos , en el formulario del "create" hay que agregar el parametro "  'files' => 'true'  " para que el formulario sepa que tiene que aceptar archivos //

        $carpeta_pie = new CarpetaPie();
        $carpeta_pie->id_documento_pie = $request->input('tipo_documento');
        $carpeta_pie->id_equipo_pie = $id_especialista_en_pie->id;
        $carpeta_pie->id_nee = $request->input('id_nee_pie');
        $carpeta_pie->fecha = date("Y-m-d");
        $carpeta_pie->id_alumno_pie = $request->input('id_alumno_pie');
        $carpeta_pie->archivo= $name;
     
        $carpeta_pie->save();


        //return redirect('/modulo_pie/alumnos_pie/'.$request->input('id_alumno_pie').'/carpeta')->with('success','¡Documento ingresado con éxito!');//

        return back()->with('success','¡Documento ingresado con éxito!');

    }

   
    public function descargar_archivo($id,$file)
    {  

        $file= public_path(). "/documentos/modulo_pie/carpeta_pie/$file";

        return response()->download($file);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\CarpetaPie  $carpetaPie
     * @return \Illuminate\Http\Response
     */
    public function show(CarpetaPie $carpetaPie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CarpetaPie  $carpetaPie
     * @return \Illuminate\Http\Response
     */
    public function edit(CarpetaPie $carpetaPie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CarpetaPie  $carpetaPie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CarpetaPie $carpetaPie)
    {
        //
    }


    public function actualizar_archivo(Request $request, $id, $id_archivo)
    {

        $carpeta_pie=CarpetaPie::where('id',$id_archivo)->first();


             if ($request->hasFile('documentos')){

                $documentos = $request->file('documentos');
                $name = time().$documentos->getClientOriginalName();
                $name = str_replace(' ', '-', $name);
                $documentos->move(public_path().'/documentos/modulo_pie/carpeta_pie/', $name);


                $carpeta_pie->archivo= $name;
                $carpeta_pie->update();
            }
            

        return back()->with('warning','¡Documento actualizado con éxito!');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CarpetaPie  $carpetaPie
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,$id_archivo)
    {
        $eliminar_archivo = CarpetaPie::find($id_archivo);
        $eliminar_archivo->delete();
        return back()->with('danger', '¡Documento eliminado con éxito!');
    }
}
