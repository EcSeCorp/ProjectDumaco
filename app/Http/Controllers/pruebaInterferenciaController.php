<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\documentoDetalleModel; 
use Illuminate\Support\Facades\DB; 

class pruebaInterferenciaController extends Controller
{
    public function guardarDocumento(Request $request)
    {
        //guardando la imagen CapturaPantallaRadioePMP
        $CapturaPantallaRadioePMP = $request->file('CapturaPantallaRadioePMP');
        $ruta_imagen = time().$CapturaPantallaRadioePMP->getClientOriginalName();
        Storage::disk('public')->put($ruta_imagen,\File::get($CapturaPantallaRadioePMP));

        //capturando la sesion del usuario
        $usuario = session('usu');
        //Obteniendo demas datos
        $id_documento = $request->input('id_documento');
        $id_tarea = $request->input('id_tarea');
        $comentario = $request->input('CapturaPantallaRadioePMPComentario');

        //Creando el objeto y guardando el documento
        $doc1 =  new documentoDetalleModel();
        $doc1->CH_ID_LINK = $id_tarea;
        $doc1->CH_ID_DOCUMENTO = $id_documento;
        $doc1->CH_ID_CAMPO = '00000001';
        $doc1->VC_VALOR_CADENA_1 = $ruta_imagen;
        $doc1->VC_COMENTARIO = $comentario;
        $doc1->CH_ID_USUARIO_CREACION = $usuario->CH_ID_USUARIO;
        $doc1->DT_FECHA_CREACION = \now();
        $doc1->IN_ID_CLIENTE = $usuario->IN_ID_CLIENTE;

        $doc1->save();
    }

    public function mostrarDocumento()
    {
        //Verificar si existe el documento
        $id_documento = $request->input('id_documento');
        $id_tarea = $request->input('id_tarea');

        $documentoInterferencia = documentoDetalleModel::where([
            ['CH_ID_LINK',$id_tarea],
            ['CH_ID_DOCUMENTO',$id_documento]
        ])->get();
        
        return response()->json($documentoInterferencia,200);

    }

    public function EditarDocumento(){
        
    }
}
