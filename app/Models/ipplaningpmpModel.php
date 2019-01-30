<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ipplaningpmpModel extends Model
{
    protected $table = 'IP_PLANNING_PMP';
    public $timestamps = false;
    public $incrementig = false;

    protected $fillable = [
     'VC_ESTACION_A','VC_IP_A','VC_ESTACION_B','VC_IP_B','VC_MASCARA_A_B',
     'VC_DEFAULT_A_B','VC_IP_LOCAL','VC_PUERTO_A','VC_PUERTO_B','DT_FECHA_CREACION',
     'CH_ID_USUARIO_CREACION'       
    ];
}
