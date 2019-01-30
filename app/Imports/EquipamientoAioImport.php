<?php

namespace App\Imports;

use App\Models\EquipamientoAIOModel;
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


class EquipamientoAioImport implements ToModel,WithHeadingRow,WithBatchInserts,WithChunkReading//,SkipsOnError,SkipsOnFailure //,WithValidation

{
    use Importable;

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new EquipamientoAIOModel([
            //'VC_SOLUCION' => $row['SOLUCION'],
            'VC_REGION' => $row['REGIÓN'],
            //'DT_F_ENTREGA' => $row['F. ENTREGA'],
            'VC_CODIGO_KIT' => $row['CODIGO DE KIT'],
            'VC_SERIE_KIT' => $row['SERIE DE KIT'],
            'VC_CODIGO_GILAT' => $row['CODIGO GILAT'],
            'VC_DESCRIPCION' => $row['DESCRIPCIÓN'],
            'IN_CANTIDAD' => $row['QTY.'],
            'VC_NUM_SERIE' => $row['NUMERO DE SERIE'],
            'VC_SERIE_CORTA' => $row['SERIE CORTA']
    
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

    // public function onFailure(Failure ...$failures)
    // {
    //     // Handle the failures how you'd like.
    //    // Log::stack(['import-failure-logs'])->info(json_encode($failures));
    // }

    // public function onError(\Throwable $e)
    // {
    //     echo $e;
    // }
}
