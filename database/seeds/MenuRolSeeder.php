<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuRolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $MenusRol = [
            [1, 1],
            [2, 2]
        ];
        
        $MenusRol = array_map(function($menuRol) {
            return [
                'rol_id' => $menuRol[0],
                'menu_id' => $menuRol[1]
            ];
        }, $MenusRol);
        
        DB::table('menus_rol')->insert($MenusRol);
    }
}
