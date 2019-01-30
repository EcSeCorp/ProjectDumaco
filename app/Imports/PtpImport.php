<?php

namespace App\Imports;

use App\Models\ptpModel;
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

class PtpImport implements ToModel,WithHeadingRow,WithBatchInserts,WithChunkReading
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
        return new ptpModel([
            'CH_ID_NODO_S1' => $row['Call sign S1'],
            'CH_ID_NODO_S2' => $row['Call sign S2'],
            'NU_AZIMUTH_S1' => $row['True azimuth (°) S1'],
            'NU_AZIMUTH_S2' => $row['True azimuth (°) S2'],
            'NU_ELEVACION_S1' => $row['ELEVACIÓN (°) S1'],
            'NU_ELEVACION_S2' => $row['ELEVACIÓN (°) S2'],
            'NU_DISTANCIA_KM' => $row['Distancia (km)'],
            'NU_COTA_MSNM_S1' => $row['COTA (msnm) S1'],
            'NU_COTA_MSNM_S2' => $row['COTA (msnm) S2'],
            'VC_ANTENA_MODEL_S1' => $row['TR Antenna model S1'],
            'VC_ANTENA_MODEL_S2' => $row['TR Antenna model S2'],
            'VC_DIAMETRO_ANTENA_S1' => $row['TR Antenna diameter (m) S1'],
            'VC_DIAMETRO_ANTENA_S2' => $row['TR Antenna diameter (m) S2'],
            'IN_ALTURA_ANTENA_S1' => $row['TR Antenna height (m) S1'],
            'IN_ALTURA_ANTENA_S2' => $row['TR Antenna height (m) S2'],
            'NU_GANANCIA_ANTENA_S1' => $row['TR Antenna gain (dBi) S1'],
            'NU_GANANCIA_ANTENA_S2' => $row['TR Antenna gain (dBi) S2'],
            'CH_CHANEL_S1' => $row['#1 Channel ID S1'],
            'CH_CHANEL_S2' => $row['#1 Channel ID S2'],
            'VC_DISEÑO_FRECUENCIA_S1' => $row['#1 Design frequency S1'],
            'VC_DISEÑO_FRECUENCIA_S2' => $row['#1 Design frequency S2'],
            'VC_POLARIZACION' => $row['Polarization'],
            'VC_RADIO_MODEL_S1' => $row['Radio model S1'],
            'VC_EMISSION_S1' => $row['Emission designator S1'],
            'IN_TX_POWER_S1' => $row['TX power (dBm) S1'],
            'IN_TX_POWER_S2' => $row['TX power (dBm) S2'],
            'NU_EIRP_S1' => $row['EIRP (dBm) S1'],
            'NU_EIRP_S2' => $row['EIRP (dBm) S2'],
            'NU_RX_THRESHOLD_S1' => $row['RX threshold level (dBm) S1'],
            'NU_RECEIVE_SIGNAL_S1' => $row['Receive signal (dBm) S1'],
            'NU_RECEIVE_SIGNAL_S2' => $row['Receive signal (dBm) S2'],
            'NU_FADE_MARGIN_S1' => $row['Effective fade margin (dB) S1'],
            'NU_FADE_MAGIN_S2' => $row['Effective fade margin (dB) S2'],
            'NU_ANNUAL_MULTIPATH_AVAILABILITY_S1' => $row['Annual multipath availability (%) S1'],
            'NU_ANNUAL_RAIN_AVAILABILITY_S1' => $row['Annual rain availability (%) S1'],
            'NU_ANNUAL_RAIN_AND_MULTIPATH_AVAILABILITY' => $row['Annual rain + multipath availability (%)'],
            'DT_FECHA_CREACION' => now(),
            'CH_ID_USUARIO_CREACION' => $user->CH_ID_USUARIO
        ]);
    }

    public function  batchSize(): int
    {
        return 150;
    }
    public function chunkSize(): int 
    {
        return 200;
    }
}
