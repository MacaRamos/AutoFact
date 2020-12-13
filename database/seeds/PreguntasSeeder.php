<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PreguntasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $preguntas = [
            [1, '¿Qué te gustaría que agregaramos al informe?', 1],
            [2, '¿La información es correcta?', 2],
            [3, 'Del 1 al 5, ¿Es rápido el sitio?', 2]
        ];
        
        $preguntas = array_map(function($pregunta) {
            return [
                'id' => $pregunta[0],
                'descripcion' => $pregunta[1],
                'tipo_id' => $pregunta[2],
                'created_at' => Carbon::now()->format('d-m-y h:i:s'),
                'updated_at' => Carbon::now()->format('d-m-y h:i:s')
            ];
        }, $preguntas);
        
        DB::table('preguntas')->insert($preguntas);
    }
}
