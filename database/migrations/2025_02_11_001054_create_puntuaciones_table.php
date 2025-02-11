<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('puntuaciones', function (Blueprint $table) {
            $table->id();
            $table->uuid('jugador_id'); // Asegura que sea del mismo tipo que en la tabla 'jugadores'
            $table->integer('puntos');
            $table->timestamps();

            // Definir la clave foránea correctamente
            $table->foreign('jugador_id')->references('id')->on('jugadores')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('puntuaciones');
    }
};
