<?php

namespace App\Http\Controllers;

use App\Models\Puntos;
use Illuminate\Http\Request;

class PuntosController extends Controller
{
    //

    public  function store(Request $request,$id){
        Puntos::create([
            'puntos'=>$request->puntos,
            'curso_id' =>$id
        ]);
        return back();
    }
}
