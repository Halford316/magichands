<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PacienteHistoriaEvaluacionUna extends Model
{
    use HasFactory;

    protected $fillable = [
        'patologia_una_id',
        'paciente_historia_id'
    ];

    public function patologia_unas()
    {
        return $this->belongsTo(PatologiaUna::class, 'patologia_una_id');
    }

    public function historia()
    {
        return $this->belongsTo(PacienteHistoria::class, 'paciente_historia_id');
    }

}
