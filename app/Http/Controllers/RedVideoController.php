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
        $redVideos = RedVideo::with(['tipo', 'user'])->get();
        return view('red_videos.index', compact('redVideos'));
    }

    public function create()
    {
        $tipos = Tipo::all();
        $users = User::all();
        return view('red_videos.create', compact('tipos', 'users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'titulo' => 'required|max:45',
            'url' => 'required|max:45|url',
            'plataforma' => 'required|max:45',
            'fecha' => 'nullable|date',
            'tipo_id' => 'required|exists:tipos,id',
            'usuario_id' => 'required|exists:users,idusuarios',
        ]);

        RedVideo::create($validated);

        return redirect()->route('red_videos.index')->with('success', 'Red video creado correctamente.');
    }

    public function show(RedVideo $redVideo)
    {
        return view('red_videos.show', compact('redVideo'));
    }

    public function edit(RedVideo $redVideo)
    {
        $tipos = Tipo::all();
        $users = User::all();
        return view('red_videos.edit', compact('redVideo', 'tipos', 'users'));
    }

    public function update(Request $request, RedVideo $redVideo)
    {
        $validated = $request->validate([
            'titulo' => 'required|max:45',
            'url' => 'required|max:45|url',
            'plataforma' => 'required|max:45',
            'fecha' => 'nullable|date',
            'tipo_id' => 'required|exists:tipos,id',
            'usuario_id' => 'required|exists:users,idusuarios',
        ]);

        $redVideo->update($validated);

        return redirect()->route('red_videos.index')->with('success', 'Red video actualizado correctamente.');
    }

    public function destroy(RedVideo $redVideo)
    {
        $redVideo->delete();
        return redirect()->route('red_videos.index')->with('success', 'Red video eliminado correctamente.');
    }
}
