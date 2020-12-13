<?php

namespace App\Http\Controllers;

use App\Models\Pregunta\Pregunta;
use Illuminate\Http\Request;
use App\Models\Pregunta\RespuestaMes;
use DateTime;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $fecha = new DateTime();
        $fecha->modify('first day of this month');

        if (Auth::user()->roles[0]->id == 1) {
            $respuestasTotales = RespuestaMes::where('fecha', '>=', $fecha->format('Y-m-d'))->where('pregunta_id', 2)->with('pregunta.alternativas.alternativa')->get();
            
            $querySi = RespuestaMes::where('fecha', '>=', $fecha->format('Y-m-d'))
                ->where('pregunta_id', 2)
                ->where('alternativa_id', 1)->count();
   
            $respuestasSi = ($querySi * 100) / count($respuestasTotales);
           
            $queryNo = RespuestaMes::where('fecha', '>=', $fecha->format('Y-m-d'))
                ->where('pregunta_id', 2)
                ->where('alternativa_id', 2)->count();
            $respuestasNo = ($queryNo * 100) / count($respuestasTotales);

            $queryMasOMenos = RespuestaMes::where('fecha', '>=', $fecha->format('Y-m-d'))
            ->where('pregunta_id', 2)
            ->where('alternativa_id', 3)->count();
            $respuestasMasOMenos = ($queryMasOMenos * 100) / count($respuestasTotales);

        
            return view('home', compact('respuestasSi', 'respuestasNo', 'respuestasMasOMenos'));
        } else {
            $respuestas = RespuestaMes::where('fecha', '>=', $fecha->format('Y-m-d'))->with('pregunta.alternativas.alternativa')->get();
            $preguntas = Pregunta::with('alternativas.alternativa')->get();
            return view('home', compact('preguntas', 'respuestas'));
        }
        // dd($respuestas);

    }

    public function guardarRespuestas(Request $request)
    {
        if (isset($request->respuesta)) {
            foreach ($request->respuesta as $key => $resp) {
                $pregunta = Pregunta::find($request->pregunta[$key]);
                $respuesta = new RespuestaMes;
                $respuesta->fecha = date('Y-m-d');
                $respuesta->usuario_id = 2;
                $respuesta->pregunta_id = $request->pregunta[$key];
                if ($pregunta->tipo_id == 2) {
                    $respuesta->alternativa_id = $resp;
                } else {
                    $respuesta->respuesta = $resp;
                }

                $respuesta->save();
            }

            $notificacion = array(
                'mensaje' => 'Respuesta guardada con éxito',
                'tipo' => 'success',
                'titulo' => 'Questionario'
            );
            return redirect('/home')->with($notificacion);
        } else {
            $notificacion = array(
                'mensaje' => 'Respuestas vacías',
                'tipo' => 'error',
                'titulo' => 'Questionario'
            );
            return redirect('/home')->with($notificacion);
        }
    }
}
