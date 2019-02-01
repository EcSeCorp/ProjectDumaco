<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ipplaningptpModel extends Model
{
    public $timestamps = false;
    public $incrementing = false;
    protected $table = 'IP_PLANNING_PTP';

    protected $fillable = [
        'VC_ID_ESTACION_A','VC_IP_A','VC_ID_ESTACION_B','VC_IP_B','VC_MASCARA_A_B',
        'VC_GATEWAY_A_B','VC_IP_LOCAL','VC_PUERTO_A','VC_PUERTO_B','IN_COLOR_CODE',
        'VC_MAESTRO','VC_SINCRONISMO','DT_FECHA_CREACION','CH_ID_USUARIO_CREACION'
    ];
}
