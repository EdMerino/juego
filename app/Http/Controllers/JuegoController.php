<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pregunta;
use App\Models\Respuesta;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class JuegoController extends Controller
{
    private $numPreguntas = 5; // Número total de preguntas por partida

    /**
     * Inicia el juego estableciendo las variables de sesión.
     */
    public function iniciarJuego()
    {
        // Obtener preguntas aleatorias
        $preguntas = Pregunta::inRandomOrder()->limit($this->numPreguntas)->get();

        // Inicializar variables de sesión
        Session::put('preguntas', $preguntas);
        Session::put('indicePregunta', 0);
        Session::put('puntuacion', 0);
        Session::put('respuestas_correctas', []);
        Session::put('respuestas_incorrectas', []);

        return redirect()->route('juego');
    }

    /**
     * Carga la pregunta actual.
     */
    public function index()
    {
        $preguntas = Session::get('preguntas', []);
        $indicePregunta = Session::get('indicePregunta', 0);
        $puntuacion = Session::get('puntuacion', 0);

        // Verificar si el juego ha terminado
        if ($indicePregunta >= count($preguntas)) {
            return redirect()->route('juego.puntuacion');
        }

        $preguntaActual = $preguntas[$indicePregunta];
        $respuestas = Respuesta::where('pregunta_id', $preguntaActual->id)->inRandomOrder()->get();

        return view('juego', compact('preguntaActual', 'respuestas', 'indicePregunta', 'puntuacion'));
    }

    /**
     * Procesa la respuesta del usuario.
     */
    public function procesarRespuesta(Request $request)
    {
        $preguntas = Session::get('preguntas', []);
        $indicePregunta = Session::get('indicePregunta', 0);
        $puntuacion = Session::get('puntuacion', 0);
        $respuestas_correctas = Session::get('respuestas_correctas', []);
        $respuestas_incorrectas = Session::get('respuestas_incorrectas', []);

        if ($indicePregunta >= count($preguntas)) {
            return redirect()->route('juego.puntuacion');
        }

        $preguntaActual = $preguntas[$indicePregunta];
        $respuestaSeleccionada = $request->input('respuesta');

        $respuestaCorrecta = Respuesta::where('pregunta_id', $preguntaActual->id)
                                      ->where('es_correcta', true)
                                      ->first();

        // Verificar si la respuesta es correcta
        if ($respuestaCorrecta && $respuestaSeleccionada == $respuestaCorrecta->id) {
            $puntuacion++; // ✅ Incrementa correctamente la puntuación
            $respuestas_correctas[] = $preguntaActual->texto; // Agregar a respuestas correctas
            Session::flash('mensaje', '✅ Respuesta correcta!');
            Session::flash('tipo', 'success');
        } else {
            $respuestas_incorrectas[] = $preguntaActual->texto; // Agregar a respuestas incorrectas
            Session::flash('mensaje', '❌ Respuesta incorrecta.');
            Session::flash('tipo', 'danger');
        }

        // Guardar los valores actualizados en la sesión
        Session::put('indicePregunta', $indicePregunta + 1);
        Session::put('puntuacion', $puntuacion);
        Session::put('respuestas_correctas', $respuestas_correctas);
        Session::put('respuestas_incorrectas', $respuestas_incorrectas);

        return redirect()->route('juego');
    }

    /**
     * Muestra la puntuación final del usuario.
     */
    public function mostrarPuntuacion()
    {
        $puntuacion = Session::get('puntuacion', 0);
        $respuestas_correctas = Session::get('respuestas_correctas', []);
        $respuestas_incorrectas = Session::get('respuestas_incorrectas', []);

        // ✅ Verifica si la puntuación se está obteniendo correctamente
        // dd(Session::all());

        return view('puntuacion', compact('puntuacion', 'respuestas_correctas', 'respuestas_incorrectas'));
    }
}
