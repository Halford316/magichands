<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PacienteHistoriaEvaluacionPiel extends Model
{
    use HasFactory;

    protected $fillable = [
        'patologia_piel_id',
        'paciente_historia_id'
    ];

    public function patologia_pie()
    {
        return $this->belongsTo(PatologiaPiel::class, 'patologia_piel_id');
    }

    public function historia()
    {
        return $this->belongsTo(PacienteHistoria::class, 'paciente_historia_id');
    }

}
