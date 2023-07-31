<?php

namespace Database\Seeders;

use App\Models\PatologiaPiel;
use Illuminate\Database\Seeder;

class PatologiaPielSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $patologia = new PatologiaPiel();
        $patologia->nombre = 'Callos';
        $patologia->save();

        $patologia = new PatologiaPiel();
        $patologia->nombre = 'Verruga';
        $patologia->save();

        $patologia = new PatologiaPiel();
        $patologia->nombre = 'Hiperhidrosis';
        $patologia->save();

        $patologia = new PatologiaPiel();
        $patologia->nombre = 'Callosidad';
        $patologia->save();

        $patologia = new PatologiaPiel();
        $patologia->nombre = 'Herpes';
        $patologia->save();

        $patologia = new PatologiaPiel();
        $patologia->nombre = 'Micosis';
        $patologia->save();

        $patologia = new PatologiaPiel();
        $patologia->nombre = 'Rodetes';
        $patologia->save();
    }
}
