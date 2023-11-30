<?php

namespace App\Http\Controllers;

use App\Models\IdiomaModel;
use Illuminate\Http\Request;

class IdiomasController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function  create(Request $request)
    {

        IdiomaModel::create([
            'nombre'=>$request->idioma
        ]);
        return back();

    }
}
