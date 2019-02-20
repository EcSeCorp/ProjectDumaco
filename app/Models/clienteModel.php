<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class clienteModel extends Model
{
    protected $table = 'CLIENTE';
    public $timestamps = false;
    protected $primaryKey = 'IN_ID_CLIENTE';

    protected $fillable = [
        'VC_NOMBRE','VC_RUC','VC_DIRECCION','VC_CIUDAD','VC_PAIS','VC_EMAIL',
        'CH_ID_USUARIO_CREACION','DT_FECHA_CREACION','CH_ID_USUARIO_UPDATE',
        'DT_FECHA_UPDATE'
    ];
}
