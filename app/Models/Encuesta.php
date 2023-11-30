<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Encuesta extends Model
{
    use HasFactory;

    protected $fillable = [
        'curso_id',
        'calificacion',
        'recomendar',
        'interes_otro_curso',
        'comentario',
    ];

    // Definir la relación con el modelo Curso (una encuesta pertenece a un curso)
    public function curso()
    {
        return $this->belongsTo(Cursos::class);
    }
}
