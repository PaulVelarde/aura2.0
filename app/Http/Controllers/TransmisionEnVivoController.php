<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransmisionEnVivo;
use Carbon\Carbon;

class TransmisionEnVivoController extends Controller
{
    /**
     * Mostrar la transmisión en vivo actual si está activa.
     */
    
     public function show()
    {
        $transmisionEnVivo = TransmisionEnVivo::where('estado', 1)->first();
        $isLive = $transmisionEnVivo ? true : false;

        // Buscar la transmisión activa
        $transmision = TransmisionEnVivo::where('estado', 1)->first();

        // Determinar si hay transmisión en vivo activa
        $isLive = $transmision ? true : false;

        // Pasar la variable isLive a la vista
        return view('nombre-de-tu-vista', compact('isLive'));
    }

    /**
     * Activar una nueva transmisión en vivo.
     */
    public function activate(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:100',
            'url' => 'required|url',
        ]);

        // Finalizar cualquier transmisión en vivo activa
        TransmisionEnVivo::where('estado', 1)->update([
            'estado' => 0,
            'fecha_fin' => Carbon::now(),
        ]);

        // Crear y activar la nueva transmisión
        $transmision = TransmisionEnVivo::create([
            'titulo' => $request->titulo,
            'url' => $request->url,
            'estado' => 1,
            'fecha_inicio' => Carbon::now(),
        ]);

        return response()->json($transmision);
    }

    /**
     * Finalizar la transmisión en vivo actual.
     */
    public function deactivate()
    {
        $transmision = TransmisionEnVivo::where('estado', 1)->first();

        if ($transmision) {
            $transmision->update([
                'estado' => 0,
                'fecha_fin' => Carbon::now(),
            ]);

            return response()->json(['message' => 'La transmisión en vivo ha finalizado.']);
        }

        return response()->json(['message' => 'No hay transmisión en vivo activa para finalizar.'], 404);
    }
}
