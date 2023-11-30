<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    use HasFactory;

    protected $table = 'usuarios';

protected $fillable = [
    'nombre',
    'email',
    'telefonp',
    'password',
    'status',
    'texto1',
    'texto2',
    'texto3',
    'texto4',
    'texto5',
    'pais',
    'idioma'
];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
