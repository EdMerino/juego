<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pregunta;
use App\Models\Respuesta;
use App\Models\Puntuacion;
use Illuminate\Support\Facades\Auth;

class JuegoController extends Controller
{
    private $totalPreguntas = 5; // Número de preguntas por partida

    // 🟢 Mostrar la primera pregunta
    public function iniciarJuego()
    {
        session(['pregunta_actual' => 0, 'puntos' => 0]);
        return redirect()->route('juego');
    }

    // 🟢 Cargar la pregunta actual
    public function cargarPregunta()
    {
        $preguntaActual = session('pregunta_actual', 0);

        // Si ya contestó todas, redirige a la puntuación
        if ($preguntaActual >= $this->totalPreguntas) {
            return redirect()->route('puntuacion');
        }

        // Obtener pregunta aleatoria
        $pregunta = Pregunta::inRandomOrder()->first();
        $respuestas = Respuesta::where('pregunta_id', $pregunta->id)->get();

        return view('juego', compact('pregunta', 'respuestas', 'preguntaActual'));
    }

    // 🟢 Procesar respuesta del usuario
    public function procesarRespuesta(Request $request)
    {
        $preguntaActual = session('pregunta_actual', 0);
        $respuestaId = $request->input('respuesta_id');
        $respuesta = Respuesta::find($respuestaId);

        if (!$respuesta) {
            return redirect()->route('juego')->with('error', 'Respuesta inválida.');
        }

        // Verificar si la respuesta es correcta
        if ($respuesta->es_correcta) {
            session(['puntos' => session('puntos', 0) + 10]); // Sumar 10 puntos por respuesta correcta
        }

        // Pasar a la siguiente pregunta
        session(['pregunta_actual' => $preguntaActual + 1]);

        return redirect()->route('juego');
    }

    // 🟢 Mostrar puntuación al final del juego
    public function mostrarPuntuacion()
    {
        $puntos = session('puntos', 0);

        // Guardar puntuación en la BD
        Puntuacion::create([
            'user_id' => Auth::id(),
            'puntos' => $puntos,
        ]);

        return view('puntuacion', compact('puntos'));
    }
}
