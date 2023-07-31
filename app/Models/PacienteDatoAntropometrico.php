<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PacienteDatoAntropometrico extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipo_calzado',
        'nro_calzado',
        'nro_taco',
        'deporte',
        'arco_pie',
        'tipo',
        'paciente_id'
    ];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'paciente_id');
    }
}
