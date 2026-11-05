@extends('template.base')

@section('title', 'Últimas noticias')

@section('content')
<section class="content-section bg-light" id="portfolio">
    <div class="container px-4 px-lg-5">
        <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
            <div>
                <h1 class="mb-1">Últimas noticias</h1>
                <p class="text-muted mb-0">Noticias publicadas por el centro.</p>
            </div>
            <a href="{{ route('noticias.create') }}" class="btn btn-primary">Publicar noticia</a>
        </div>

        @if (session('ok'))
            <div class="alert alert-success" role="status">{{ session('ok') }}</div>
        @endif

        @forelse ($noticias as $noticia)
            @include('noticias._noticia', ['noticia' => $noticia])
        @empty
            <div class="alert alert-info" role="status">
                Todavía no hay noticias publicadas.
            </div>
        @endforelse
    </div>
</section>
@endsection