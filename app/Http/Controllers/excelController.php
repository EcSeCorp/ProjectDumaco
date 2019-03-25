<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; //Para usar el almacenamiento
use Illuminate\Support\Facades\DB; //para manejar la bd

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
//use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;

//Carpetas del Laravel Excel
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Imports\UsersImport;
use App\Imports\DisenoImport;
use App\Imports\EquipamientoAioImport;
use App\Imports\NodoImport;
use App\Imports\TareaImport;
use App\Imports\PmpImport;
use App\Imports\ipplaningpmpImport;
use App\Imports\PtpImport;
use App\Imports\ipplaningptpImport;


class excelController extends Controller
{
    public function guardarExcel(Request $request)
    {
        $excel = $request->file('excel');
        var_dump($excel);
        // if($excel)
        // {
        //     $excel_path = $excel->getClientOriginalName();
        //     \Storage::disk('excelfiles')->put($excel_path,\File::get($excel));
        // }
    }

    public function  export()
    {
        return Excel::download(new UsersExport,'users.xlsx');
    }

    public function import()
    {
        Excel::import(new UsersImport,'/excelfiles/users.xlsx');
    }
    
    public function importExcelDiseno()
    {
        // Excel::import(new DisenoImport,'DISEÑO_LM.xlsx','excelfiles');
        Excel::import(new DisenoImport, request()->file('fileexcel'));
    }

    public function importExcelEquipamiento()
    {
        // Excel::import(new EquipamientoAioImport,'EQUIPAMIENTO_AIO.xlsx','excelfiles');
        Excel::import(new EquipamientoAioImport, request()->file('fileexcel'));
    }

    public function importExcelNodo()
    {
        $usuario_now = session('usu');

        DB::table('NODO')->where('IN_ID_CLIENTE','=',$usuario_now->IN_ID_CLIENTE)->delete();
        Excel::import(new NodoImport, request()->file('fileexcel'));
    }
    
    public function importExcelTarea()
    {
        $usuario_now = session('usu');
        DB::table('TAREA')->where('IN_ID_CLIENTE','=',$usuario_now->IN_ID_CLIENTE)->delete();
        Excel::import(new TareaImport, request()->file('fileexcel'));
    }

    public function importExcelPmp()
    {
        Excel::import(new PmpImport,request()->file('fileexcel'));
    }

    public function importExcelIpPlaningPMP()
    {
        Excel::import(new ipplaningpmpImport,request()->file('fileexcel'));
    }

    public function importExcelPtp()
    {
        Excel::import(new PtpImport,request()->file('fileexcel'));
    }
    
    public function importExcelIpPlaningPTP()
    {
        Excel::import(new ipplaningptpImport,request()->file('fileexcel'));
    }

    public function ImportarExcel(Request $request)
    {
        $tabla = $request->input('tablasExcel'); 

        if($tabla == 'Nodo')
        {
           $this->importExcelNodo();
        }
        else if($tabla == 'EquipamientoAIO')
        {
            $this->importExcelEquipamiento();
        }
        else if($tabla == 'Diseno')
        {
            $this->importExcelDiseno();
        }
        else if($tabla == 'Tarea')
        {
            $this->importExcelTarea();
        }
        else if($tabla == 'Pmp')
        {
            $this->importExcelPmp();
        }
        else if($tabla == 'IpPlaningPMP')
        {
            $this->importExcelIpPlaningPMP();
        }
        else if($tabla == 'Ptp')
        {
            $this->importExcelPtp();   
        }
        else if($tabla == 'IpPlaningPTP')
        {
            $this->importExcelIpPlaningPTP();
        }

        return redirect()->route('bandeja')->with(array(
            'message'=>'El Archivo se ha subido Correctamente'
        ));
    }
}
