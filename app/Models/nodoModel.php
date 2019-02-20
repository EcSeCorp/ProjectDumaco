<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class nodoModel extends Model
{
    protected $table = 'NODO';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        'CH_CODIGO_NODO','VC_REGION','VC_NOMBRE','VC_DEPARTAMENTO','VC_PROVINCIA',
        'VC_DISTRITO','VC_LOCALIDAD','VC_UBIGEO','NU_LATITUD','NU_LONGITUD','IN_ANILLO',
        'IN_ALTURA_TORRE','DT_FECHA_CREACION','CH_ID_USUARIO_CREACION', 'IN_ID_CLIENTE'
    ];
}
