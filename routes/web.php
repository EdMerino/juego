<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JuegoController;
use App\Http\Controllers\RankingController;
use App\Http\Controllers\ProgresoController;
use App\Http\Controllers\RevisionController;
use App\Http\Controllers\ProfileController;

// ✅ Ruta principal
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// ✅ Dashboard
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // 🔹 Perfil de usuario (manejado por Laravel Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // 🎮 **Juego**
    Route::prefix('juego')->group(function () {
        Route::get('/', [JuegoController::class, 'index'])->name('juego');
        Route::post('/responder', [JuegoController::class, 'procesarRespuesta'])->name('juego.responder');
        Route::get('/puntuacion', [JuegoController::class, 'mostrarPuntuacion'])->name('juego.puntuacion');
        Route::get('/iniciar', [JuegoController::class, 'iniciarJuego'])->name('juego.iniciar');
    });

    // 📊 **Progreso**
    Route::get('/progreso', [ProgresoController::class, 'index'])->name('progreso');

    // 🏆 **Ranking**
    Route::get('/ranking', [RankingController::class, 'index'])->name('ranking');

    // ✅ **Revisión de respuestas**
    Route::get('/revision', [RevisionController::class, 'index'])->name('revision');
});

// 🛠️ Rutas de autenticación de Laravel Breeze
require __DIR__.'/auth.php';
