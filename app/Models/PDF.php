<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PDF extends Model
{
    use HasFactory;

    protected $table = 'pdf_temas';
    protected $fillable = [
        'nombre_archivo_pdf',
        'path_pdf',
        'tema_id'
    ];


    public function temaCursos()
    {
        return $this->hasMany(TemasCursos::class, 'tema_id');
    }
}
