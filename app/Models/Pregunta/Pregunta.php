<?php

namespace App\Models\Pregunta;

use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    //preguntas
    protected $table = 'preguntas';
    protected $fillable = [
        'id',
        'descripcion',
        'tipo_id'
    ];

    public function tipo(){
        return $this->hasOne(TipoPregunta::class, 'id', 'tipo_id');
    }

    public function alternativas(){
        return $this->hasMany(AlternativaPregunta::class, 'pregunta_id', 'id');
    }
}
