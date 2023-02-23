<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpcionesAspirante extends Model
{
    use HasFactory;

    protected $table = 'opciones_menu_aspirante';

    protected $fillable = ['opcion', 'respuesta','nextstep'];

}
