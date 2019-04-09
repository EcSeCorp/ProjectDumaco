<?php

namespace App\Http\Controllers;

use App\Models\documentoModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //Para jugar con la BD
use App\Models\tareaModel;


class documentoController extends Controller
{
    public function listarDocumentosxTarea(Request $request) //$tipodoc
    {   
        $id_tarea = $request->input('id_tarea');
        $tipo_tarea = $request->input('tipotarea');
        $documentos = documentoModel::where('VC_TIP_TAREA',$tipo_tarea)->get();
        $tarea = tareaModel::where('CH_ID_LINK',$id_tarea)->first();
         return view('listaDocumentos',array(
             'documentosprueba' => $documentos,
             'tarea' => $tarea
         ));
    }

    public function mostrarDocumentos(Request $request) 
    {
        $id_documento = $request->input('id_doc');
        $id_tarea = $request->input('id_tarea');

        $documentos = documentoModel::where('CH_ID_DOCUMENTO',$id_documento)->first();
        $tarea = tareaModel::where('CH_ID_LINK',$id_tarea)->first();
        if($id_documento == '00000002')
        {
            return view('documentos.PruebaInterferencia',compact('documentos','tarea'));
        }
    }
}
