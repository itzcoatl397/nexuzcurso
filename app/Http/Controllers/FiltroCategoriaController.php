<?php

namespace App\Http\Controllers;

use App\Models\Cursos;
use App\Models\TemasCursos;

use Illuminate\Http\Request;
use App\Models\CategoriasCursos;

class FiltroCategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */



    /**
     * Store a newly created resource in storage.
     */


    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        //

        $categoria_id = $request->input('categoria_id');

        $altaCursoQuery = Cursos::query();
        $categoria = CategoriasCursos::all();
        $temasCursos= TemasCursos::all();

        if (!empty($categoria_id)) {
            $altaCursoQuery->where('categoria_id', $categoria_id);
        }

        $altaCurso = $altaCursoQuery->get();

        return view('controlCursos', [
            'categorias' => $categoria,
            'altaCursos' => $altaCurso,
            'temasCursos'=>$temasCursos
        ]);


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
