<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VisibleController extends Controller
{
    //

    public function update(Request $request , $id) {


        $data = extract($request->all());
        DB::table('cursos')->where('id',$id)->update(['visible'=>$data]);
        return $data;

    }
    public function update2(Request $request , $id2) {
        $data2 = extract($request->all());
        DB::table('cursos')->where('id',$id2)->update(['visible'=>$data2]);


        return $data2 ;

    }
}
