<?php

namespace App\Http\Controllers;

use App\Models\BloqueTemas;
use Illuminate\Http\Request;

class ImagenTemaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,$id)

    {

        if ($request->hasFile('imagen')) {
            # code...
            $file =  $request->file('imagen');
            $path = 'images/imagenes_bloques/';
            $fileName = time() . '-' . $file->getClientOriginalName();
            $uploadSuccess = $request->file('imagen')->move($path, $fileName);
            BloqueTemas::create([
                'nombre_archivo_imagen' => $fileName,
                'path_imagen' => $path . $fileName,
                'tema_id' => $id
            ]);
            return back();

        }

    }



}
