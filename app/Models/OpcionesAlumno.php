<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpcionesAlumno extends Model
{
    use HasFactory;

    protected $table = 'opciones_menu_alumno';

    protected $fillable = ['opcion', 'respuesta','nextstep'];
}
