<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Antecedente extends Model
{
    use HasFactory;

    protected $table = 'antecedentes';

    protected $fillable = [

        'nombre',
        'fechaInicio',
        'fechaTermino',
        'idAlumno',
        'idEstudio',
        'idEntidad',
        'cedula'

    ];

    public function alumno(){

        return $this->hasOne( Alumno::class, 'id', 'idAlumno' );

    }

    public function estudio(){

        return $this->hasOne( Estudio::class, 'id', 'idEstudio' );

    }

    public function entidad(){

        return $this->hasOne( Entidad::class, 'id', 'idEntidad' );
        
    }
}
