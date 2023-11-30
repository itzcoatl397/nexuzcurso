<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
    protected $table = 'video_temas';
    protected $fillable = [
        'video',
        'tema_id',
    ];


    public function temaCursos()
    {
        return $this->hasMany(TemasCursos::class, 'tema_id');
    }
}
