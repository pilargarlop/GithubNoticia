@extends('template.base')

@section('title', 'Nueva noticia')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">Nueva noticia</h1>

    <form method="POST" action="{{  route('noticias.store') }}">
        @csrf

        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" name="titulo" id="titulo" class="form-control"
                   value="{{ old('titulo') }}" required>
            @error('titulo') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="contenido" class="form-label">Contenido</label>
            <textarea name="contenido" id="contenido" rows="6" class="form-control" required>{{ old('contenido') }}</textarea>
            @error('contenido') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <fieldset class="mb-3">
            <legend class="form-label">Valoración</legend>
            <div class="d-flex flex-wrap gap-3">
                @for ($valor = 1; $valor <= 5; $valor++)
                    <div class="form-check">
                        <input
                            type="radio"
                            name="valoracion"
                            id="valoracion-{{ $valor }}"
                            class="form-check-input @error('valoracion') is-invalid @enderror"
                            value="{{ $valor }}"
                            @checked(old('valoracion', 5) == $valor)
                            required
                        >
                        <label for="valoracion-{{ $valor }}" class="form-check-label">
                            {{ $valor }} {{ $valor === 1 ? 'estrella' : 'estrellas' }}
                        </label>
                    </div>
                @endfor
            </div>
            @error('valoracion') <div class="text-danger">{{ $message }}</div> @enderror
        </fieldset>

        <button type="submit" class="btn btn-primary">Publicar</button>
        <a href="{{ route('noticias.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection