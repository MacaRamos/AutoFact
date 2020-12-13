<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AlternativasPreguntasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $alternativas_preguntas = [
            [1, 2, 1],
            [2, 2, 2],
            [3, 2, 3],
            [4, 3, 4],
            [5, 3, 5],
            [6, 3, 6],
            [7, 3, 7],
            [8, 3, 8]
        ];
        
        $alternativas_preguntas = array_map(function($item) {
            return [
                'id' => $item[0],
                'pregunta_id' => $item[1],
                'alternativa_id' => $item[2],
                'created_at' => Carbon::now()->format('d-m-y h:i:s'),
                'updated_at' => Carbon::now()->format('d-m-y h:i:s')
            ];
        }, $alternativas_preguntas);
        
        DB::table('alternativas_preguntas')->insert($alternativas_preguntas);
    }
}
