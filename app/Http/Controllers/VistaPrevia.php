<?php

namespace App\Http\Controllers;

use App\Models\Reconocimiento;
use Illuminate\Http\Request;

class VistaPrevia extends Controller
{
    //

    public function show (Request $request,$id){

        $reconocimiento =  Reconocimiento::where('id',$id)->get() ;

        return view('vista_previa',[
            'reconocimientos'=>$reconocimiento
        ]);
    }
}
