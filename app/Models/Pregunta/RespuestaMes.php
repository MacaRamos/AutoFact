<?php

namespace App\Models\Pregunta;

use App\User;
use Illuminate\Database\Eloquent\Model;

class RespuestaMes extends Model
{
    //respuestas_mes
    protected $table = 'respuestas_mes';
    protected $fillable = [
        'id',
        'fecha',
        'usuario_id',
        'pregunta_id',
        'respuesta',
        'alternativa_id'
    ];

    public function usuario(){
        return $this->hasOne(User::class, 'id', 'usuario_id');
    }

    public function pregunta(){
        return $this->hasOne(Pregunta::class, 'id', 'pregunta_id');
    }

    public function alternativa(){
        return $this->hasOne(Alternativa::class, 'id', 'alternativa_id');
    }
}
