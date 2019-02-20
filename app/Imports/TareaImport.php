<?php

namespace App\Imports;

use App\Models\tareaModel;
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

class TareaImport implements ToModel,WithHeadingRow,WithBatchInserts,WithChunkReading
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
        $fechaini = '';
        $fechafin = '';
        
        return new tareaModel([
            'CH_ID_LINK' => $row['Link_ID'],
            'CH_ISO_NODO' => $row['IsoNo'],
            'VC_TIP_LINK' => $row['LINK TYPE'],
            'VC_CONTRATISTA' => $row['SUBCONTRATA'],
           // 'DT_INICIO_INST' => $row['Inicio Instalacion'], //cambiar el formato fecha inicio
           $fechaini =>$row['Inicio Instalacion'], 
           'DT_INICIO_INST' => $this->obtenerFecha($fechaini),
           //'DT_FIN_INST' => $row['Fin Instalacion'],       //cambiar el formato fecha fin.
           $fechafin =>$row['Fin Instalacion'],
           'DT_FIN_INST' =>$this->obtenerFecha($fechafin),
            'VC_PROYECTO' => $row['PROYECTO'],
            'VC_TIP_NODO_A' => $row['Tipo de nodo A'],
            'VC_NODO_IIBB_A' => $row['Codigo A'],
            'VC_TIP_NODO_B' => $row['Tipo de nodo B'],
            'VC_ID_NODO_B' => $row['Codigo B'],
            'VC_SECTOR_AP' => $row['SECTOR AP'],
            'DT_FECHA_CREACION' => now(),
            'CH_ID_USUARIO_CREACION' => $user->CH_ID_USUARIO,
            'IN_ID_CLIENTE' => $user->IN_ID_CLIENTE
        ]);
    }

    public function  obtenerFecha($fecha)/*ingresar valor con formato d/m/Y */
    {
        $date = str_replace('/','-',$fecha);
        return date('Y-m-d',strtotime($date) );
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
