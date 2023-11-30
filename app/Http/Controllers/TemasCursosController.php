<?php

namespace App\Http\Controllers;

use App\Models\TemasCursos;
use App\Models\BloqueTemas;
use App\Models\Reconocimiento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TemasCursosController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function __construct()
     {

    $this->middleware('auth');

     }
    public function index($id)
    {
        //
        $imagenesBloques=BloqueTemas ::all();
      $tema = TemasCursos::where('id',$id)->get() ;


        return view('editTemas',[
            'temas'=> $tema,
            'bloques'=>$imagenesBloques,
           
        ]);
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,$id)
    {

        TemasCursos::create(
            [
                'nombre_tema'=>$request->nombre_tema,
                'descripcion'=>$request->descripcion,
                'curso_id' =>$id,
            ]
            );


            return redirect()->route('dashboard.controlCursos');
    }

    /**
     * Display the specified resource.
     */
    public function show(TemasCursos $temasCursos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TemasCursos $temasCursos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        //

        DB::table('temas_cursos')->where('id',$id)->update(
            [
                'nombre_tema'=>$request->nombre_tema,
                'descripcion'=>$request->descripcion,

            ]
            );
            $tema = TemasCursos::where('id',$id)->get() ;
            return view('editTemas',[
                'temas'=> $tema
            ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TemasCursos $temasCursos)
    {
        //
    }
}
