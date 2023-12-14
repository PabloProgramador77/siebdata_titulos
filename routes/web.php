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

Route::get('/titulaciones', [App\Http\Controllers\TitulacionController::class, 'index'])->name('titulaciones');
Route::post('/titulacion/agregar', [App\Http\Controllers\TitulacionController::class, 'store'])->name('nuevo-titulacion');
Route::post('/titulacion/buscar', [App\Http\Controllers\TitulacionController::class, 'show'])->name('buscar-titulacion');
Route::post('/titulacion/actualizar', [App\Http\Controllers\TitulacionController::class, 'update'])->name('actualizar-titulacion');
Route::post('/titulacion/borrar', [App\Http\Controllers\TitulacionController::class, 'destroy'])->name('borrar-titulacion');

Route::get('/autoridades', [App\Http\Controllers\AutoridadController::class, 'index'])->name('autoridades');
Route::post('/autoridad/agregar', [App\Http\Controllers\AutoridadController::class, 'store'])->name('nuevo-autoridad');
Route::post('/autoridad/buscar', [App\Http\Controllers\AutoridadController::class, 'show'])->name('buscar-autoridad');
Route::post('/autoridad/actualizar', [App\Http\Controllers\AutoridadController::class, 'update'])->name('actualizar-autoridad');
Route::post('/autoridad/borrar', [App\Http\Controllers\AutoridadController::class, 'destroy'])->name('borrar-autoridad');

Route::get('/entidades', [App\Http\Controllers\EntidadController::class, 'index'])->name('entidades');
Route::post('/entidad/agregar', [App\Http\Controllers\EntidadController::class, 'store'])->name('nuevo-entidad');
Route::post('/entidad/buscar', [App\Http\Controllers\EntidadController::class, 'show'])->name('buscar-entidad');
Route::post('/entidad/actualizar', [App\Http\Controllers\EntidadController::class, 'update'])->name('actualizar-entidad');
Route::post('/entidad/borrar', [App\Http\Controllers\EntidadController::class, 'destroy'])->name('borrar-entidad');

Route::get('/estudios', [App\Http\Controllers\EstudioController::class, 'index'])->name('estudios');
Route::post('/estudio/agregar', [App\Http\Controllers\EstudioController::class, 'store'])->name('nuevo-estudio');
Route::post('/estudio/buscar', [App\Http\Controllers\EstudioController::class, 'show'])->name('buscar-estudio');
Route::post('/estudio/actualizar', [App\Http\Controllers\EstudioController::class, 'update'])->name('actualizar-estudio');
Route::post('/estudio/borrar', [App\Http\Controllers\EstudioController::class, 'destroy'])->name('borrar-estudio');