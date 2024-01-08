<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Justificacion extends Model
{
    use HasFactory;

    // Especifica el nombre de la tabla asociada al modelo
    protected $table = 'justificaciones';

    // Especifica los campos que pueden ser asignados masivamente
    protected $fillable = ['nombre', 'motivo', 'evidencia'];
}
