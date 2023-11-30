<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloqueTemas extends Model
{
    protected $table = 'bloque_temas';
    protected $fillable =[
        'nombre_archivo_imagen',
                    'path_imagen',
                    'nombre_archivo_pdf',
                    'path_pdf',
                    'video',
                    'texto',
                    'tema_id'


    ];

    public function temaCursos()
    {
        return $this->hasMany(TemasCursos::class, 'tema_id');
    }
}
