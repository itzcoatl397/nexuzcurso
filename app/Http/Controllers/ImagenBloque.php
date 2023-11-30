<?php

namespace App\Http\Controllers;

use App\Models\Imagen;
use Illuminate\Http\Request;

class ImagenBloque extends Controller
{
    //

    public function store (Request $request,$id ){


        if ($request->hasFile('imagen')) {
            # code...
            $file =  $request->file('imagen');
            $path = 'images/imagenes_bloques/';
            $fileName = time() . '-' . $file->getClientOriginalName();
            $uploadSuccess = $request->file('imagen')->move($path, $fileName);
            Imagen::create([
                'nombre_archivo_imagen' => $fileName,
                'path_imagen' => $path . $fileName,
                'tema_id' => $id
            ]);

            return back();
        }
        }
}
