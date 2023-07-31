<?php

namespace Database\Seeders;

use App\Models\Consultorio;
use Illuminate\Database\Seeder;

class ConsultorioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $consultorio = new Consultorio();
        $consultorio->nombre = 'Consultorio 1';
        $consultorio->local_id = '1';
        $consultorio->save();

        $consultorio = new Consultorio();
        $consultorio->nombre = 'Consultorio 2';
        $consultorio->local_id = '1';
        $consultorio->save();

        $consultorio = new Consultorio();
        $consultorio->nombre = 'Consultorio 3';
        $consultorio->local_id = '1';
        $consultorio->save();

        $consultorio = new Consultorio();
        $consultorio->nombre = 'Consultorio 4';
        $consultorio->local_id = '1';
        $consultorio->save();

        $consultorio = new Consultorio();
        $consultorio->nombre = 'Consultorio 5';
        $consultorio->local_id = '2';
        $consultorio->save();

        $consultorio = new Consultorio();
        $consultorio->nombre = 'Consultorio 6';
        $consultorio->local_id = '2';
        $consultorio->save();

        $consultorio = new Consultorio();
        $consultorio->nombre = 'Consultorio 7';
        $consultorio->local_id = '2';
        $consultorio->save();

        $consultorio = new Consultorio();
        $consultorio->nombre = 'Consultorio 8';
        $consultorio->local_id = '2';
        $consultorio->save();

        $consultorio = new Consultorio();
        $consultorio->nombre = 'Consultorio 9';
        $consultorio->local_id = '3';
        $consultorio->save();

        $consultorio = new Consultorio();
        $consultorio->nombre = 'Consultorio 10';
        $consultorio->local_id = '3';
        $consultorio->save();

        $consultorio = new Consultorio();
        $consultorio->nombre = 'Consultorio 11';
        $consultorio->local_id = '3';
        $consultorio->save();

        $consultorio = new Consultorio();
        $consultorio->nombre = 'Consultorio 12';
        $consultorio->local_id = '3';
        $consultorio->save();

        $consultorio = new Consultorio();
        $consultorio->nombre = 'Consultorio 13';
        $consultorio->local_id = '4';
        $consultorio->save();

        $consultorio = new Consultorio();
        $consultorio->nombre = 'Consultorio 14';
        $consultorio->local_id = '4';
        $consultorio->save();

        $consultorio = new Consultorio();
        $consultorio->nombre = 'Consultorio 15';
        $consultorio->local_id = '4';
        $consultorio->save();

        $consultorio = new Consultorio();
        $consultorio->nombre = 'Consultorio 15';
        $consultorio->local_id = '4';
        $consultorio->save();

    }
}
