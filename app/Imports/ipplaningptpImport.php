<?php

namespace App\Imports;

use App\Models\ipplaningptpModel;
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

class ipplaningptpImport implements ToModel,WithHeadingRow,WithBatchInserts,WithChunkReading
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
        return new ipplaningptpModel([
            'VC_ID_ESTACION_A' => $row['ESTACION A'],
            'VC_IP_A' => $row['IP A'],
            'VC_ID_ESTACION_B' => $row['ESTACION B'],
            'VC_IP_B' => $row['IP B'],
            'VC_MASCARA_A_B' => $row['MASCARA A Y B'],
            'VC_GATEWAY_A_B' => $row['DEFAULT GATEWAY A Y B'],
            'VC_IP_LOCAL' => $row['IP Conexión Local'],
            'VC_PUERTO_A' => $row['PUERTO A'],
            'VC_PUERTO_B' => $row['PUERTO B'],
            'IN_COLOR_CODE' => $row['COLOR CODE'],
            'VC_MAESTRO' => $row['MAESTRO'],
            'VC_SINCRONISMO' => $row['SINCRONISMO'],
            'DT_FECHA_CREACION' => now(),
            'CH_ID_USUARIO_CREACION' => $user->CH_ID_USUARIO
        ]);
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
