<?php

namespace App\Http\Controllers;

use App\Models\BloqueTemas;
use App\Models\Imagen as ModelsImagen;
use App\Models\User;
use Illuminate\Http\Request;

class Imagen extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(User $user){
    }
}
