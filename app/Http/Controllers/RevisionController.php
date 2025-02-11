<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Puntuacion;
use App\Models\Pregunta;
use App\Models\Respuesta;
use Illuminate\Support\Facades\Auth;

class RevisionController extends Controller
{
    // 🟢 Mostrar respuestas previas del usuario
    public function index()
    {
        $user = Auth::user();
        $respuestas = Puntuacion::where('user_id', $user->id)
            ->orderByDesc('created_at')
            ->take(5) // Últimas 5 partidas
            ->get();

        return view('revision', compact('respuestas'));
    }
}

