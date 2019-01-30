<?php

namespace App\Imports;

use App\Models\pmpModel;
use Maatwebsite\Excel\Concerns\ToModel;

use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;
use Maatwebsite\Excel\Concerns\WithBatchInserts; /*limita la cantidad de consultas realizadas
                                                    especificando un tamaño de lote*/
 use Maatwebsite\Excel\Concerns\WithChunkReading; /*Para leer la hoja de calculo en trozos y mantener
                                                    el uso de la memoria bajo control */
//use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Validators\Failure; //si esto no funcionan los dos de abajo
//use Maatwebsite\Excel\Concerns\SkipsOnFailure; /*Esto es para capturar los errores y mostrarlos */
use Maatwebsite\Excel\Concerns\SkipsOnError;

use Maatwebsite\Excel\Concerns\WithValidation; /*Para validar las filas con Rule*/
//use Illuminate\Validation\Rule; 

HeadingRowFormatter::default('none');

class PmpImport implements ToModel,WithHeadingRow,WithBatchInserts,WithChunkReading
{
    use Importable;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $user = session('usu');
        return new pmpModel([
        'VC_CODIGO_SITE_A' => $row['CODIGO AP (SITE A)'],
        'IN_SECTOR_AP' => $row['SECTOR DEL AP'],
        'VC_IIBB_SITE_B' => $row['INSTITUCION BENEFICIARIA (SITE B)'],
        'VC_CODIGO_IIBB_SITE_B' =>$row['CODIGO IIBB (SITE B)'],
        'NU_LATITUD_B' => $row['LATITUD (SITE B)'],
        'NU_LONGITUD_B' => $row['LONGITUD (SITE B)'],
        'VC_ODU_MODEL_A' => $row['ODU Model (SITE A)'],
        'VC_ODU_MODEL_B' => $row['ODU Model (SITE B)'],
        'VC_ANTENA_MODEL_A' => $row['Antenna Model (SITE A)'],
        'VC_ANTENA_MODEL_B' => $row['Antenna Model (SITE B)'],
        'NU_ANTENA_GAIN_A' => $row['Antenna Gain (SITE A)'],
        'NU_ANTENA_GAIN_B' => $row['Antenna Gain (SITE B)'],
        'NU_ANTENA_HEIGHT_A' => $row['Antenna Height (SITE A)'],
        'NU_AZIMUTH_A' => $row['Azimuth (SITE A) [°]'],
        'NU_AZIMUTH_B' => $row['Azimuth (SITE B) [°]'],
        'NU_ELEVATION_A' => $row['Elevation (SITE A) [°]'],
        'NU_ELEVATION_B' => $row['Elevation (SITE B) [°]'],
        'NU_TXPOWER_A' => $row['Tx Power (SITE A) [dBm]'],
        'NU_TXPOWER_B' => $row['Tx Power (SITE B) [dBm]'],
        'NU_EIRP_A' => $row['EIRP (SITE A) [dBm]'],
        'NU_EIRP_B' => $row['EIRP (SITE B) [dBm]'],
        'NU_THRESHOLD_A' => $row['Rx Threshold Level (SITE A) [dBm]'],
        'NU_THRESHOLD_B' => $row['Rx Threshold Level (SITE B) [dBm]'],
        'NU_RX_LEVEL_A' => $row['Rx Level (SITE A) [dBm]'],
        'NU_RX_LEVEL_B' => $row['Rx Level (SITE B) [dBm]'],
        'NU_FADE_MARGIN_A' => $row['Fade Margin (SITE A) [dB]'],
        'NU_FADE_MARGIN_B' => $row['Fade Margin (SITE B) [dB]'],
        'VC_LINK_CONFIG' => $row['Link Configuration'],
        'IN_CENTRAL_FRECUENCY' => $row['Central Frequency [MHz]'],
        'IN_CHANNEL' => $row['Channel Bandwidth [MHZ]'],
        'VC_MODULATION' => $row['Modulation'],
        'NU_AVAILABILITY' => $row['Availability [%]'],
        'NU_DISTANCE_KM' => $row['Distance [Km]'],
        'DT_FECHA_CREACION' => now(),
        'CH_ID_USUARIO_CREACION' => $user->CH_ID_USUARIO
        ]);
    }

    public function obtenerFecha($fecha)
    {
        $date = str_replace('/','-',$fecha);
        return date('Y-m-d',strtotime($date));
    }
    public function batchSize(): int
    {
        return 150;
    }
    public function chunkSize(): int
    {
        return 200;
    }
}
