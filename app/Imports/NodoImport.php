<?php

namespace App\Imports;

use App\Models\nodoModel;
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

class NodoImport implements ToModel,WithHeadingRow,WithBatchInserts,WithChunkReading
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

        return new nodoModel([
            'CH_CODIGO_NODO' => $row['CODIGO'],
            'VC_PROYECTO' => $row['REGION'],
            'VC_NOMBRE' => $row['NOMBRE DEL NODO'],
            'VC_DEPARTAMENTO' => $row['REGION DEPARTAMENTO'],
            'VC_PROVINCIA' => $row['PROVINCIA'],
            'VC_DISTRITO' => $row['DISTRITO'],
            'VC_LOCALIDAD' => $row['LOCALIDAD'],
            'VC_UBIGEO' => $row['UBIGEO'],
            'NU_LATITUD' => $row['LATITUD'],
            'NU_LONGITUD' => $row['LONGITUD'],
            'IN_ANILLO' => $row['ANILLO'],
            'IN_ALTURA_TORRE' => $row['TORRE ALTURA (m)'],
            'DT_FECHA_CREACION' => now(),
            'CH_ID_USUARIO' => $user->CH_ID_USUARIO
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
