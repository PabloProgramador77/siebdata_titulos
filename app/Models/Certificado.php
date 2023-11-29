<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificado extends Model
{
    use HasFactory;

    protected $table = 'certificados';

    protected $fillable = [

        'nombre',
        'serial',
        'noCertificado',
        'idResponsable'

    ];

    public function responsable(){

        return $this->hasOne(Responsable::class, 'id', 'idResponsable');
        
    }
}
