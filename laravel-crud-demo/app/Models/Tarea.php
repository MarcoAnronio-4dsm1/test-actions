<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    use HasFactory;

    protected $table = 'tareas';

    protected $fillable = [
        'titulo',
        'descripcion',
        'estado',
    ];

    const ESTADOS = [
        'pendiente' => 'Pendiente',
        'en_progreso' => 'En progreso',
        'completada' => 'Completada',
    ];
}
