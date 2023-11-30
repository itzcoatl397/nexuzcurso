<?php

namespace App\Http\Controllers;

use App\Models\CategoriasCursos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AltaCategoriaController extends Controller
{
    //



    public function store(Request $request)
    {

        if ($request->hasFile('featured')) {
            # code...

            $file =  $request->file('featured');
            $path = 'images/imagenes_categoria/';
            $fileName = time() . '-' . $file->getClientOriginalName();
            $uploadSuccess = $request->file('featured')->move($path, $fileName);

            CategoriasCursos::create([
                'nombre_categoria' => $request->nombre,
                'descripcion_categoria' => $request->descripcion,
                'nombre_archivo' =>  $fileName,
                'image_path' => $path . $fileName
            ]);

            return redirect()->route('dashboard.controlCursos');
        }
    }

    public function update(Request $request, $id)
    {

        if ($request->hasFile('featured')) {
            # code...

            $file =  $request->file('featured');
            $path = 'images/imagenes_categoria/';
            $fileName = time() . '-' . $file->getClientOriginalName();
            $uploadSuccess = $request->file('featured')->move($path, $fileName);


            $update = DB::table('categoria_cursos')->where('id', $id)->update(

                [
                    'nombre_categoria' => $request->nombre,
                    'descripcion_categoria' => $request->descripcion,
                    'nombre_archivo' =>  $fileName,
                    'image_path' => $path . $fileName
                ]

            );
        } else {
            $update = DB::table('categoria_cursos')->where('id', $id)->update(

                [
                    'nombre_categoria' => $request->nombre,
                    'descripcion_categoria' => $request->descripcion,

                ]

            );
        }


        return redirect()->route('dashboard.controlCursos');
    }


    public function destroy($id)
    {


        $delte_categoria = DB::table('categoria_cursos')->where('id', $id)->delete();

        return redirect()->route('dashboard.controlCursos');
    }
}
