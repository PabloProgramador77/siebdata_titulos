<?php

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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profile/username', [App\Http\Controllers\UserController::class, 'show'])->name('perfil');
Route::post('/ipes/actualizar', [App\Http\Controllers\UserController::class, 'update'])->name('actualizar-ipes');

Route::get('/responsables', [App\Http\Controllers\ResponsableController::class, 'index'])->name('responsables');
Route::post('/responsable/agregar', [App\Http\Controllers\ResponsableController::class, 'store'])->name('nuevo-responsable');
Route::post('/responsable/buscar', [App\Http\Controllers\ResponsableController::class, 'show'])->name('buscar-responsable');
Route::post('/responsable/actualizar', [App\Http\Controllers\ResponsableController::class, 'update'])->name('actualizar-responsable');
Route::post('/responsable/borrar', [App\Http\Controllers\ResponsableController::class, 'destroy'])->name('borrar-responsable');