<?php

use App\Http\Controllers\ComentarioController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/',function(){
    return view('inicio');
 })->name('inicio');

Route::get('posts.nuevoPrueba', [PostController::class, 'nuevoPrueba'])->middleware('auth')->name('nuevoPrueba');
Route::get('posts.editarPrueba/{id}', [PostController::class, 'editarPrueba'])->middleware('auth')->name('editarPrueba');

Route::resource('posts', PostController::class);

Route::get('login', [LoginController::class, 'loginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);

Route::get('logout', [LoginController::class, 'logout'])->name('logout');