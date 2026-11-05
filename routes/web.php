<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\NoticiaController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'index'])->name('home');

Route::get('/noticias', [NoticiaController::class, 'index'])->name('noticias.index');
Route::get('/noticia', [NoticiaController::class, 'index'])->name('noticias.show');
Route::get('/noticas', [NoticiaController::class, 'index']);
Route::get('/noticias/crear', [NoticiaController::class, 'create'])->name('noticias.create');
Route::post('/noticias', [NoticiaController::class, 'store'])->name('noticias.store');
Route::post('/noticias/{noticia}/comentarios', [NoticiaController::class, 'storeComentario'])
    ->name('noticias.comentarios.store');
Route::delete('/noticias/{noticia}/comentarios/{comentario}', [NoticiaController::class, 'destroyComentario'])
    ->name('noticias.comentarios.destroy');
Route::get('/noticias/{noticia}/editar', [NoticiaController::class, 'edit'])->name('noticias.edit');
Route::put('/noticias/{noticia}', [NoticiaController::class, 'update'])->name('noticias.update');
Route::delete('/noticias/{noticia}', [NoticiaController::class, 'destroy'])->name('noticias.destroy');
