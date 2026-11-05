<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('comentarios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('noticia_id')->constrained()->cascadeOnDelete();
            $table->string('autor', 100);
            $table->text('contenido');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('comentarios');
    }
};
