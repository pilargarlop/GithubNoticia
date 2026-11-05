<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comentario extends Model
{
    protected $fillable = ['autor', 'contenido', 'valoracion'];

    public function noticia(): BelongsTo
    {
        return $this->belongsTo(Noticia::class);
    }
}
