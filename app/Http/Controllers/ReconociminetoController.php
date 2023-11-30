<?php

namespace App\Http\Controllers;

use App\Models\Reconocimiento;
use Illuminate\Http\Request;

class ReconociminetoController extends Controller
{
    //

    public function store (Request $request,$id){
        if ($request->hasFile('fondo')  && $request->hasFile('pie_pagina') && $request->hasFile('encabezado') ) {
            # code...
            $file_fondo =  $request->file('fondo');
            $path_fondo = 'images/imagenes_bloques/';
            $fileName_fondo = time() . '-' . $file_fondo->getClientOriginalName();
            $uploadSuccess = $request->file('fondo')->move($path_fondo, $fileName_fondo);

            $file_encabezado =  $request->file('encabezado');
            $path_encabezado = 'images/imagenes_bloques/';
            $fileName_encabezado = time() . '-' . $file_encabezado->getClientOriginalName();
            $uploadSuccess = $request->file('encabezado')->move($path_encabezado, $fileName_encabezado);


            $file_pie_pagina =  $request->file('pie_pagina');
            $path_pie_pagina = 'images/imagenes_bloques/';
            $fileName_pie_pagina = time() . '-' . $file_pie_pagina->getClientOriginalName();
            $uploadSuccess = $request->file('pie_pagina')->move($path_pie_pagina, $fileName_pie_pagina);

            Reconocimiento::create([
                'nombre_archivo_fondo' => $file_fondo,
                'image_path_fondo' => $path_fondo . $fileName_fondo,
                'nombre_archivo_pie' => $file_pie_pagina,
                'image_path_pie' => $path_pie_pagina . $fileName_pie_pagina,
                'nombre_archivo_encabezado' =>$file_pie_pagina,
                'image_path_encabezado'=> $path_encabezado . $fileName_encabezado,
                'texto1' => $request->text_1,
                'texto2' => $request->text_2,
                'texto3'=> $request->text_3,
                'texto4'=> $request->text_4,
                'texto5'=> $request->text_5,
                'curso_id' => $id
            ]);
            return back();
        }
    }
}
