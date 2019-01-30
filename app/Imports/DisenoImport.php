<?php

namespace App\Imports;

use App\Models\disenoModel;
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

class DisenoImport implements ToModel,WithHeadingRow,WithBatchInserts,WithChunkReading//,SkipsOnError,SkipsOnFailure //,WithValidation

{
    use Importable;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    

    public function model(array $row)
    {
        return new disenoModel([
          'VC_COBERTURA' =>$row['COBERTURA'],
          'VC_CODIGO' => $row['CODIGO POP'],
          'VC_IIBB' => $row['INSTITUCION BENEFICIARIA SITE B'],
          'VC_CODIGO_IIBB' => $row['CODIGO IIBB (SITE B)'],
          'NU_LATITUD_A'=>$row['LATITUD (SITE A)'],
          'NU_LONGITUD_A'=>$row['LONGITUD (SITE A)'],
          'NU_LATITUD_B'=>$row['LATITUD (SITE B)'],
          'NU_LONGITUD_B'=>$row['LONGITUD (SITE B)']      
        ]);
    }

    public function batchSize(): int
    {
        return 150;
    }
    public function chunkSize(): int
    {
        return 211;
    }

    // public function onFailure(Failure ...$failures)
    // {
    //     // Handle the failures how you'd like.
    //     Log::stack(['import-failure-logs'])->info(json_encode($failures));
    // }

    // public function onError(\Throwable $e)
    // {
    //     echo $e;
    // }

    // public function rules(): array
    // {
    //     return [
    //         //'CODIGO POP' =>  Rule::in(['AP-0008'])
    //         'CODIGO POP' => 'required|AP-0008'
    //     ];
    // }
  
}
