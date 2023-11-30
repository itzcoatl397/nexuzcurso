<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsignarCurso extends Model
{
    use HasFactory;

    protected $table = 'cursos_asignacion'; // Reemplaza 'nombre_de_tu_tabla' con el nombre real de tu tabla

    protected $fillable = [
        'user_id',
        'curso_id',
        'fecha_vigencia',
    ];

   


    public function cursos()
    {
        return $this->hasMany(Cursos::class, 'id');
    }

    public function users()
    {
        return $this->hasMany(User::class, 'id');
    }


}
