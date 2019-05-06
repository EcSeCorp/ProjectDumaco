<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class documentoDetalleModel extends Model
{
    protected $table = 'DOCUMENTO_DET';
    public $timestamps = false;
    public $incrementig = false;

    protected $fillable = [
        'CH_ID_LINK','CH_ID_DOCUMENTO','CH_ID_CAMPO','VC_VALOR_CADENA_1',
        'VC_VALOR_CADENA_2','IN_VALOR_ENTERO_1','IN_VALOR_ENTERO_2',
        'NU_VALOR_NUMERICO_1','NU_VALOR_NUMERICO_2','VC_COMENTARIO',
        'CH_ID_USUARIO_CREACION','DT_FECHA_CREACION','CH_ID_USUARIO_UPDATE',
        'DT_FECHA_UPDATE','IN_ID_CLIENTE','BL_VALOR_BOOLEANO'
    ];
}
