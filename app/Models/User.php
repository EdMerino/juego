<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // 🔹 Relación con progreso del jugador
    public function progreso()
    {
        return $this->hasOne(ProgresoJugador::class, 'user_id');
    }

    // 🔹 Relación con partidas jugadas
    public function partidas()
    {
        return $this->hasMany(Partida::class, 'user_id');
    }

    // 🔹 Relación con ranking
    public function ranking()
    {
        return $this->hasOne(Ranking::class, 'user_id');
    }

    // 🔹 Relación con puntuaciones
    public function puntuaciones()
    {
        return $this->hasMany(Puntuacion::class, 'user_id');
    }
}
