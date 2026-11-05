<article class="card mb-3">
    <div class="card-body">
        <div class="d-flex flex-wrap justify-content-between align-items-start gap-3">
            <div>
                <h2 class="h4 card-title">{{ $noticia->titulo }}</h2>
                <p class="text-muted small">
                    Publicada el {{ $noticia->created_at->format('d/m/Y H:i') }}
                </p>
                <p class="mb-0" aria-label="Valoración: {{ $noticia->valoracion }} de 5">
                    <span class="text-warning" aria-hidden="true">{{ str_repeat('★', $noticia->valoracion) }}{{ str_repeat('☆', 5 - $noticia->valoracion) }}</span>
                    <span class="text-muted">{{ $noticia->valoracion }}/5</span>
                </p>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('noticias.edit', $noticia) }}" class="btn btn-outline-primary">
                    Editar
                </a>
                <form method="POST" action="{{ route('noticias.destroy', $noticia) }}"
                      onsubmit="return confirm('¿Seguro que quieres borrar esta noticia y sus comentarios?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger">Borrar noticia</button>
                </form>
            </div>
        </div>
        <p class="card-text">{{ $noticia->contenido }}</p>

        <div id="comentarios-{{ $noticia->id }}" class="border-top pt-3">
            <h3 class="h5">Comentarios ({{ $noticia->comentarios->count() }})</h3>
            @forelse ($noticia->comentarios as $comentario)
                <div class="mb-3">
                    <strong>{{ $comentario->autor }}</strong>
                    <span class="text-muted small">{{ $comentario->created_at->format('d/m/Y H:i') }}</span>
                    <p class="mb-1" aria-label="Valoración: {{ $comentario->valoracion }} de 5">
                        <span class="text-warning" aria-hidden="true">{{ str_repeat('★', $comentario->valoracion) }}{{ str_repeat('☆', 5 - $comentario->valoracion) }}</span>
                        <span class="text-muted">{{ $comentario->valoracion }}/5</span>
                    </p>
                    <p class="mb-0">{{ $comentario->contenido }}</p>
                    <form method="POST"
                          action="{{ route('noticias.comentarios.destroy', [$noticia, $comentario]) }}"
                          class="mt-2"
                          onsubmit="return confirm('¿Seguro que quieres borrar este comentario?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger">Borrar comentario</button>
                    </form>
                </div>
            @empty
                <p class="text-muted">Todavía no hay comentarios.</p>
            @endforelse

            <form method="POST" action="{{ route('noticias.comentarios.store', $noticia) }}">
                @csrf
                <div class="mb-2">
                    <label for="autor-{{ $noticia->id }}" class="form-label">Tu nombre</label>
                    <input
                        type="text"
                        name="autor"
                        id="autor-{{ $noticia->id }}"
                        class="form-control @error('autor') is-invalid @enderror"
                        value="{{ old('autor') }}"
                        maxlength="100"
                        required
                    >
                    @error('autor') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="mb-2">
                    <label for="contenido-{{ $noticia->id }}" class="form-label">Comentario</label>
                    <textarea
                        name="contenido"
                        id="contenido-{{ $noticia->id }}"
                        rows="3"
                        class="form-control @error('contenido') is-invalid @enderror"
                        maxlength="2000"
                        required
                    >{{ old('contenido') }}</textarea>
                    @error('contenido') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <fieldset class="mb-2">
                    <legend class="form-label">Valora esta noticia</legend>
                    <div class="d-flex flex-wrap gap-3">
                        @for ($valor = 1; $valor <= 5; $valor++)
                            <div class="form-check">
                                <input
                                    type="radio"
                                    name="valoracion"
                                    id="comentario-valoracion-{{ $noticia->id }}-{{ $valor }}"
                                    class="form-check-input @error('valoracion') is-invalid @enderror"
                                    value="{{ $valor }}"
                                    @checked(old('valoracion', 5) == $valor)
                                    required
                                >
                                <label for="comentario-valoracion-{{ $noticia->id }}-{{ $valor }}" class="form-check-label">
                                    {{ $valor }} {{ $valor === 1 ? 'estrella' : 'estrellas' }}
                                </label>
                            </div>
                        @endfor
                    </div>
                    @error('valoracion') <div class="text-danger">{{ $message }}</div> @enderror
                </fieldset>
                <button type="submit" class="btn btn-primary">Publicar comentario</button>
            </form>
        </div>
    </div>
</article>
