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

Route::get('/fundamentos', [App\Http\Controllers\FundamentoController::class, 'index'])->name('fundamentos');
Route::post('/fundamento/agregar', [App\Http\Controllers\FundamentoController::class, 'store'])->name('nuevo-fundamento');
Route::post('/fundamento/buscar', [App\Http\Controllers\FundamentoController::class, 'show'])->name('buscar-fundamento');
Route::post('/fundamento/actualizar', [App\Http\Controllers\FundamentoController::class, 'update'])->name('actualizar-fundamento');
Route::post('/fundamento/borrar', [App\Http\Controllers\FundamentoController::class, 'destroy'])->name('borrar-fundamento');

Route::get('/carreras', [App\Http\Controllers\CarreraController::class, 'index'])->name('carreras');
Route::post('/carrera/agregar', [App\Http\Controllers\CarreraController::class, 'store'])->name('nuevo-carrera');
Route::post('/carrera/buscar', [App\Http\Controllers\CarreraController::class, 'show'])->name('buscar-carrera');
Route::post('/carrera/actualizar', [App\Http\Controllers\CarreraController::class, 'update'])->name('actualizar-carrera');
Route::post('/carrera/borrar', [App\Http\Controllers\CarreraController::class, 'destroy'])->name('borrar-carrera');

Route::get('/alumnos', [App\Http\Controllers\AlumnoController::class, 'index'])->name('alumnos');
Route::post('/alumno/agregar', [App\Http\Controllers\AlumnoController::class, 'store'])->name('nuevo-alumno');
Route::post('/alumno/buscar', [App\Http\Controllers\AlumnoController::class, 'show'])->name('buscar-alumno');
Route::post('/alumno/actualizar', [App\Http\Controllers\AlumnoController::class, 'update'])->name('actualizar-alumno');
Route::post('/alumno/borrar', [App\Http\Controllers\AlumnoController::class, 'destroy'])->name('borrar-alumno');

Route::get('/expediciones', [App\Http\Controllers\ExpedicionController::class, 'index'])->name('expediciones');
Route::post('/expedicion/agregar', [App\Http\Controllers\ExpedicionController::class, 'store'])->name('nuevo-expedicion');
Route::post('/expedicion/buscar', [App\Http\Controllers\ExpedicionController::class, 'show'])->name('buscar-expedicion');
Route::post('/expedicion/actualizar', [App\Http\Controllers\ExpedicionController::class, 'update'])->name('actualizar-expedicion');
Route::post('/expedicion/borrar', [App\Http\Controllers\ExpedicionController::class, 'destroy'])->name('borrar-expedicion');

Route::get('/archivos', [App\Http\Controllers\ArchivoController::class, 'index'])->name('archivos');
Route::post('/archivo/agregar', [App\Http\Controllers\ArchivoController::class, 'store'])->name('nuevo-archivo');
Route::post('/archivo/buscar', [App\Http\Controllers\ArchivoController::class, 'show'])->name('buscar-archivo');
Route::post('/archivo/actualizar', [App\Http\Controllers\ArchivoController::class, 'update'])->name('actualizar-archivo');
Route::post('/archivo/borrar', [App\Http\Controllers\ArchivoController::class, 'destroy'])->name('borrar-archivo');

Route::get('/antecedentes', [App\Http\Controllers\AntecedenteController::class, 'index'])->name('antecedentes');
Route::post('/antecedente/agregar', [App\Http\Controllers\AntecedenteController::class, 'store'])->name('nuevo-antecedente');
Route::post('/antecedente/buscar', [App\Http\Controllers\AntecedenteController::class, 'show'])->name('buscar-antecedente');
Route::post('/antecedente/actualizar', [App\Http\Controllers\AntecedenteController::class, 'update'])->name('actualizar-antecedente');
Route::post('/antecedente/borrar', [App\Http\Controllers\AntecedenteController::class, 'destroy'])->name('borrar-antecedente');