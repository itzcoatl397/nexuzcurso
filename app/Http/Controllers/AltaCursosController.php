<?php

namespace App\Http\Controllers;

use App\Models\Cursos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AltaCursosController extends Controller
{
    //
    public function store(Request $request)
    {

        if ($request->hasFile('featured')) {
            # code...

            $file =  $request->file('featured');
            $path = 'images/imagenes_cursos/';
            $fileName = time() . '-' . $file->getClientOriginalName();
            $uploadSuccess = $request->file('featured')->move($path, $fileName);

            Cursos::create([
                'nombre_curso' => $request->nombre_curso,
                'descripcion_curso' => $request->descripcion,
                'categoria_id' => $request->categoria_id,

                'nombre_archivo' =>  $fileName,
                'image_path' => $path . $fileName,    'visible' => 0,

            ]);

            return redirect()->route('filtro-categoria');
        }
    }

    public function update(Request $request, $id)
    {

        if ($request->hasFile('featured')) {
            # code...

            $file =  $request->file('featured');
            $path = 'images/imagenes_cursos/';
            $fileName = time() . '-' . $file->getClientOriginalName();
            $uploadSuccess = $request->file('featured')->move($path, $fileName);


            $update = DB::table('cursos')->where('id', $id)->update(

                [
                    'nombre_curso' => $request->nombre,
                    'descripcion_curso' => $request->descripcion,
                    'nombre_archivo' =>  $fileName,
                    'image_path' => $path . $fileName,
                    'visible' => 0,
                ]

            );
        } else {
            $update = DB::table('cursos')->where('id', $id)->update(

                [
                    'nombre_curso' => $request->nombre,
                    'descripcion_curso' => $request->descripcion,
                    'visible' => 0,


                ]

            );
        }


        return redirect()->route('dashboard.controlCursos');
    }


    public function destroy($id)
    {


        $delte_categoria = DB::table('cursos')->where('id', $id)->delete();

        return redirect()->route('dashboard.controlCursos');
    }
}
