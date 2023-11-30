<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Texto extends Model
{
    use HasFactory;
    protected $table = 'TEXTO_temas';
    protected $fillable = [
        'texto',
        'tema_id',
    ];


    public function temaCursos()
    {
        return $this->hasMany(TemasCursos::class, 'tema_id');
    }
}
