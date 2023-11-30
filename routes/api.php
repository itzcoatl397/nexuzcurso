<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AltaCategoriaController;
use App\Http\Controllers\ImagenTemaController;

use App\Http\Controllers\VisibleController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/



Route::post('/changeVisible/{id}',[VisibleController::class,'update']);


Route::post('/changeNoVisible/{id2}',[VisibleController::class,'update2']);
Route::post('/upload/',[ImagenTemaController::class,'store'])->name('procesar');
