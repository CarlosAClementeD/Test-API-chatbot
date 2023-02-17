<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PreguntaSimilar;

class Preguntas extends Model
{
    use HasFactory;

    protected $table = 'preguntas';

    protected $fillable = ['pregunta', 'respuesta'];

    public function pregunta_similar() {
        return $this->hasMany( PreguntaSimilar::class, 'id','id_preguntas');
    }
}


