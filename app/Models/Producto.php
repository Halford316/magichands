<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipo',
        'nombre',
        'descripcion',
        'codigo',
        'costo',
        'precio_venta',
        'cantidad'
    ];

}
