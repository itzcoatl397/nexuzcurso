<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriasCursos extends Model
{
    use HasFactory;
    protected $table = 'categoria_cursos';

    protected $fillable = [
        'nombre_categoria',
        'descripcion_categoria',
        'nombre_archivo',
        'image_path',


    ];

    public function cursos()
    {
        return $this->hasMany(Cursos::class, 'categoria_id');
    }
}
