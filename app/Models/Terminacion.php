<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Terminacion extends Model
{
    use HasFactory;
    protected $table = 'terminacion_curso';
    protected $fillable = [
    'nombre_archivo',
    'image_path',
    'texto1',
    'texto2',
    'texto3',
    'curso_id',
];

public function cursos()
    {
        return $this->hasMany(Cursos::class, 'categoria_id');
    }
}
