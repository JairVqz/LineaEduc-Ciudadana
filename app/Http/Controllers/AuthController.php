<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request){
        return redirect("/");
    }

    public function authentication(Request $request)
    {
        $request->validate([
            'Usuario'   => 'required|string',
        ]);

        $user = User::where('email', $request->Usuario)
        ->first();

        if ($user) {
            Auth::login($user); // Esto inicia la sesión del usuario y lo establece en el sistema de autenticación

            return response()->json(['message' => 'Usuario autenticado con éxito',
                                            'status' => 'Autorizado']);
        } else {
            return response()->json(['message' => 'El usuario no tiene permitido el acceso al sistema',
                                            'status' => 'No autorizado']);
        }

    }

    public function logout(Request $request){
        Auth::logout();
        return redirect('/');
    }

}
