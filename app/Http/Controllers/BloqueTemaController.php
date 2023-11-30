<?php

namespace App\Http\Controllers;

use App\Models\BloqueTemas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BloqueTemaController extends Controller
{
    //


    public function create(Request $request, $id)
    {



        if ($request->imagen) {
            # code...
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
        } elseif ($request->video) {

            BloqueTemas::create([

                'video' => $request->video,
                'tema_id' => $id
            ]);

            return back();
        }



        elseif ($request->texto) {
            # code...

            BloqueTemas::create([

                'texto' => $request->texto,
                'tema_id' => $id
            ]);

            return back();
        }elseif ($request->pdf) {
            if ($request->hasFile('pdf')) {
                $file = $request->file('pdf');
                $path = 'pdfs/';  // Directorio donde se guardarán los PDF
                $fileName = time() . '-' . $file->getClientOriginalName();
                $uploadSuccess = $file->move($path, $fileName);

                if ($uploadSuccess) {
                    // Aquí puedes guardar información adicional en la base de datos, si es necesario
                    BloqueTemas::create([
                        'nombre_archivo_pdf' =>$fileName,
                        'path_pdf' => $path . $fileName,
                        'tema_id' => $id
                    ]);

                    return back()->with('success', 'PDF subido con éxito');
                }
            }

            return back()->with('error', 'No se ha seleccionado ningún archivo PDF o hubo un problema al cargarlo.');

        }
    }


    public function update(Request $request, $id)
    {



        if ($request->imagen) {
            # code...
            if ($request->hasFile('imagen')) {
                # code...
                $file =  $request->file('imagen');
                $path = 'images/imagenes_bloques/';
                $fileName = time() . '-' . $file->getClientOriginalName();
                $uploadSuccess = $request->file('imagen')->move($path, $fileName);
                DB::table('bloque_temas')->where('id', $id)->update([
                    'nombre_archivo_imagen' => $fileName,
                    'path_imagen' => $path . $fileName,
                ]);

                return back();
            }
        } elseif ($request->video) {

          DB::table('bloque_temas')->where('id', $id)->update([
            'video' => $request->video,

        ]);

            return back();
        }



        elseif ($request->texto) {
            # code...

            DB::table('bloque_temas')->where('id', $id)->update([
                'texto' => $request->texto,

            ]);
            return back();
        }elseif ($request->pdf) {
            if ($request->hasFile('pdf')) {
                $file = $request->file('pdf');
                $path = 'pdfs/';  // Directorio donde se guardarán los PDF
                $fileName = time() . '-' . $file->getClientOriginalName();
                $uploadSuccess = $file->move($path, $fileName);

                if ($uploadSuccess) {
                    // Aquí puedes guardar información adicional en la base de datos, si es necesario

                    DB::table('bloque_temas')->where('id', $id)->update([
                        'nombre_archivo_pdf' => $fileName,
                        'path_pdf' => $path . $fileName,
                    ]);
                    return back()->with('success', 'PDF subido con éxito');
                }
            }

            return back()->with('error', 'No se ha seleccionado ningún archivo PDF o hubo un problema al cargarlo.');

        }
    }

    public function delete (Request $request ,$id){
        DB::table('bloque_temas')->where('id',$id)->delete();
        return back();
    }
}
