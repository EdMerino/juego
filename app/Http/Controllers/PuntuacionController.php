<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Puntuacion;

class PuntuacionController extends Controller
{
    /**
     * Muestra la pantalla de puntuaciones del jugador autenticado.
     */
    public function index()
    {
        // Obtener el ID del usuario autenticado
        $jugadorId = Auth::id();

        // Consultar puntuaciones del jugador autenticado ordenadas por puntos descendente
        $puntos = Puntuacion::where('jugador_id', $jugadorId)->orderByDesc('puntos')->get();

        return view('puntuacion', compact('puntos'));
    }

    /**
     * Guarda la puntuación del jugador después de completar el juego.
     */
    public function guardarPuntuacion(Request $request)
    {
        $request->validate([
            'puntos' => 'required|integer|min:0',
        ]);

        // Obtener el ID del usuario autenticado
        $jugadorId = Auth::id();

        // Guardar la puntuación en la base de datos
        Puntuacion::create([
            'jugador_id' => $jugadorId,
            'puntos' => $request->puntos,
        ]);

        return redirect()->route('puntuacion')->with('success', 'Puntuación guardada correctamente.');
    }
}
