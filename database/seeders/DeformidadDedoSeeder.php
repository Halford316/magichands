<?php

namespace Database\Seeders;

use App\Models\DeformidadDedo;
use Illuminate\Database\Seeder;

class DeformidadDedoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $deformidad = new DeformidadDedo();
        $deformidad->nombre = 'Dedos martillo';
        $deformidad->save();

        $deformidad = new DeformidadDedo();
        $deformidad->nombre = 'Dedos en garra';
        $deformidad->save();

        $deformidad = new DeformidadDedo();
        $deformidad->nombre = 'Dedo amputado';
        $deformidad->save();

        $deformidad = new DeformidadDedo();
        $deformidad->nombre = 'Hallux valgus';
        $deformidad->save();

        $deformidad = new DeformidadDedo();
        $deformidad->nombre = 'Juanetillo';
        $deformidad->save();
    }
}
