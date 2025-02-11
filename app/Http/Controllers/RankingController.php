<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Puntuacion;
use App\Models\User;

class RankingController extends Controller
{
    public function index()
    {
        $ranking = Puntuacion::with('user') // Carga la relación del usuario
            ->select('user_id')
            ->selectRaw('SUM(puntos) as total_puntos')
            ->groupBy('user_id')
            ->orderByDesc('total_puntos')
            ->take(10)
            ->get();

        return view('ranking', compact('ranking'));
    }
}
