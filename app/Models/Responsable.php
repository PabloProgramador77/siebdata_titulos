<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Responsable extends Model
{
    use HasFactory;

    protected $table = 'responsables';

    protected $fillable = [
        
        'nombre', 'primerApellido', 'segundoApellido', 'curp', 'titulo', 'idCargo'

    ];

    public function cargo(){

        return $this->hasOne(Cargo::class, 'id', 'idCargo');
        
    }

    public function certificado(){

        return $this->belongsTo(Certificado::class, 'id', 'idResponsable');

    }

    public function firma(){

        return $this->belongsTo(Firma::class, 'id', 'idResponsable');
        
    }
}
