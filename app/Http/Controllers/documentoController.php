<?php

namespace App\Http\Controllers;
use App\Models\documentoModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use App\Models\tareaModel;
use App\Models\clienteModel;
use Illuminate\Support\Facades\Storage; 
use App\Models\EntidadDetalleModel;

class documentoController extends Controller
{
    public function listarDocumentosxTarea(Request $request) //$tipodoc
    { 
        $id_tarea = $request->input('id_tarea');
        $tipo_tarea = $request->input('tipotarea');
        $lista_id_doc = DB::select('CALL USP_DOCUMENTOS(?)',array($tipo_tarea));
        foreach($lista_id_doc as $id_docu)
        {
            $array_docu = DB::table('ENTIDAD_DETALLE')->select('CH_ID_VALOR','VC_VALOR_CADENA_1')
            ->where([
            ['CH_ID_ENTIDAD','=','DOCU'],
            ['CH_ID_VALOR',$id_docu->CH_ID_VALOR_PRIM]
            ])->get();

            foreach($array_docu as $docu)
            {
                $documentos[] = $docu++;
            }
        } 
        $tarea = tareaModel::where('CH_ID_LINK',$id_tarea)->first();
        return view('listaDocumentos',array(
        'documentosprueba' => $documentos,
        'tarea' => $tarea,
        ));
    }

    public function mostrarDocumentos(Request $request) 
    {
        $id_documento = $request->input('id_doc');
        $id_tarea = $request->input('id_tarea');
        $documentos = DB::table('ENTIDAD_DETALLE')->where([
            ['CH_ID_ENTIDAD','DOCU'],
            ['CH_ID_VALOR',$id_documento]
        ])->get();
        $tarea = tareaModel::where('CH_ID_LINK',$id_tarea)->first();
        if($id_documento == '00000002')
        { 
            $datos = (DB::select('CALL USP_IMAGENES_DOCUMENTO(?)',array($id_documento)))[0];
            return view('documentos.PruebaInterferencia',compact('documentos','tarea','datos'));
        }
    }

    public function guardarFotoEjemplo(Request $request)
    {
        $user = session('usu');
        $ch_id_valor = $request->input('idvalor');
        $nombre_entidad = $request->input('nombre_entidad');
        $entidad = DB::table('ENTIDAD_DETALLE')->where([
        ['CH_ID_ENTIDAD','=','CAMP_EJE'],
        ['CH_ID_VALOR','=',$ch_id_valor]
        ])->get();

        if(count($entidad)>0)
        {
            foreach($entidad as $column)
            {
                $ruta_delete = $column->VC_VALOR_CADENA_2;
            }
        \Storage::disk('public')->delete($ruta_delete);
        }

        $imagen = $request->file('imagenejemplo');
        $ruta_imagen = time().$imagen->getClientOriginalName();
        \Storage::disk('public')->put($ruta_imagen,\File::get($imagen));
        DB::table('ENTIDAD_DETALLE')->updateOrInsert(
        ['CH_ID_ENTIDAD' => 'CAMP_EJE',
        'CH_ID_VALOR' => $ch_id_valor,],
        ['VC_VALOR_CADENA_1' => $nombre_entidad,
        'VC_VALOR_CADENA_2' => $ruta_imagen,
        'CH_ID_USUARIO_CREACION' => $user->CH_ID_USUARIO ,
        'DT_FECHA_CREACION' => now(),
        'IN_ID_CLIENTE' => $user->IN_ID_CLIENTE
        ]);
        return redirect()->route('imgejemplo')->with(array(
        'message' => 'La Imagen se ha subido correctamente'
        ));
        }
}
