<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Noticia extends Model
{
    protected $fillable = ['titulo', 'contenido', 'valoracion'];

    public function comentarios(): HasMany
    {
        return $this->hasMany(Comentario::class);
    }
}
