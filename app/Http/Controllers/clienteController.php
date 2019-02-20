<?php

namespace App\Http\Controllers;

use App\Models\clienteModel;
use Illuminate\Http\Request;

class clienteController extends Controller
{
    public function agregarCliente(Request $request)
    {
        $new_cliente = new clienteModel();
        $user = session('usu');

        $new_cliente->VC_NOMBRE = $request->cliente;
        $new_cliente->VC_RUC = $request->ruc;
        $new_cliente->VC_DIRECCION = $request->direccion;
        $new_cliente->VC_CIUDAD = $request->ciudad;
        $new_cliente->VC_PAIS = $request->pais;
        $new_cliente->VC_EMAIL = $request->email;
        $new_cliente->CH_ID_USUARIO_CREACION = $user->CH_ID_USUARIO;
        $new_cliente->DT_FECHA_CREACION = now();
        $new_cliente->save();

       return redirect()->route('listausuarios');
    }
}
