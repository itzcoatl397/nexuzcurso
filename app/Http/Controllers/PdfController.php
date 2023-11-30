<?php

namespace App\Http\Controllers;

use App\Models\PDF;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    //
    public function store (Request $request,$id ){


        if ($request->hasFile('pdf')) {
            # code...
            $file =  $request->file('pdf');
            $path = 'pdfs/';
            $fileName = time() . '-' . $file->getClientOriginalName();
            $uploadSuccess = $request->file('pdf')->move($path, $fileName);
            PDF::create([
                'nombre_archivo_pdf' => $fileName,
                'path_pdf' => $path . $fileName,
                'tema_id' => $id
            ]);

            return back();
        }
        }
}
