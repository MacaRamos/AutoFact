<?php

namespace App\Models\Pregunta;

use Illuminate\Database\Eloquent\Model;

class Alternativa extends Model
{
    //alternativas
    protected $table = 'alternativas';
    protected $fillable = [
        'id',
        'descripcion'
    ];
}
