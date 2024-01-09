<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expedicion extends Model
{
    use HasFactory;

    protected $table = 'expediciones';

    protected $fillable = [

        'servicioSocial',
        'idFundamento',
        'idAlumno',
        'idTitulacion',
        'idEntidad',
        'fechaExamen',
        'fechaExencion',

    ];

    public function alumno(){

        return $this->hasOne(Alumno::class, 'id', 'idAlumno');

    }

    public function titulacion(){

        return $this->hasOne(Titulacion::class, 'id', 'idTitulacion');
        
    }

    public function fundamento(){

        return $this->hasOne(Fundamento::class, 'id', 'idFundamento');

    }

    public function entidad(){

        return $this->hasOne(Entidad::class, 'id', 'idEntidad');
        
    }
}
