<?php

namespace App\Http\Controllers;

use App\Models\AsignarCurso;
use Illuminate\Http\Request;

class AsignarCursos extends Controller
{
    //

    public function create(Request $request){

        AsignarCurso::create([
            'user_id'=> $request->user_id,
            'curso_id'=> $request->curso_id,
            'fecha_vigencia'=>$request->fecha

        ]);

        return back();

    }
}
