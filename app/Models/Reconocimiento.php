<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reconocimiento extends Model
{
    use HasFactory;

    protected $table = 'reconicimiento_curso';

protected $fillable = [
    'nombre_archivo_fondo',
    'image_path_fondo',
    'nombre_archivo_pie',
    'image_path_pie',
    'nombre_archivo_encabezado',
    'image_path_encabezado',
    'texto1',
    'texto2',
    'texto3',
    'texto4',
    'texto5',
    'curso_id',
];

public function cursos()
    {
        return $this->hasMany(Cursos::class, 'categoria_id');
    }
}
