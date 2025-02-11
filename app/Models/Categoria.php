<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categorias';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['nombre'];

    public function preguntas()
    {
        return $this->hasMany(Pregunta::class, 'categoria_id');
    }
}
