<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Noticia;
use App\User;
use App\Alumno;
use App\Administrativo;
use App\Especialista;
use App\Profesor;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;  

class NoticiasController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $principal = Noticia::orderBy('created_at','desc')->where('tipo','Principal')->get();
        $lateral = Noticia::orderBy('created_at','desc')->where('tipo','Lateral')->paginate(6);
        return view('inicio.index',compact('principal','lateral'));
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $filename = '';
        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move(public_path().'/noticias', $filename); 

            $noticia = new Noticia();
            $noticia->titulo = $request->input('titulo');
            $noticia->descripcion = $request->input('descripcion');
            $noticia->url = $request->input('url');
            $noticia->imagen = $filename;
            $noticia->tipo = $request->input('tipo');
            $noticia->save();
        }else{
            $noticia = new Noticia();
            $noticia->titulo = $request->input('titulo');
            $noticia->descripcion = $request->input('descripcion');
            $noticia->url = $request->input('url');
            $noticia->imagen = "sin-imagen.jpg";
            $noticia->tipo = $request->input('tipo');
            $noticia->save();
        }

        

        return redirect('/inicio')->with('success','Noticia creada correctamente');
    }

    public function delete($id)
    {
        $noticia = Noticia::find($id);
        $noticia->delete();

        return back()->with('success','Noticia eliminada con éxito');
    }

    
    public function editUserDatos(Request $request, $id)
    {
        $user = User::find($id);

        if($request->input('contraseña') == $request->input('contraseña_confirm') and $request->input('contraseña') != NULL){
                if(DB::table('alumnos')->where('rut',$user->rut)->count() > 0){
                    $alumno = Alumno::where('rut',$user->rut)->first();
                    $alumno->correo = $request->input('correo');
                    $alumno->update();

                    $user->email = $request->input('correo');
                    $user->password = bcrypt($request->input('contraseña'));
                    $user->update();

                    return back()->with('success','¡Datos modificados correctamente!');

                }elseif(DB::table('administrativos')->where('rut',$user->rut)->count() > 0){
                    $administrativos = Administrativo::where('rut',$user->rut)->first();
                    $administrativos->correo = $request->input('correo');
                    $administrativos->update();

                    $user->email = $request->input('correo');
                    $user->password = bcrypt($request->input('contraseña'));
                    $user->update();

                    return back()->with('success','¡Datos modificados correctamente!');

                }elseif (DB::table('especialistas')->where('rut',$user->rut)->count() > 0) {
                    $especialistas = Especialista::where('rut',$user->rut)->first();
                    $especialistas->correo = $request->input('correo');
                    $especialistas->update();

                    $user->email = $request->input('correo');
                    $user->password = bcrypt($request->input('contraseña'));
                    $user->update();

                    return back()->with('success','¡Datos modificados correctamente!');
                }elseif (DB::table('profesors')->where('rut',$user->rut)->count() > 0) {
                    $profesor = Profesor::where('rut',$user->rut)->first();
                    $profesor->correo = $request->input('correo');
                    $profesor->update();

                    $user->email = $request->input('correo');
                    $user->password = bcrypt($request->input('contraseña'));
                    $user->update();

                    return back()->with('success','¡Datos modificados correctamente!');
                }else{
                    $user->email = $request->input('correo');
                    $user->password = bcrypt($request->input('contraseña'));
                    $user->update();
                    return back()->with('success','¡Datos modificados correctamente!');
                }
        }else{
            if($request->input('contraseña') == $request->input('contraseña_confirm') and $request->input('contraseña') == NULL){
                if(DB::table('alumnos')->where('rut',$user->rut)->count() > 0){
                    $alumno = Alumno::where('rut',$user->rut)->first();
                    $alumno->correo = $request->input('correo');
                    $alumno->update();

                    $user->email = $request->input('correo');
                    $user->update();

                    return back()->with('success','¡Datos modificados correctamente!');

                }elseif(DB::table('administrativos')->where('rut',$user->rut)->count() > 0){
                    $administrativos = Administrativo::where('rut',$user->rut)->first();
                    $administrativos->correo = $request->input('correo');
                    $administrativos->update();

                    $user->email = $request->input('correo');
                    $user->update();
                    return back()->with('success','¡Datos modificados correctamente!');
                }elseif (DB::table('especialistas')->where('rut',$user->rut)->count() > 0) {
                    $especialistas = Especialista::where('rut',$user->rut)->first();
                    $especialistas->correo = $request->input('correo');
                    $especialistas->update();

                    $user->email = $request->input('correo');
                    $user->update();
                    return back()->with('success','¡Datos modificados correctamente!');
                }elseif (DB::table('profesors')->where('rut',$user->rut)->count() > 0) {
                    $profesors = Profesor::where('rut',$user->rut)->first();
                    $profesors->correo = $request->input('correo');
                    $profesors->update();

                    $user->email = $request->input('correo');
                    $user->update();
                    return back()->with('success','¡Datos modificados correctamente!');
                }else{
                    $user->email = $request->input('correo');
                    $user->update();
                    return back()->with('success','¡Datos modificados correctamente!');
                }
            }else{
                return back()->with('warning','¡Las contraseñas no coinciden!');
            }
            
        }

        

        
    }


    public function show(Noticia $noticia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AsignaturaPie  $asignaturaPie
     * @return \Illuminate\Http\Response
     */
    public function edit(Noticia $noticia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AsignaturaPie  $asignaturaPie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Noticia $noticia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AsignaturaPie  $asignaturaPie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Noticia $noticia)
    {
        //
    }

    public function Api(){
        $noticias = Noticia::orderBy('created_at','desc')->where('tipo','Principal')->get();
        return response()->json($noticias);
    }
}
