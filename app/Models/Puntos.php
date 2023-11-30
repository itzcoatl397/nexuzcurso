<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Puntos extends Model
{
    use HasFactory;

    protected $table = 'puntos';
    protected $fillable = [

        'puntos',
        'curso_id'
    ];




    public function cursos()
    {
        return $this->hasMany(Cursos::class, 'curso_id');
    }
}
