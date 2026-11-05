<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use App\Models\Noticia;
use Illuminate\Http\Request;

class NoticiaController extends Controller
{
    public function index()
    {
        $noticias = Noticia::with('comentarios')->latest()->get();

        return view('noticias.show', compact('noticias'));
    }

    public function create()
    {
        return view('noticias.create');
    }

    public function edit(Noticia $noticia)
    {
        return view('noticias.edit', compact('noticia'));
    }

    public function store(Request $request)
    {
        $datos = $request->validate([
            'titulo' => 'required|string|max:255',
            'contenido' => 'required|string',
            'valoracion' => 'required|integer|between:1,5',
        ]);

        Noticia::create($datos);

        return redirect()->route('noticias.index')->with('ok', 'Noticia publicada');
    }

    public function storeComentario(Request $request, Noticia $noticia)
    {
        $datos = $request->validate([
            'autor' => 'required|string|max:100',
            'contenido' => 'required|string|max:2000',
            'valoracion' => 'required|integer|between:1,5',
        ]);

        $noticia->comentarios()->create($datos);

        return back()
            ->with('ok', 'Comentario publicado')
            ->withFragment('comentarios-'.$noticia->id);
    }

    public function destroyComentario(Noticia $noticia, Comentario $comentario)
    {
        $noticia->comentarios()->findOrFail($comentario->id)->delete();

        return back()
            ->with('ok', 'Comentario eliminado')
            ->withFragment('comentarios-'.$noticia->id);
    }

    public function update(Request $request, Noticia $noticia)
    {
        $datos = $request->validate([
            'titulo' => 'required|string|max:255',
            'contenido' => 'required|string',
            'valoracion' => 'required|integer|between:1,5',
        ]);

        $noticia->update($datos);

        return redirect()->route('noticias.index')->with('ok', 'Noticia actualizada');
    }

    public function destroy(Noticia $noticia)
    {
        $noticia->delete();

        return redirect()->route('noticias.index')->with('ok', 'Noticia eliminada');
    }
}
