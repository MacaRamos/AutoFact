<?php

namespace App\Models\Pregunta;

use Illuminate\Database\Eloquent\Model;

class AlternativaPregunta extends Model
{
    //alternativas_preguntas
    protected $table = 'alternativas_preguntas';
    protected $fillable = [
        'id',
        'pregunta_id',
        'alternativa_id'
    ];

    public function alternativa(){
        return $this->hasOne(Alternativa::class, 'id', 'alternativa_id');
    }
}
