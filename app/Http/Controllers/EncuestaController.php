<?php

namespace App\Http\Controllers;

use App\Models\Encuesta;
use Illuminate\Http\Request;

class EncuestaController extends Controller
{



    public  function store (Request $request , $id) {


        $resultado = Encuesta::create([
            'curso_id' => $id, // Reemplaza el valor con el ID del curso correspondiente
            'calificacion' => $request->calificacion, // Ejemplo de calificación
            'recomendar' => $request->recomendar, // Ejemplo de recomendación
            'interes_otro_curso' => $request->interesOtroCurso, // Ejemplo de interés en otro curso
            'comentario' => $request->comentario, // Ejemplo de comentario
        ]);

        return back();
    }
}
