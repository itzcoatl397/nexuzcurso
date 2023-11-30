<?php

namespace App\Http\Controllers;

use App\Models\Terminacion;
use Illuminate\Http\Request;

class VistaPrevia2 extends Controller
{
    //

    public function show (Request $request,$id){

        $terminacion =  Terminacion::where('id',$id)->get() ;

        return view('vista_previa2',[
            'terminacion'=>$terminacion
        ]);
    }
}
