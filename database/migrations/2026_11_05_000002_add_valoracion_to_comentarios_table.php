<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('comentarios', function (Blueprint $table) {
            $table->unsignedTinyInteger('valoracion')->default(5);
        });
    }

    public function down(): void
    {
        Schema::table('comentarios', function (Blueprint $table) {
            $table->dropColumn('valoracion');
        });
    }
};
