<?php

namespace App\Models\Pregunta;

use Illuminate\Database\Eloquent\Model;

class TipoPregunta extends Model
{
    //tipo_pregunta
    protected $table = 'tipo_pregunta';
    protected $fillable = [
        'id',
        'descripcion'
    ];
}
