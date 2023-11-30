<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //

    public function index(){
        return view('auth/login');
    }
    public function store(Request $request){



        $this->validate($request,[

            'email'=>'required',
            'password' => 'required|',

        ]);





      if (!auth()->attempt($request->only('email','password'))) {
        # code...


        return back()->with('mensaje',"Usio o contraseña incorrecto");
      }
      return redirect()->route('dashboard.index');
    }
}