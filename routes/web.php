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

Route::post('/certificado/validar', [App\Http\Controllers\CertificadoController::class, 'create'])->name('validar-certificado');
Route::post('/certificado/archivar', [App\Http\Controllers\CertificadoController::class, 'store'])->name('archivar-certificado');

Route::post('/firma/validar', [App\Http\Controllers\FirmaController::class, 'create'])->name('validar-firma');
Route::post('/firma/archivar', [App\Http\Controllers\FirmaController::class, 'store'])->name('archivar-firma');

Route::get('/cargos', [App\Http\Controllers\CargoController::class, 'index'])->name('cargos');
Route::post('/cargo/agregar', [App\Http\Controllers\CargoController::class, 'store'])->name('nuevo-cargo');
Route::post('/cargo/buscar', [App\Http\Controllers\CargoController::class, 'show'])->name('buscar-cargo');
Route::post('/cargo/actualizar', [App\Http\Controllers\CargoController::class, 'update'])->name('actualizar-cargo');
Route::post('/cargo/borrar', [App\Http\Controllers\CargoController::class, 'destroy'])->name('borrar-cargo');