<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Firma extends Model
{
    use HasFactory;

    protected $table = 'firmas';

    protected $fillable = [

        'nombre',
        'firma',
        'passwordFirma',
        'idResponsable'

    ];

    public function responsable(){

        return $this->hasOne(Responsable::class, 'id', 'idResponsable');
        
    }
}
