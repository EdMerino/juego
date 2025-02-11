<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jugador extends Model
{
    protected $table = 'jugadores';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['nombre', 'correo', 'password', 'experiencia', 'nivel'];

    public function partidas()
    {
        return $this->hasMany(Partida::class, 'jugador_id');
    }

    public function progreso()
    {
        return $this->hasMany(ProgresoJugador::class, 'jugador_id');
    }

    public function ranking()
    {
        return $this->hasOne(Ranking::class, 'jugador_id');
    }
}
