<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Dotenv\Exception\ValidationException;
use AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{


    public function login(Request $request)
    {
        // Validar los datos ingresados
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Intentar autenticar al usuario
        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            // Guardar usuario en la sesión
            Auth::login($user, $request->remember);

            // Redirigir a la página inicial
            return redirect()->route('home');
        }

        // Si las credenciales son incorrectas, retornar error
        return redirect()->back()->with('error', 'Credenciales incorrectas.');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
    
}
