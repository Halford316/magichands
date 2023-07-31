<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    protected $fillable = [
        'ape_paterno',
        'ape_materno',
        'nombres',
        'dni',
        'celular',
        'email',
        'direccion',
        'sexo',
        'fecha_nac',
        'estado_civil',
        'talla',
        'peso',
        'presion_arterial',
        'ocupacion'
    ];

}
