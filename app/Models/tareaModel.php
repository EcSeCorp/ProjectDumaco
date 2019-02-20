<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tareaModel extends Model
{
    protected $table = 'TAREA';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'CH_ID_LINK','CH_ISO_NODO','VC_TIP_LINK','VC_CONTRATISTA','DT_INICIO_INST',
        'DT_FIN_INST','VC_PROYECTO','VC_TIP_NODO_A','VC_NODO_IIBB_A','VC_TIP_NODO_B',
        'VC_ID_NODO_B','VC_SECTOR_AP','DT_FECHA_CREACION','CH_ID_USUARIO_CREACION',
        'IN_ID_CLIENTE'
    ];
}
