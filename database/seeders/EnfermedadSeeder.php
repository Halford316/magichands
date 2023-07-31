<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EnfermedadAntecedente;

class EnfermedadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $enfermedad = new EnfermedadAntecedente();
        $enfermedad->nombre = 'Diabetes';
        $enfermedad->save();

        $enfermedad = new EnfermedadAntecedente();
        $enfermedad->nombre = 'Glaucoma';
        $enfermedad->save();

        $enfermedad = new EnfermedadAntecedente();
        $enfermedad->nombre = 'Hipertensión';
        $enfermedad->save();

        $enfermedad = new EnfermedadAntecedente();
        $enfermedad->nombre = 'TBC';
        $enfermedad->save();

        $enfermedad = new EnfermedadAntecedente();
        $enfermedad->nombre = 'Hemiplejia';
        $enfermedad->save();

        $enfermedad = new EnfermedadAntecedente();
        $enfermedad->nombre = 'Epilepsia';
        $enfermedad->save();

        $enfermedad = new EnfermedadAntecedente();
        $enfermedad->nombre = 'Alergias';
        $enfermedad->save();

        $enfermedad = new EnfermedadAntecedente();
        $enfermedad->nombre = 'Asma';
        $enfermedad->save();

        $enfermedad = new EnfermedadAntecedente();
        $enfermedad->nombre = 'Artritis';
        $enfermedad->save();

        $enfermedad = new EnfermedadAntecedente();
        $enfermedad->nombre = 'Otro';
        $enfermedad->save();
    }
}
