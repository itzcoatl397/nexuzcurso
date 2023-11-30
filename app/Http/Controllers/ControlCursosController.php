<?php

namespace App\Http\Controllers;

use App\Models\CategoriasCursos;
use App\Models\Cursos;
use App\Models\Reconocimiento;
use App\Models\TemasCursos;
use App\Models\Terminacion;
use Illuminate\Http\Request;

class ControlCursosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function  index()
    {
         $categoria = CategoriasCursos::all();

         $temasCursos= TemasCursos::all();
         $altaCurso = Cursos::all();
         $reconocimiento = Reconocimiento::all();
         $terminacion = Terminacion::all();


        return view('controlCursos',[
            'categorias'=> $categoria,
            'altaCursos'=> $altaCurso,
            'temasCursos'=>$temasCursos,
            'reconocimiento'=>$reconocimiento,
            'terminacion'=>$terminacion


        ]);
    }
    //
}
