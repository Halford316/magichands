<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultorio extends Model
{
    use HasFactory;

    protected $fillable = [
        'local_id',
        'nombre',
    ];

    public function local()
    {
        return $this->belongsTo(Local::class, 'local_id');
    }
}
