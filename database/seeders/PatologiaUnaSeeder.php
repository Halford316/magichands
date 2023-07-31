<?php

namespace Database\Seeders;

use App\Models\PatologiaUna;
use Illuminate\Database\Seeder;

class PatologiaUnaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $patologia = new PatologiaUna();
        $patologia->nombre = 'Anoniquia';
        $patologia->save();

        $patologia = new PatologiaUna();
        $patologia->nombre = 'Onicomicosis';
        $patologia->save();

        $patologia = new PatologiaUna();
        $patologia->nombre = 'Onicorrexis';
        $patologia->save();

        $patologia = new PatologiaUna();
        $patologia->nombre = 'Onicomadesis';
        $patologia->save();

        $patologia = new PatologiaUna();
        $patologia->nombre = 'Microniquia';
        $patologia->save();

        $patologia = new PatologiaUna();
        $patologia->nombre = 'Paquioniquia';
        $patologia->save();

        $patologia = new PatologiaUna();
        $patologia->nombre = 'Línea Beau';
        $patologia->save();

        $patologia = new PatologiaUna();
        $patologia->nombre = 'Onicoatrofia';
        $patologia->save();

        $patologia = new PatologiaUna();
        $patologia->nombre = 'Onicofima';
        $patologia->save();

        $patologia = new PatologiaUna();
        $patologia->nombre = 'Leuconiquia';
        $patologia->save();

        $patologia = new PatologiaUna();
        $patologia->nombre = 'Onicosquizis';
        $patologia->save();

        $patologia = new PatologiaUna();
        $patologia->nombre = 'Onicolisis';
        $patologia->save();

        $patologia = new PatologiaUna();
        $patologia->nombre = 'Onicofagia';
        $patologia->save();

        $patologia = new PatologiaUna();
        $patologia->nombre = 'Melanoniquia';
        $patologia->save();

        $patologia = new PatologiaUna();
        $patologia->nombre = 'Onicogrifosis';
        $patologia->save();

        $patologia = new PatologiaUna();
        $patologia->nombre = 'Onicocriptosis';
        $patologia->save();

        $patologia = new PatologiaUna();
        $patologia->nombre = 'Macroniquia';
        $patologia->save();

        $patologia = new PatologiaUna();
        $patologia->nombre = 'Psoriasis';
        $patologia->save();
    }
}
