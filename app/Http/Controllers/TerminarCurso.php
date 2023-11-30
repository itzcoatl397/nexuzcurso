<?php

namespace App\Http\Controllers;

use App\Models\Terminacion;
use Illuminate\Http\Request;

class TerminarCurso extends Controller
{
    //

    public function store(Request $request,$id){
        if ($request->hasFile('fondo')  ) {
            # code...
            $file_fondo =  $request->file('fondo');
            $path_fondo = 'images/imagenes_bloques/';
            $fileName_fondo = time() . '-' . $file_fondo->getClientOriginalName();
            $uploadSuccess = $request->file('fondo')->move($path_fondo, $fileName_fondo);


            Terminacion::create([
                'nombre_archivo' => $file_fondo,
                'image_path' => $path_fondo . $fileName_fondo,
                'texto1' => $request->text_1,
                'texto2' => $request->text_2,
                'texto3'=> $request->text_3,

                'curso_id' => $id
            ]);
            return back();
        }
    }
}
