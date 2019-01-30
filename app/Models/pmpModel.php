<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pmpModel extends Model
{
    protected $table = 'PMP';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'VC_CODIGO_SITE_A','IN_SECTOR_AP','VC_IIBB_SITE_B',
        'VC_CODIGO_IIBB_SITE_B','NU_LATITUD_B','NU_LONGITUD_B',
        'VC_ODU_MODEL_A','VC_ODU_MODEL_B','VC_ANTENA_MODEL_A',
        'VC_ANTENA_MODEL_B','NU_ANTENA_GAIN_A','NU_ANTENA_GAIN_B',
        'NU_ANTENA_HEIGHT_A','NU_AZIMUTH_A','NU_AZIMUTH_B',
        'NU_ELEVATION_A','NU_ELEVATION_B','NU_TXPOWER_A','NU_TXPOWER_B',
        'NU_EIRP_A','NU_EIRP_B','NU_THRESHOLD_A','NU_THRESHOLD_B',
        'NU_RX_LEVEL_A','NU_RX_LEVEL_B','NU_FADE_MARGIN_A',
        'NU_FADE_MARGIN_B','VC_LINK_CONFIG','IN_CENTRAL_FRECUENCY',
        'IN_CHANNEL','VC_MODULATION','NU_AVAILABILITY','NU_DISTANCE_KM',
        'DT_FECHA_CREACION','CH_ID_USUARIO_CREACION'
    ];
}
