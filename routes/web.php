<?php

use App\Http\Controllers\AltaCategoriaController;
use App\Http\Controllers\AltaCursosController;
use App\Http\Controllers\AsignarCursos;
use App\Http\Controllers\ControlCursosController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FiltroCategoriaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TemasCursosController;
use App\Http\Controllers\BloqueTemaController;
use App\Http\Controllers\ControlUsuariosController;
use App\Http\Controllers\EncuestaController;
use App\Http\Controllers\IdiomasController;
use App\Http\Controllers\Imagen;
use App\Http\Controllers\ImagenBloque;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\PuntosController;
use App\Http\Controllers\TextoController;
use App\Http\Controllers\ReconociminetoController;
use App\Http\Controllers\TerminarCurso;
use App\Http\Controllers\VistaPrevia;
use App\Http\Controllers\VistaPrevia2;
use App\Livewire\FilterCursos;
use App\Models\BloqueTemas;
use App\Models\Encuesta;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', [LoginController::class,'index'])->name('login');
Route::post('/login', [LoginController::class,'store']);

Route::post('/logout', [LogoutController::class,'store'])->name('logout-universal');

Route::get('/register',[RegisterController::class,'index'])->name('register');

Route::post('/register',[RegisterController::class,'store'])->name('register');

Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard.index');



Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard/controlCursos',[ControlCursosController::class,'index'])->name('dashboard.controlCursos');
    Route::post('/dashboard/controlCursos/altaCategoria',[AltaCategoriaController::class,'store'])->name('dashboard.controlCursos.alta');
    Route::delete('/dashboard/controlCursos/altaCategoria/delete/{id}',[AltaCategoriaController::class,'destroy'])->name('dashboard.controlCursos.delete');
    Route::put('/dashboard/controlCursos/altaCategoria/update/{id}',[AltaCategoriaController::class,'update'])->name('dashboard.controlCursos.update');
    Route::post('/dashboard/controlCursos/altaCursos',[AltaCursosController::class,'store']);
    Route::delete('/dashboard/controlCursos/altaCursos/delete/{id}',[AltaCursosController::class,'destroy'])->name('controlCursos.delete_Cursos');
    Route::put('/dashboard/controlCursos/altaCursos/update/{id}',[AltaCursosController::class,'update'])->name('controlCursos.update_cursos');
    Route::post('/dashboard/controlCursos/filtrado',[FiltroCategoriaController::class,'show'])->name('filtro-categoria');
    Route::get('/dashboard/controlCursos/filtrado',[FiltroCategoriaController::class,'show'])->name('filtro-categoria');
    Route::get('/dashboard/controlCursos/editarTemas/{TemasCursos:id}',[TemasCursosController::class,'index'])->name('temas-editar');
    Route::post('/dashboard/controlCursos/altaTemas/{id}',[TemasCursosController::class,'store'])->name('temas-curso');
    Route::put('/dashboard/controlCursos/altaTemas/update/{id}',[TemasCursosController::class,'update'])->name('actualizar-tema');
    Route::post('/dashboard/controlCursos/altaBloque/{id}',[BloqueTemaController::class,'create'])->name('alta-bloque');
    Route::delete('/dashboard/controlCursos/delete/{id}',[BloqueTemaController::class,'delete'])->name('delete');
    Route::put('/dashboard/controlCursos/update/{id}',[BloqueTemaController::class,'update'])->name('update');
    Route::post('/dashboard/controlCursos/reconocimiento/{id}',[ReconociminetoController::class,'store'])->name('reconocimiento');
    Route::post('/dashboard/controlCursos/terminar/{id}',[TerminarCurso::class,'store'])->name('terminar');
    Route::post('/dashboard/controlCursos/puntos/{id}',[PuntosController::class,'store'])->name('puntos');
    Route::get('/dashboard/vista-previa/{id}',[VistaPrevia::class,'show'])->name('vista-previa');
    Route::get('/dashboard/vista-previa/{id}',[VistaPrevia2::class,'show'])->name('vista-previa2');



    Route::get('/dashboard/altaUsuario',[ControlUsuariosController::class,'index'])->name('dashboard.altaUsuario');
    Route::put('/dashboard/altaUsuarioUpdate/{id}',[ControlUsuariosController::class,'update'])->name('dashboard.altaUsuario.update');

    Route::post('/dashboard/altaUsuarioNuevo',[ControlUsuariosController::class,'create'])->name('dashboard.crear');
    Route::post('/dashboard/nuevoIdioma',[IdiomasController::class,'create'])->name('dashboard.crearIdioma');
    Route::post('/dashboard/asignar',[AsignarCursos::class,'create'])->name('dashboard.asignarCurso');
    Route::post('/dashboard/encuesta/{id}',[EncuestaController::class,'store'])->name('dashboard.encuesta');




    Route::get('/{User}',[ Imagen::class,'index']);
});
