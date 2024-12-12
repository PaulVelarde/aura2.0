<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use App\Models\User;
use Illuminate\Http\Request;

class NoticiaController extends Controller
{
    public function index()
    {
        $noticias = Noticia::with('user')->get();
        
        return view('news.noticias', compact('noticias'));
    }

    public function create()
    {
        $users = User::all();
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

        Noticia::create($validated);

        return redirect()->route('noticias.index')->with('success', 'Noticia creada correctamente.');
    }

    public function show(Noticia $noticia)
    {
        return view('noticias.show', compact('noticia'));
    }

    public function edit(Noticia $noticia)
    {
        $users = User::all();
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

        return redirect()->route('noticias.index')->with('success', 'Noticia actualizada correctamente.');
    }

    public function destroy(Noticia $noticia)
    {
        $noticia->delete();
        return redirect()->route('noticias.index')->with('success', 'Noticia eliminada correctamente.');
    }
}
