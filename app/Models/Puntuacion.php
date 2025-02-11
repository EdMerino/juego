<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Puntuacion extends Model
{
    use HasFactory;

    protected $table = 'puntuaciones'; // 🔥 Especifica el nombre correcto de la tabla

    protected $fillable = ['user_id', 'puntos'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
