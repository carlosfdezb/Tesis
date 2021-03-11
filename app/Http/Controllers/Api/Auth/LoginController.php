<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{

    /**
     * Método para inicio de sesión de usuarios
     *
     * @param   Request $request
     * @return  response()
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'    => 'required|email|max:150',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => 500,
                'message' => 'Debes de ingresar tu usuario y/o contraseña',
            ], 500);
        }

        $user = User::where('email', '=', $request->input('email'))->first();

        if ($user) {
            if (Hash::check($request->input('password'), $user->password)) {
                return $user;
            }
        }

        return response()->json([
            'status'  => 500,
            'message' => 'Usuario/Contraseña incorrectos',
        ], 500);

    }


}