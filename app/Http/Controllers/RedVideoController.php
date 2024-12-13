<?php

namespace App\Http\Controllers;

use App\Models\RedVideo;
use App\Models\Tipo;
use App\Models\User;
use Illuminate\Http\Request;

class RedVideoController extends Controller
{
    public function index()
    {
        // Obtiene todos los videos de redes sociales con sus tipos y usuarios asociados
        $redVideos = RedVideo::with(['tipo', 'user'])->get();
        return view('red_videos.index', compact('redVideos'));
    }

    public function create()
    {
        // Obtiene todos los tipos y usuarios para el formulario de creación
        $tipos = Tipo::all();
        $users = User::all();
        return view('red_videos.create', compact('tipos', 'users'));
    }

    public function store(Request $request)
    {
        // Valida los datos del formulario de creación
        $validated = $request->validate([
            'titulo' => 'required|max:45',
            'url' => 'required|max:45|url',
            'plataforma' => 'required|max:45',
            'fecha' => 'nullable|date',
            'tipo_id' => 'required|exists:tipos,id',
            'usuario_id' => 'required|exists:users,idusuarios',
        ]);

        // Crea un nuevo video de red
        RedVideo::create($validated);

        return redirect()->route('red_videos.index')->with('success', 'Red video creado correctamente.');
    }

    public function show(RedVideo $redVideo)
    {
        // Muestra los detalles de un video de red específico
        return view('red_videos.show', compact('redVideo'));
    }

    public function edit(RedVideo $redVideo)
    {
        // Obtiene todos los tipos y usuarios para editar un video
        $tipos = Tipo::all();
        $users = User::all();
        return view('red_videos.edit', compact('redVideo', 'tipos', 'users'));
    }

    public function update(Request $request, RedVideo $redVideo)
    {
        // Valida los datos del formulario de edición
        $validated = $request->validate([
            'titulo' => 'required|max:45',
            'url' => 'required|max:45|url',
            'plataforma' => 'required|max:45',
            'fecha' => 'nullable|date',
            'tipo_id' => 'required|exists:tipos,id',
            'usuario_id' => 'required|exists:users,idusuarios',
        ]);

        // Actualiza el video de red con los nuevos datos
        $redVideo->update($validated);

        return redirect()->route('red_videos.index')->with('success', 'Red video actualizado correctamente.');
    }

    public function destroy(RedVideo $redVideo)
    {
        // Elimina el video de red
        $redVideo->delete();
        return redirect()->route('red_videos.index')->with('success', 'Red video eliminado correctamente.');
    }
}
