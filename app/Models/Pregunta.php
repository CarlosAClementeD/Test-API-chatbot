<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PreguntaSimilar;

class Pregunta extends Model
{
    use HasFactory;

    protected $table = 'preguntas';

    protected $fillable = ['pregunta', 'respuesta'];

    public function preguntas_similares(){
        return $this->hasMany(PreguntaSimilar::class, 'id_preguntas');
    }
}


