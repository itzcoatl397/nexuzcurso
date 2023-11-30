<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //

    public function index(){

        return view('auth/register');
    }

    public function store(Request $request){


        $request ->request->add(['username'=> Str::slug($request->username)]);
        $this->validate($request,[
            'nombre' => 'required|min:5|max:25',
            'username' => 'required|unique:users|min:5',
            'email'=>'required|unique:users|email|max:60',
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required',

        ]);



        User::create([
            'name' =>$request->nombre,
            'username' =>$request->username,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),

        ]);


        return redirect()->route('login');
    }
}
