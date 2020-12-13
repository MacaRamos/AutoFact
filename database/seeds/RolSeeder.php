<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            ['Admin'],
            ['Usuario']//recursos humanos
        ];
        
        $roles = array_map(function($rol) {
            return [
                'nombre' => $rol[0]
            ];
        }, $roles);
        
        DB::table('roles')->insert($roles);
    }
}
