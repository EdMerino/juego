<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    use HasFactory;

    protected $fillable = ['categoria', 'dificultad', 'texto'];

    public function respuestas()
    {
        return $this->hasMany(Respuesta::class, 'pregunta_id');
    }
}
