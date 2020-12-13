<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menus = [
            [0, 'Envíos', '#', 'fas fa-list-ul'],
            [0, 'Mis Respuestas', '#', 'fas fa-list-ul']
        ];
        
        $menus = array_map(function($menu) {
            return [
                'menu_anterior' =>  $menu[0],
                'nombre' => $menu[1],
                'url' => $menu[2],
                'icono' => $menu[3],
            ];
        }, $menus);
        
        DB::table('menus')->insert($menus);
    }
}
