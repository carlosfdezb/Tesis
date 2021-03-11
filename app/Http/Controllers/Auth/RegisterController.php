<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use App\Alumno;
use App\Profesor;
use App\Administrativo;
use App\Especialista;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'rut' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        if(Alumno::where('rut',$data['rut'])->count() > 0 ){
            $alumno = Alumno::where('rut',$data['rut'])->first();
            $editcorreo = Alumno::find($alumno->id);
            $editcorreo->correo = $data['email'];
            $editcorreo->update();
           return User::create([
            'name' => $alumno->primer_nombre.' '.$alumno->segundo_nombre.' '.$alumno->apellido_paterno.' '.$alumno->apellido_materno,
            'rol' => '4',
            'rut' => $data['rut'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            ]); 
        }else{
            if(Profesor::where('rut',$data['rut'])->count() > 0 ){
                $profesor = Profesor::where('rut',$data['rut'])->first();
                $editcorreo = Profesor::find($profesor->id);
                $editcorreo->correo = $data['email'];
                $editcorreo->update();
               return User::create([
                'name' => $profesor->primer_nombre.' '.$profesor->segundo_nombre.' '.$profesor->apellido_paterno.' '.$profesor->apellido_materno,
                'rol' => '3',
                'rut' => $data['rut'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                ]); 
            }else{
                if(Administrativo::where('rut',$data['rut'])->count() > 0 ){
                   if(Administrativo::where('rut',$data['rut'])->where('cargo','Jefe UTP')->count() > 0 ){
                        $utp = Administrativo::where('rut',$data['rut'])->first();
                        $editcorreo = Administrativo::find($utp->id);
                        $editcorreo->correo = $data['email'];
                        $editcorreo->update();
                         return User::create([
                        'name' => $utp->primer_nombre.' '.$utp->segundo_nombre.' '.$utp->apellido_paterno.' '.$utp->apellido_materno,
                        'rol' => '5',
                        'rut' => $data['rut'],
                        'email' => $data['email'],
                        'password' => Hash::make($data['password']),
                    ]); 
                    }else{
                        $administrativo = Administrativo::where('rut',$data['rut'])->first();
                        $editcorreo = Administrativo::find($administrativo->id);
                        $editcorreo->correo = $data['email'];
                        $editcorreo->update();
                        return User::create([
                        'name' => $administrativo->primer_nombre.' '.$administrativo->segundo_nombre.' '.$administrativo->apellido_paterno.' '.$administrativo->apellido_materno,
                        'rol' => '2',
                        'rut' => $data['rut'],
                        'email' => $data['email'],
                        'password' => Hash::make($data['password']),
                        ]); 
                    }
                }else{
                    if(Especialista::where('rut',$data['rut'])->count() > 0 ){
                        $especialista = Especialista::where('rut',$data['rut'])->first();
                        $editcorreo = Especialista::find($especialista->id);
                        $editcorreo->correo = $data['email'];
                        $editcorreo->update();
                       return User::create([
                        'name' => $especialista->primer_nombre.' '.$especialista->segundo_nombre.' '.$especialista->apellido_paterno.' '.$especialista->apellido_materno,
                        'rol' => '6',
                        'rut' => $data['rut'],
                        'email' => $data['email'],
                        'password' => Hash::make($data['password']),
                        ]); 
                    }
                }
            }
        }

  
    }
}
