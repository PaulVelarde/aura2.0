<?php

namespace App\Http\Controllers;

use App\Models\Tipo;
use App\Models\Noticia;
use App\Models\RedVideo;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // Obtener el tipo seleccionado desde la solicitud
        $type = $request->input('type', 'all');

        // Consulta base de noticias
        $query = Noticia::query();

        // Si se seleccionó un tipo específico, aplicar el filtro
        if ($type !== 'all') {
            $query->whereHas('tipos', function ($q) use ($type) {
                $q->where('idtipo', $type);
            });
        }

        // Obtener la última noticia
        $ultimaNoticia = Noticia::latest('created_at')->first();

        // Obtener las últimas noticias con paginación
        $ultimasNoticias = $query->latest('created_at')->paginate(5);

        // Obtener todos los tipos de noticias para el filtro
        $tipos = Tipo::all();

        // Obtener videos de TikTok, Facebook y otros (como Instagram) 
        $facebookLinks = RedVideo::where('plataforma', 'Facebook')->latest('created_at')->take(5)->get();
        $tikTokReels = RedVideo::where('plataforma', 'TikTok')->latest('created_at')->take(1)->get();

        // Pasar todos los datos a la vista
        return view('home.index', compact(
            'type', // Tipo seleccionado
            'tipos', // Lista de tipos
            'ultimasNoticias', // Noticias filtradas
            'ultimaNoticia', // Última noticia
            'facebookLinks', // Videos de Facebook
            'tikTokReels' // Videos de TikTok
        ));
    }
}
