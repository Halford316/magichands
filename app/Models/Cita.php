<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha',
        'hora_id',
        'tipo_servicio',
        'motivo_consulta',
        'estado',
        'tipo_cita',
        'cita_status',
        'paciente_id',
        'consultorio_id',
        'podologa_id',
        'user_id',
        'forma_pago',
        'proxima_cita',
        'start_date',
        'end_date',
    ];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'paciente_id');
    }

    public function podologa()
    {
        return $this->belongsTo(Podologa::class, 'podologa_id');
    }

    public function consultorio()
    {
        return $this->belongsTo(Consultorio::class, 'consultorio_id');
    }

    public function horario()
    {
        return $this->belongsTo(CitaHorario::class, 'hora_id');
    }

    public function usuarios()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
