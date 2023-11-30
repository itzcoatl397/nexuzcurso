<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    use HasFactory;

    protected $table = 'imagen_temas';
    protected $fillable = [
        'nombre_archivo_imagen',
        'path_imagen',
        'tema_id'
    ];


    public function temaCursos()
    {
        return $this->hasMany(TemasCursos::class, 'tema_id');
    }
}
