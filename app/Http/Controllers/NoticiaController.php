<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use App\Models\Tipo;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;



class NoticiaController extends Controller
{
    // Muestra la lista de noticias con filtros
    
    public function index(Request $request)
{
    $query = $request->input('query');
    $categoria = $request->input('categoria');

    $noticias = Noticia::query()->with('tipos');

    if ($query) {
        $noticias->where('titular', 'like', '%' . $query . '%');
    }

    if ($categoria) {
        $noticias->whereHas('tipos', function ($q) use ($categoria) {
            $q->where('nombre', $categoria);
        });
    }

    $noticias = $noticias->paginate(5);

    if ($request->ajax()) {
        return view('partials.noticias', compact('noticias'))->render();
    }

    $tipos = Tipo::all();
    return view('news.noticias', compact('noticias', 'tipos'));
}


    public function create()
    {
        $users = User::all(); // Obtener todos los usuarios
        return view('noticias.create', compact('users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'titular' => 'required|max:100',
            'contenido' => 'required',
            'image' => 'nullable|image|max:2048',
            'fecha' => 'nullable|date',
            'fuente' => 'nullable|max:45',
            'usuario_id' => 'required|exists:users,idusuarios',
        ]);

        $noticia = Noticia::create($validated);

        // Asignar tipos a la noticia
        $noticia->tipos()->sync($request->tipos);

        return redirect()->route('noticias.index')->with('success', 'Noticia creada correctamente.');
    }

    public function show($id)
{
    $noticia = Noticia::findOrFail($id);

    // Verifica si es una instancia de Carbon
   // dd($noticia->fecha);

    return view('news.noticias_details', compact('noticia'));
}
    
    public function edit(Noticia $noticia)
    {
        $users = User::all(); // Obtener todos los usuarios
        return view('noticias.edit', compact('noticia', 'users'));
    }

    public function update(Request $request, Noticia $noticia)
    {
        $validated = $request->validate([
            'titular' => 'required|max:100',
            'contenido' => 'required',
            'image' => 'nullable|image|max:2048',
            'fecha' => 'nullable|date',
            'fuente' => 'nullable|max:45',
            'usuario_id' => 'required|exists:users,idusuarios',
        ]);

        $noticia->update($validated);

        // Asignar tipos a la noticia
        $noticia->tipos()->sync($request->tipos);

        return redirect()->route('noticias.index')->with('success', 'Noticia actualizada correctamente.');
    }

    public function destroy(Noticia $noticia)
    {
        $noticia->delete();
        return redirect()->route('noticias.index')->with('success', 'Noticia eliminada correctamente.');
    }
}
