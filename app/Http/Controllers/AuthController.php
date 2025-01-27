<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Dotenv\Exception\ValidationException;
use AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use App\Models\Noticia;
use App\Models\RedVideo;



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

        // Redirigir a la página inicial o a la página protegida solicitada
        return redirect()->intended(route('admin.index'));
    }

    // Si las credenciales son incorrectas, retornar error
    return redirect()->back()->with('error', 'Credenciales incorrectas.');
}

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    // Método para almacenar noticias
    public function storeNews(Request $request)
    {
        // Validar los datos
        $validated = $request->validate([
            'titular' => 'required|string|max:255',
            'contenido' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Subir la imagen
        $imagePath = $request->file('image')->store('images/noticias', 'public');

        // Crear la noticia en la base de datos
        $noticia = new Noticia([
            'titular' => $validated['titular'],
            'contenido' => $validated['contenido'],
            'image' => $imagePath,
            'fecha' => now(),
            'fuente' => 'admin',  // Aquí puedes poner alguna fuente predeterminada o de la que proviene la noticia
            'usuario_id' => Auth::id(),  // El id del usuario autenticado
        ]);
        $noticia->save();

        return redirect()->back()->with('success', 'Noticia añadida correctamente');
    }

    // Método para almacenar videos de redes sociales
    public function storeVideo(Request $request)
    {
        // Validar los datos
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'URL' => 'required|url',
            'fuente' => 'required|string',
        ]);

        // Crear el registro en la base de datos
        $video = new RedVideo([
            'titulo' => $validated['titulo'],
            'url' => $validated['URL'],
            'plataforma' => $validated['fuente'],
            'fecha' => now(),
        ]);
        $video->save();

        return redirect()->back()->with('success', 'Video añadido correctamente');
    }
    
}
