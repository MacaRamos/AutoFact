<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(MenuSeeder::class);
        $this->call(MenuRolSeeder::class);
        $this->call(UserRolSeeder::class);
        $this->call(TipoPreguntaSeeder::class);
        $this->call(AlternativasSeeder::class);
        $this->call(PreguntasSeeder::class);
        $this->call(AlternativasPreguntasSeeder::class);
        
    }
}
