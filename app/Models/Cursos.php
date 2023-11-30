<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cursos extends Model
{
    use HasFactory;
    protected $table = 'cursos';
    protected $fillable = [
        'id',
        'nombre_curso',
        'descripcion_curso',
        'nombre_archivo',
        'image_path',
        'categoria_id',
        'visible',


    ];

    public function categoriaCurso()
    {
        return $this->belongsTo(CategoriaCurso::class, 'categoria_id');
    }

    public function puntos()
    {
        return $this->belongsTo(Puntos::class, 'cursos_id');
    }


    public function reconocimiento()
    {
        return $this->belongsTo(Reconocimiento::class, 'cursos_id');
    }

    public function terminacion()
    {
        return $this->belongsTo(Terminacion::class, 'cursos_id');
    }

    public function asignarCursos()
    {
        return $this->belongsTo(AsignarCurso::class, 'curso_id');
    }

}
