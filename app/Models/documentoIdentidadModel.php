<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class documentoIdentidadModel extends Model
{
    //
    protected $table = 'DOCUMENTO_IDENTIDAD';
    public $incrementing = false;
    public $timestamps = false;

    protected $primaryKey = 'CH_ID_DOCUMENTO';
    protected $fillable = [
        'VC_NOMBRE_DOCUMENTO'
    ];
    
    
}
