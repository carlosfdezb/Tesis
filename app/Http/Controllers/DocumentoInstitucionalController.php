<?php

namespace App\Http\Controllers;

use App\DocumentoInstitucional;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;   
use Session;
use DB;
use App\Comments;


class DocumentoInstitucionalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $scope_titulo   = $request->input('scope_titulo');
        $scope_tipo     = $request->input('scope_tipo');
        
        $documentos = DocumentoInstitucional::orderBy('titulo')
            ->Titulo($scope_titulo)
            ->Tipo($scope_tipo )
            ->paginate(10);

        return view('modulo_documentos_institucionales.index', compact('documentos'));
    
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
    public function store()
    {
       
        //

    }

    public function subir_archivo(Request $request)
    {

        if ($request->hasFile('documentos')) {
        $documentos = $request->file('documentos');
        $name = time().$documentos->getClientOriginalName();
        $name = str_replace(' ', '-', $name);
        $documentos->move(public_path().'/documentos/documentos_institucionales', $name); } // esta funcion permite guardar los documentos en el "public" y en la base de datos , el nombre que se le da al archivo parte con el "time()" para que no se repitan los nombres dentro de la base de datos , en el formulario del "create" hay que agregar el parametro "  'files' => 'true'  " para que el formulario sepa que tiene que aceptar archivos //


        $documento_institucional            = new DocumentoInstitucional();
        $documento_institucional->titulo    = $request->input('titulo_documento');
        $documento_institucional->tipo      = $request->input('tipo');
        $documento_institucional->archivo   = $name;

        if($request->input('descripcion') == NULL){
            $documento_institucional->descripcion = 'Sin descripción';
        }else{
            $documento_institucional->descripcion = $request->input('descripcion');
        }

        $documento_institucional->save();

        return back()->with('success','¡Documento Institucional ingresado con éxito!');


    }


    public function actualizar_archivo(Request $request, $id_archivo)
    {
            $documento_institucional = DocumentoInstitucional::find($id_archivo);

            if ($request->hasFile('documentos')){

            $documentos = $request->file('documentos');
            $name = time().$documentos->getClientOriginalName();
            $name = str_replace(' ', '-', $name);
            $documentos->move(public_path().'/documentos/documentos_institucionales', $name);

           $documento_institucional->archivo= $name;

            if($request->input('descripcion') == NULL){
                $documento_institucional->descripcion = 'Sin descripción';
            }else{
                $documento_institucional->descripcion = $request->input('descripcion');
            }

            $documento_institucional->titulo = $request->input('titulo_documento');
            $documento_institucional->tipo = $request->input('tipo');

           $documento_institucional->update();
           return back()->with('warning','¡Documento actualizado con éxito!');
        }else{

            if($request->input('descripcion') == NULL){
                $documento_institucional->descripcion = 'Sin descripción';
            }else{
                $documento_institucional->descripcion = $request->input('descripcion');
            }

            $documento_institucional->titulo = $request->input('titulo_documento');
            $documento_institucional->tipo = $request->input('tipo');

            $documento_institucional->update();

            return back()->with('warning','¡Información actualizada con éxito!');
        }
        
         
    }

    public function eliminar_archivo($id_archivo)
    {
        $documento_institucional = DocumentoInstitucional::find($id_archivo);
        $documento_institucional->delete();
        return back()->with('danger', '¡Documento Institucional eliminado con éxito!');

    }


    public function descargar_archivo($file)
    {

        $pathtoFile= public_path(). "/documentos/documentos_institucionales/$file";


        return response()->download($pathtoFile);

    }



    /**
     * Display the specified resource.
     *
     * @param  \App\documento_institucional  $documento_institucional
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\documento_institucional  $documento_institucional
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\documento_institucional  $documento_institucional
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\documento_institucional  $documento_institucional
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
    }
}
