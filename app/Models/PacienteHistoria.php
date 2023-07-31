<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PacienteHistoria extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo',
        'fecha_consulta',
        'motivo_consulta',
        'paciente_id',
        'user_id',
    ];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'paciente_id');
    }

    public function usuarios()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
