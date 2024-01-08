<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    use HasFactory;

    // Especifica los campos que pueden ser asignados masivamente
    protected $fillable = [
        'fecha',
        'entrada',
        'salida',
        'estado',
    ];
}
