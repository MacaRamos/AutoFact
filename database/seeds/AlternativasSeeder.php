<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AlternativasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $alternativas = [
            [1, 'sí'],
            [2, 'no'],
            [3, 'más o menos'],
            [4, '1'],
            [5, '2'],
            [6, '3'],
            [7, '4'],
            [8, '5']
        ];
        
        $alternativas = array_map(function($alternativa) {
            return [
                'id' => $alternativa[0],
                'descripcion' => $alternativa[1],
                'created_at' => Carbon::now()->format('d-m-y h:i:s'),
                'updated_at' => Carbon::now()->format('d-m-y h:i:s')
            ];
        }, $alternativas);
        
        DB::table('alternativas')->insert($alternativas);
    }
}
