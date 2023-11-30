<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemasCursos extends Model
{
    use HasFactory;
    protected $table = 'temas_cursos';
    protected $fillable = [
        'nombre_tema',
        'descripcion',
        'curso_id',

    ];


    public function cursos()
    {
        return $this->hasMany(Cursos::class, 'categoria_id');
    }

    public function imagen()
    {
        return $this->belongsTo(imagenBloque::class, 'tema_id');
    }
    public function pdf()
    {
        return $this->belongsTo(PDF::class, 'tema_id');
    }

    public function video()
    {
        return $this->belongsTo(Video::class, 'tema_id');
    }
    public function texto()
    {
        return $this->belongsTo(texto::class, 'tema_id');
    }

}
