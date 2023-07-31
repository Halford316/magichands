<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PacienteHistoriaDeformidadDedo extends Model
{
    use HasFactory;

    protected $fillable = [
        'deformidad_dedo_id',
        'dedo',
        'pie',
        'paciente_historia_id'
    ];

    public function deformidad_dedo()
    {
        return $this->belongsTo(DeformidadDedo::class, 'deformidad_dedo_id');
    }

    public function historia()
    {
        return $this->belongsTo(PacienteHistoria::class, 'paciente_historia_id');
    }

}
