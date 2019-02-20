<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class documentoModel extends Model
{
    protected $table = 'DOCUMENTO';
    public $timestamps = false;
    public $incrementing = false;

    protected $fillable = [
        'CH_ID_DOCUMENTO','VC_NOMBRE_DOCUMENTO','VC_TIP_TAREA'
    ];
}
