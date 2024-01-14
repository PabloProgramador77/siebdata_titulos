<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;

    protected $table = 'alumnos';

    protected $fillable = [

        'nombre',
        'primerApellido',
        'segundoApellido',
        'curp',
        'email',
        'idCarrera',
        'fechaInicio',
        'fechaTermino'

    ];

    public function carrera(){

        return $this->hasOne( Carrera::class, 'id', 'idCarrera' );
        
    }

    public function antecedente(){

        return $this->hasOne( Antecedente::class, 'idAlumno', 'id' );

    }
}
