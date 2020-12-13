<?php

namespace App\Http\Controllers\Preguntas;

use App\Http\Controllers\Controller;
use App\Models\Pregunta\RespuestaMes;
use App\Models\Preguntas\Pregunta;
use Illuminate\Http\Request;

class PreguntaController extends Controller
{
    public function index(){
        $respuesta = RespuestaMes::where('fecha', '>=', date('Y-m-d'))->with('pregunta', 'alternativa')->orderBy('id', 'desc')->first();

        $preguntas = Pregunta::with('alternativas')->get();
        dd($preguntas);
        return view('home', compact('preguntas', 'respuesta'));
    }
}
