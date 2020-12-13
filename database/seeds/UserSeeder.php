<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {     

        $users = [
            [1, 'Administrador', 'macarenaarp@gmail.com', 'admin123'],
            [2, 'Usuario', 'cv@autofact.cl', 'usuario123']
        ];
        
        $users = array_map(function($user) {
            return [
                'id' => $user[0],
                'name' => $user[1],
                'email' => $user[2],
                'password' => Hash::make($user[3]),
                'created_at' => Carbon::now()->format('d-m-y h:i:s'),
                'updated_at' => Carbon::now()->format('d-m-y h:i:s')
            ];
        }, $users);
        
        DB::table('users')->insert($users);
    }
}

