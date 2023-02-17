<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Preguntas;

class PreguntaSimilar extends Model
{
    use HasFactory;
    protected $table = 'preguntas_similares';

    protected $fillable = ['pregunta','id_preguntas'];

    public function pregunta() {
        return $this->hasOne( Preguntas::class, 'id','id_preguntas');
    }


}
