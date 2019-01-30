<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class disenoModel extends Model
{
    
    protected $table = 'DISENO';
    public $incrementing = false;
    public $timestamps = false;
    
    protected $fillable = [
        'VC_COBERTURA', 'VC_CODIGO', 'VC_IIBB','VC_CODIGO_IIBB','NU_LATITUD_A',
        'NU_LONGITUD_A','NU_LATITUD_B','NU_LONGITUD_B'
    ];

}
