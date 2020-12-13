<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TipoPreguntaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipos = [
            [1, 'texto'],
            [2, 'alternativas']
        ];
        
        $tipos = array_map(function($tipo) {
            return [
                'id' => $tipo[0],
                'descripcion' => $tipo[1],
                'created_at' => Carbon::now()->format('d-m-y h:i:s'),
                'updated_at' => Carbon::now()->format('d-m-y h:i:s')
            ];
        }, $tipos);
        
        DB::table('tipo_pregunta')->insert($tipos);
    }
}
