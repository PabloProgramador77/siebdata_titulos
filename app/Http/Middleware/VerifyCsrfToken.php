<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [

        '/responsable/agregar',
        '/responsable/buscar',
        '/responsable/actualizar',
        '/responsable/borrar',
        '/certificado/validar',
        '/certificado/archivar',
        '/firma/validar',
        '/firma/archivar',
        '/cargo/agregar',
        '/cargo/buscar',
        '/cargo/actualizar',
        '/cargo/borrar',
        '/titulacion/agregar',
        '/titulacion/buscar',
        '/titulacion/actualizar',
        '/titulacion/borrar',
        '/autoridad/agregar',
        '/autoridad/buscar',
        '/autoridad/actualizar',
        '/autoridad/borrar',
        '/entidad/agregar',
        '/entidad/buscar',
        '/entidad/actualizar',
        '/entidad/borrar',
        '/estudio/agregar',
        '/estudio/buscar',
        '/estudio/actualizar',
        '/estudio/borrar',
        '/fundamento/agregar',
        '/fundamento/buscar',
        '/fundamento/actualizar',
        '/fundamento/borrar',
        '/carrera/agregar',
        '/carrera/buscar',
        '/carrera/actualizar',
        '/carrera/borrar',
        '/alumno/agregar',
        '/alumno/buscar',
        '/alumno/actualizar',
        '/alumno/borrar',
        '/expedicion/agregar',
        '/expedicion/buscar',
        '/expedicion/actualizar',
        '/expedicion/borrar',
        '/archivo/agregar',
        '/archivo/buscar',
        '/archivo/actualizar',
        '/archivo/borrar',
        '/antecedente/agregar',
        '/antecedente/buscar',
        '/antecedente/actualizar',
        '/antecedente/borrar',
        '/rol/agregar',
        '/rol/buscar',
        '/rol/actualizar',
        '/rol/borrar',
        '/rol/permisos',
        '/permiso/agregar',
        '/permiso/buscar',
        '/permiso/actualizar',
        '/permiso/borrar',
        
    ];
}
