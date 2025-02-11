<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProgresoJugador;
use Illuminate\Support\Facades\Auth;

class ProgresoController extends Controller
{
    // 🟢 Mostrar el progreso del usuario
    public function index()
    {
        $user = Auth::user();
        $progreso = ProgresoJugador::where('user_id', $user->id)->first();

        return view('progreso', compact('progreso'));
    }

    // 🟢 Actualizar progreso después de cada partida
    public function actualizarProgreso($puntos)
    {
        $user = Auth::user();

        $progreso = ProgresoJugador::firstOrCreate(
            ['user_id' => $user->id],
            ['nivel' => 1, 'experiencia' => 0] // Valores iniciales
        );

        // Sumar experiencia y subir nivel si es necesario
        $progreso->experiencia += $puntos;
        if ($progreso->experiencia >= 100) {
            $progreso->nivel += 1;
            $progreso->experiencia = 0; // Resetear experiencia al subir de nivel
        }

        $progreso->save();
    }
}
