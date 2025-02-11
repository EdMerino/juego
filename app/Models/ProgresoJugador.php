<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgresoJugador extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'nivel_actual', 'experiencia'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
