<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PacienteHistoriaAntecedente extends Model
{
    use HasFactory;

    protected $fillable = [
        'enfermedad_antecedente_id',
        'otro_detalle',
        'paciente_historia_id'
    ];

    public function enfermedad_antecedente()
    {
        return $this->belongsTo(EnfermedadAntecedente::class, 'enfermedad_antecedente_id');
    }

    public function historia()
    {
        return $this->belongsTo(PacienteHistoria::class, 'paciente_historia_id');
    }

}
