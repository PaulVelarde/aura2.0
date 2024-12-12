<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Noticia;
use App\Models\RedVideo;

class AdminPanelController extends Controller
{
    //
        // Método para cargar la vista del panel de administración
        public function index()
        {
           // dd("hola ya accedi");
            return view('admin.admin'); // Asegúrate de que admin.blade.php esté en la carpeta correcta
        }

    public function storeNews(Request $request)
    {
        // Validar y procesar los datos del formulario de "Añadir Noticia"
        $validatedData = $request->validate([
            'titular' => 'required',
            'contenido' => 'required',
            'image' => 'required|image|max:2048',
        ]);

        $noticia = new Noticia();
    $noticia->titular = $validatedData['titular'];
    $noticia->contenido = $validatedData['contenido'];
    $noticia->image = $request->file('image')->store('noticias', 'public');
    
    $noticia->save();

        return redirect()->route('admin.index')->with('success', 'Noticia agregada correctamente.');
    }

    public function storeVideo(Request $request)
    {
        // Validar y procesar los datos del formulario de "Añadir Videos Redes Sociales"
        $validatedData = $request->validate([
            'titulo' => 'required',
            'URL' => 'required|url',
            'fuente' => 'required',
        ]);

        // Guardar el video en la base de datos
        // ...

        return redirect()->route('admin.index')->with('success', 'Video agregado correctamente.');
    }
    
}
