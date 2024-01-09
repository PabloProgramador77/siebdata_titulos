<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{
    use HasFactory;

    protected $table = 'archivos';

    protected $fillable = [

        'folio',
        'idExpedicion',

    ];

    public function expedicion(){

        return $this->hasOne( Expedicion::class, 'id', 'idExpedicion' );
        
    }
}
