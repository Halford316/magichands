<?php

namespace Database\Seeders;

use App\Models\CitaHorario;
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
        // \App\Models\User::factory(10)->create();
        $this->call(PatologiaUnaSeeder::class);
        $this->call(PatologiaPielSeeder::class);
        $this->call(EnfermedadSeeder::class);
        $this->call(DeformidadDedoSeeder::class);
        $this->call(LocalSeeder::class);
        $this->call(ConsultorioSeeder::class);
        $this->call(CitaHorarioSeeder::class);
    }
}
