<?php

namespace App\Http\Controllers;

use App\Models\Periodista;
use Illuminate\Http\Request;
use App\Models\TransmisionEnVivo;

class PeriodistaController extends Controller
{
    public function index()
    {
        $transmisionEnVivo = TransmisionEnVivo::where('estado', 1)->first();
        $isLive = $transmisionEnVivo ? true : false;

        $periodistas = Periodista::all();
        return view('periodistas.index', compact('periodistas'));
    }

    public function create()
    {
        return view('periodistas.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|max:45',
            'correo' => 'nullable|email|max:45',
            'telefono' => 'nullable|max:20',
        ]);

        Periodista::create($validated);

        return redirect()->route('periodistas.index')->with('success', 'Periodista creado correctamente.');
    }

    public function show(Periodista $periodista)
    {
        return view('periodistas.show', compact('periodista'));
    }

    public function edit(Periodista $periodista)
    {
        return view('periodistas.edit', compact('periodista'));
    }

    public function update(Request $request, Periodista $periodista)
    {
        $validated = $request->validate([
            'nombre' => 'required|max:45',
            'correo' => 'nullable|email|max:45',
            'telefono' => 'nullable|max:20',
        ]);

        $periodista->update($validated);

        return redirect()->route('periodistas.index')->with('success', 'Periodista actualizado correctamente.');
    }

    public function destroy(Periodista $periodista)
    {
        $periodista->delete();
        return redirect()->route('periodistas.index')->with('success', 'Periodista eliminado correctamente.');
    }
}
