<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partida extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'puntaje', 'tiempo_jugado'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
