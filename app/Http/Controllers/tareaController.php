<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tareaModel;
use Illuminate\Support\Facades\DB; //Para jugar con la BD
use Illuminate\Pagination\Paginator; //para paginar la lista de usuarios
use Illuminate\Pagination\LengthAwarePaginator; //para paginar la lista de usuarios


class tareaController extends Controller
{
    public function listar()
    {
        $tareas = tareaModel::paginate(15);
        return view('ListaTareas',['tareas' =>$tareas]);
    }

    public function listarNodo(Request $request)
    {
        $nodo = $request->input('nodo');
        
        if(!empty($nodo))
        {
        $tareas = DB::table('TAREA')->where('VC_NODO_IIBB_A','LIKE',$nodo.'%')
        ->orWhere('VC_ID_NODO_B','LIKE',$nodo.'%')
        ->paginate(15); 
        return view('ListaTareas',['tareas' => $tareas]);
        }else{
        return redirect()->route('ListaTareas');
        }
    }
}
