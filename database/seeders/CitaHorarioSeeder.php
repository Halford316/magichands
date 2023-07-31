<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CitaHorario;

class CitaHorarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $horario = new CitaHorario();
        $horario->hora = '08:00';
        $horario->save();

        $horario = new CitaHorario();
        $horario->hora = '08:30';
        $horario->save();

        $horario = new CitaHorario();
        $horario->hora = '09:00';
        $horario->save();

        $horario = new CitaHorario();
        $horario->hora = '09:30';
        $horario->save();

        $horario = new CitaHorario();
        $horario->hora = '10:00';
        $horario->save();

        $horario = new CitaHorario();
        $horario->hora = '10:30';
        $horario->save();

        $horario = new CitaHorario();
        $horario->hora = '11:00';
        $horario->save();

        $horario = new CitaHorario();
        $horario->hora = '11:30';
        $horario->save();

        $horario = new CitaHorario();
        $horario->hora = '12:00';
        $horario->save();

        $horario = new CitaHorario();
        $horario->hora = '12:30';
        $horario->save();

        $horario = new CitaHorario();
        $horario->hora = '13:00';
        $horario->save();

        $horario = new CitaHorario();
        $horario->hora = '13:30';
        $horario->save();

        $horario = new CitaHorario();
        $horario->hora = '14:00';
        $horario->save();

        $horario = new CitaHorario();
        $horario->hora = '14:30';
        $horario->save();

        $horario = new CitaHorario();
        $horario->hora = '15:00';
        $horario->save();

        $horario = new CitaHorario();
        $horario->hora = '15:30';
        $horario->save();

        $horario = new CitaHorario();
        $horario->hora = '16:00';
        $horario->save();

        $horario = new CitaHorario();
        $horario->hora = '16:30';
        $horario->save();

        $horario = new CitaHorario();
        $horario->hora = '17:00';
        $horario->save();

        $horario = new CitaHorario();
        $horario->hora = '17:30';
        $horario->save();
    }
}
