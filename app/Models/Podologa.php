<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Podologa extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipo_contrato',
        'ape_paterno',
        'ape_materno',
        'ape_nombres',
        'dni',
        'telefono',
        'email',
        'direccion',
        'telefono_emergencia',
        'contacto_emergencia',
        'fecha_ingreso',
        'horario_inicio',
        'horario_fin',
        'comision_medicamento',
        'comision_ortesicos',
        'comision_atencion',
        'activo'
    ];

}
