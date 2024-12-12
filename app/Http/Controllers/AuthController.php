<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Dotenv\Exception\ValidationException;
use AuthenticatesUsers;

class AuthController extends Controller
{


    public function showLoginForm()
    {
        return view('login');
    }

    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return to_route('login')->with('status', 'Sesion expirada');
    }

    public function store(Request $request)
    {
        
        $credentials = $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);

        if (!Auth::attempt($credentials)) {
            return back()->withErrors(['email' => 'Credenciales incorrectas'])->withInput();
        }

        // Login 
        $request->session()->regenerate();

        return redirect()->intended();
    }
}
