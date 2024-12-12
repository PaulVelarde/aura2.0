<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function store(Request $request)
    {
        
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|string|min:8|confirmed',
        ]);

        try {
            $user = new User();
            $user->name = $request->input('username');
            $user->email = $request->input('email');
            $user->password = Hash::make($request->input('password'));
            $user->rol = 1;
            $user->save();

            return redirect()->route('login')->with('success', 'Registro exitoso. Por favor, inicia sesión.');
        } catch (\Illuminate\Database\QueryException $e) {
            // Manejar errores específicos de la base de datos
            return redirect()->route('login')->withErrors(['error' => 'Error al crear el usuario. Por favor, verifica los datos e inténtalo nuevamente.'])->withInput();
        } catch (\Exception $e) {
            // Manejar otros tipos de errores
            return redirect()->route('login')->withErrors(['error' => 'Error inesperado. Por favor, intenta nuevamente.'])->withInput();
        }
    }

    public function mostrarUsuario()
    {
        $usuarios = User::all();
        return view('usuario', ['usuarios' => $usuarios]);
    }
    public function mostrarModificar($id)
    {
        // Obtener los datos del médico con el ID proporcionado
        $usuario = User::findOrFail($id);


        return view('usuarioModificar', ['usuario' => $usuario]);
    }
    public function actualizar(Request $request, $id)
    {
        $usuario = User::find($id);

        if (!$usuario) {
            return redirect()->route('usuario')->with('error', 'Usuario no encontrado');
        }

        try {
            if ($request->filled('Contraseña')) {
                // Si se proporcionó una nueva contraseña, la actualizamos
                $usuario->password = Hash::make($request->input('Contraseña'));
            }



            $usuario->name = $request->input('usuario');
            $usuario->email = $request->input('email');
            $usuario->rol = $request->input('rol');

            $usuario->save();

            return redirect()->route('usuario')->with('success', 'Modificación exitosa.');
        } catch (\Illuminate\Database\QueryException $e) {
            // Manejar errores específicos de la base de datos
            return redirect()->route('usuario')->withErrors(['error' => 'Error al modificar el usuario. Por favor, verifica los datos e inténtalo nuevamente.'])->withInput();
        } catch (\Exception $e) {
            // Manejar otros tipos de errores
            return redirect()->route('usuario')->withErrors(['error' => 'Error inesperado. Por favor, intenta nuevamente.'])->withInput();
        }
    }
    // public function eliminar($id) no se puede eliminar usuarios por la integridad del sistema
    // {
    //     try {
    //         // Buscar el usuario por ID
    //         $usuario = User::findOrFail($id);

    //         // Eliminar el usuario
    //         $usuario->delete();

    //         return redirect()->route('usuario')->with('success', 'Usuario eliminado correctamente.');
    //     } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
    //         // Manejar el caso en el que el usuario no se encuentra
    //         return redirect()->route('usuario')->with('error', 'Usuario no encontrado.');
    //     } catch (\Exception $e) {
    //         // Manejar cualquier otra excepción
    //         return redirect()->route('usuario')->with('error', 'Error al eliminar el usuario. Detalles: ' . $e->getMessage());
    //     }
    // }
}
