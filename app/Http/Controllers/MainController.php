<?php

namespace App\Http\Controllers;

use App\Models\Noticia;

class MainController extends Controller
{
    public function index()
    {
        $noticias = Noticia::with('comentarios')->latest()->get();

        return view('noticias.index', compact('noticias'));
    }

    public function createNoticia()
    {
        return view('noticias.crear');
    }

    public function noticia()
    {
        return view('noticias.show');
    }
}
