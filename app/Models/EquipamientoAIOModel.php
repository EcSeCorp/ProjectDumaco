<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EquipamientoAIOModel extends Model
{
    
    protected $table = 'EQUIPAMIENTOAIO';
    public $incfementing = false;
    public $timestamps = false;

    protected $fillable = [
        /*'VC_SOLUCION',*/'VC_REGION'/*,'DT_F_ENTREGA'*/,'VC_CODIGO_KIT','VC_SERIE_KIT',
        'VC_CODIGO_GILAT','VC_DESCRIPCION','IN_CANTIDAD','VC_NUM_SERIE','VC_SERIE_CORTA'
    ];
}
