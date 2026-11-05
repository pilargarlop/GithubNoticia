@extends('template.base')

@section('title', 'Bienvenido')

@section('content')

<!-- About-->
        <section class="content-section bg-light" id="about">
            <div class="container px-4 px-lg-5 text-center">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-10">
                        <h2>Todo lo que ocurre en nuestro centro, en un mismo lugar</h2>
                        <p class="lead mb-5">Consulta actividades, proyectos y avisos para estar al día de la vida de nuestra comunidad educativa.</p>
                        <a class="btn btn-dark btn-xl" href="#services">Explorar secciones</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- Services-->
        <section class="content-section bg-primary text-white text-center" id="services">
            <div class="container px-4 px-lg-5">
                <div class="content-section-heading">
                    <h3 class="text-secondary mb-0">Actualidad</h3>
                    <h2 class="mb-5">Información para toda la comunidad</h2>
                </div>
                <div class="row gx-4 gx-lg-5">
                    <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
                        <span class="service-icon rounded-circle mx-auto mb-3"><i class="icon-screen-smartphone"></i></span>
                        <h4><strong>Actividades</strong></h4>
                        <p class="text-faded mb-0">Información sobre actividades y eventos del centro.</p>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
                        <span class="service-icon rounded-circle mx-auto mb-3"><i class="icon-pencil"></i></span>
                        <h4><strong>Proyectos</strong></h4>
                        <p class="text-faded mb-0">Proyectos e iniciativas de nuestro alumnado.</p>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-5 mb-md-0">
                        <span class="service-icon rounded-circle mx-auto mb-3"><i class="icon-like"></i></span>
                        <h4><strong>Avisos</strong></h4>
                        <p class="text-faded mb-0">Avisos y novedades importantes para las familias.</p>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <span class="service-icon rounded-circle mx-auto mb-3"><i class="icon-mustache"></i></span>
                        <h4><strong>Comunidad</strong></h4>
                        <p class="text-faded mb-0">Un espacio para compartir la vida del centro.</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Callout-->
        <section class="callout">
            <div class="container px-4 px-lg-5 text-center">
                <h2 class="mx-auto mb-5">
                    Descubre las últimas
                    <em>novedades</em>
                    del centro
                </h2>
                <a class="btn btn-primary btn-xl" href="{{ route('noticias.index') }}">Ver actualidad</a>
            </div>
        </section>
        <!-- Portfolio-->
        <section class="content-section" id="portfolio">
            <div class="container px-4 px-lg-5">
                <div class="content-section-heading text-center">
                    <h3 class="text-secondary mb-0">Actualidad</h3>
                    <h2 class="mb-5">Últimas noticias</h2>
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
        <!-- Call to Action-->
        <section class="content-section bg-primary text-white">
            <div class="container px-4 px-lg-5 text-center">
                <h2 class="mb-4">Sigue conectado con la actualidad del centro</h2>
                <a class="btn btn-xl btn-light me-4" href="{{ route('noticias.index') }}">Ver noticias</a>
                <a class="btn btn-xl btn-dark" href="#page-top">Volver al inicio</a>
            </div>
        </section>
        <section class="content-section bg-light text-center" id="contact">
            <div class="container px-4 px-lg-5">
                <h2>Contacto</h2>
                <p class="lead mb-0">Consulta los canales habituales del centro para más información.</p>
            </div>
        </section>

@endsection