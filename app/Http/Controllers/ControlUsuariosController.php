<?php

namespace App\Http\Controllers;

use App\Models\AsignarCurso;
use App\Models\Cursos;
use App\Models\IdiomaModel;
use App\Models\PaisesModel;
use App\Models\User;
use App\Models\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ControlUsuariosController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function  index()


    {

        $paises = PaisesModel::all();
        $idiomas = IdiomaModel ::all();
        $cursos = Cursos::all();

        $curso_asignado  = AsignarCurso::select('cursos.nombre_curso', 'cursos_asignacion.curso_id', 'cursos_asignacion.user_id')
        ->join('cursos', 'cursos.id', '=', 'cursos_asignacion.curso_id')
        ->join('users', 'users.id', '=', 'cursos_asignacion.user_id')
        ->get();


        $usuarios = DB::table('users')->paginate(10);
        return view('altaUsuario',[
            'paises'=>$paises,
            'idiomas'=>$idiomas,
            'usuarios'=>$usuarios,
            'cursos' =>  $cursos,
            'curso_asignado' => $curso_asignado

        ]);
    }

    public function  create(Request $request)
    {
        $estados = $request->input('estado', []);
        $correo = $request->input('correo');
        $password = $request->input('password');
        $telefono = $request->input('telefono');
        $pais = $request->input('pais');
        $idioma = $request->input('idioma');
        $text1 = $request->input('text_1');
        $text2 = $request->input('text_2');
        $text3 = $request->input('text_3');
        $text4 = $request->input('text_4');
        $text5 = $request->input('text_5');
        $nombre = $request->input('nombre');


        foreach ($estados as $estado) {
            User::create([
                'name' => $nombre,

                'telefono' =>$telefono,
                'texto1' => $text1,
                'texto2' => $text2,
                'texto3' => $text3,
                'texto4' => $text4,
                'texto5' => $text5,
                'password'=>$password,
                "pais"=>$pais,
                "idioma"=>$idioma,
                "email"=>$correo,



                'status' => $estado,
            ]);
        }

       return back();

    }

    public function  update(Request $request, $id){
        $estados = $request->input('estado', []);
        $correo = $request->input('correo');
        $password = $request->input('password');
        $telefono = $request->input('telefono');
        $pais = $request->input('pais');
        $idioma = $request->input('idioma');
        $text1 = $request->input('text_1');
        $text2 = $request->input('text_2');
        $text3 = $request->input('text_3');
        $text4 = $request->input('text_4');
        $text5 = $request->input('text_5');
        $nombre = $request->input('nombre');

        foreach ($estados as $estado) {
            User::where('id', $id) // Selecciona el usuario por su ID
                ->update([
                    'name' => $nombre,
                    'telefono' => $telefono,
                    'texto1' => $text1,
                    'texto2' => $text2,
                    'texto3' => $text3,
                    'texto4' => $text4,
                    'texto5' => $text5,
                    'password' => $password,
                    'pais' => $pais,
                    'idioma' => $idioma,
                    'status' => $estado,
                    'email'=>$correo
                ]);
        }

        return back();

    }
}
