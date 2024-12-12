<?php
namespace App\Http\Controllers;

use App\Models\Noticia;
use App\Models\RedVideo;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $ultimaNoticia = Noticia::latest('created_at')->first();
        $ultimasNoticias = Noticia::latest()->get();
        $facebookLinks = RedVideo::where('plataforma', 'Facebook')->latest('created_at')->take(5)->get();
        $instagramLinks = RedVideo::where('plataforma', 'Instagram')->get();
        $tikTokReels = RedVideo::where('plataforma', 'TikTok')->latest('created_at')->take(5)->get();
    //dd($ultimaNoticia);
        return view('home.index', compact(
            'ultimaNoticia',
            'ultimasNoticias',
            'facebookLinks',
            'instagramLinks',
            'tikTokReels'
        ));
    }
}
