<?php

namespace App\Http\Controllers;

use App\Models\Tipo;
use Illuminate\Http\Request;
use App\Models\TransmisionEnVivo;

class TipoController extends Controller
{
    public function index()
    {
        $transmisionEnVivo = TransmisionEnVivo::where('estado', 1)->first();
        $isLive = $transmisionEnVivo ? true : false;

        $tipos = Tipo::all();
        return view('tipos.index', compact('tipos'));
    }

    public function create()
    {
        return view('tipos.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|max:45',
            'detalle' => 'nullable|max:45',
        ]);

        Tipo::create($validated);

        return redirect()->route('tipos.index')->with('success', 'Tipo creado correctamente.');
    }

    public function show(Tipo $tipo)
    {
        return view('tipos.show', compact('tipo'));
    }

    public function edit(Tipo $tipo)
    {
        return view('tipos.edit', compact('tipo'));
    }

    public function update(Request $request, Tipo $tipo)
    {
        $validated = $request->validate([
            'nombre' => 'required|max:45',
            'detalle' => 'nullable|max:45',
        ]);

        $tipo->update($validated);

        return redirect()->route('tipos.index')->with('success', 'Tipo actualizado correctamente.');
    }

    public function destroy(Tipo $tipo)
    {
        $tipo->delete();
        return redirect()->route('tipos.index')->with('success', 'Tipo eliminado correctamente.');
    }
}
