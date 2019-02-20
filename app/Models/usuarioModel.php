<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class usuarioModel extends Model
{
    //
    protected $table ='USUARIO';
    public $incrementing = false;
    public $timestamps = false;

    protected $primaryKey = 'CH_ID_USUARIO';
    protected $fillable = [
    'VC_PASSWORD','CH_ID_PERFIL','VC_NOMBRE',
    'VC_APELLIDO_PATERNO','VC_APELLIDO_MATERNO','CH_ID_DOCUMENTO',
    'CH_NUMERO_DOCUMENTO','VC_ESTADO','VC_EMAIL','VC_EMPRESA','IN_ID_CLIENTE','CH_ID_USUARIO_CREACION',
    'DT_FECHA_CREACION','CH_ID_USUARIO_UPDATE','DT_FECHA_UPDATE'
    ];

    public function perfil()
    {
        return $this->belongsTo('App\Models\perfilModel','CH_ID_PERFIL');
    }
    
    public function documentoIdentidad()
    {
        return $this->belongsTo('App\Models\documentoIdentidadModel','CH_ID_DOCUMENTO');
    }

    public function cliente()
    {
        return $this->belongsTo('App\Models\clienteModel','IN_ID_CLIENTE');
    }
}
