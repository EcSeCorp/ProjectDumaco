<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class perfilModel extends Model
{
    //
    protected $table = 'PERFIL';
    public $incrementing = false;
    public $timestamps = false;

    protected $primaryKey = 'CH_ID_PERFIL';
    protected $fillable = [
    'VC_NOMBRE'
    ];
    
}
