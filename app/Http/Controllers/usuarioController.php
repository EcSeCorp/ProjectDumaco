<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //Para jugar con la BD
use App\Models\usuarioModel;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\agregarUsuario;
use Illuminate\Pagination\Paginator; //para paginar la lista de usuarios
use Illuminate\Pagination\LengthAwarePaginator; //para paginar la lista de usuarios
use Illuminate\Support\Facades\Mail; //para usar el atributo Mail
use App\Mail\alertUser;

class usuarioController extends Controller
{
    public function LoginUser(Request $request)
    {   
        $user = $request->input('usuario');
        $password = $request->input('password');

       $usuario = DB::table('USUARIO')->where('CH_ID_USUARIO',$user)
                                      ->where('VC_PASSWORD',$password)     
                                      ->first(); /*Si usabas el ->get() tenias que usar un 
                                        foreach para recorrer el array*/
       if(count($usuario)==0)
       {
        return redirect()->route('logueo')->with(array(
            'avisousuario' =>'Usuario y/o Contraseña Incorrectos'
        ));
       } 
      else  if($usuario->VC_ESTADO =='DESHABILITADO')
                {
                    return redirect()->route('logueo')->with(array(
                        'avisousuario' =>'El usuario ha sido desahibilitado por el Administrador'
                    ));
                }
            else return view('layouts.index',array(
                session(['usu'=>$usuario])
            ));          
    }

    public function ListarUsuarios()
    {   
        //usando paginaciones
        //$usuarios =  usuarioModel::paginate(15);

        //LOS USUARIOS DEBEN VER A LOS QUE ESTEN DEBAJO DE SU NIVEL DE PRIORIDAD
        $usuarioNow = session('usu');
        if($usuarioNow->CH_ID_PERFIL == '00000001')
        {
            $usuarios = usuarioModel::all();
        }else if($usuarioNow->CH_ID_PERFIL == '00000002')
        {
            $usuarios = usuarioModel::where('CH_ID_PERFIL','00000003')
                                    ->orWhere('CH_ID_PERFIL','00000004')
                                    ->get();
        }else if($usuarioNow->CH_ID_PERFIL == '00000003')
        {
            $usuarios = usuarioModel::where('CH_ID_PERFIL','00000004')->get();
        }else if($usuarioNow->CH_ID_PERFIL == '00000004')
        {
            $usuarios = usuarioModel::where('CH_ID_PERFIL','00000004')->get();
        }

       return view('Usuarios.ListaUsuarios',['usuarios'=>$usuarios]);
    //    var_dump($usuarioNow);
    //    die();
    }

    public function AgregarUsuarios(Request $request)
    {
        $new_user = new usuarioModel();
        $user = session('usu');
       

        $new_user->CH_ID_USUARIO = $request->username;
        $new_user->CH_ID_PERFIL = $request->perfiles;
        $new_user->VC_EMPRESA = $request->empresa;
        $new_user->VC_NOMBRE = $request->nombre;
        $new_user->VC_APELLIDO_PATERNO = $request->apellido_paterno;
        $new_user->VC_APELLIDO_MATERNO = $request->apellido_materno;
        $new_user->CH_ID_DOCUMENTO = $request->tipo_documento;
        $new_user->CH_NUMERO_DOCUMENTO = $request->numero_documento;
        $new_user->VC_EMAIL = $request->email;
        $new_user->VC_PASSWORD = $request->password;
        $new_user->DT_FECHA_CREACION = now();
        $new_user->CH_ID_USUARIO_CREACION = $user->CH_ID_USUARIO;
        $new_user->save();  

        //Esta linea envia el correo electronico 
        Mail::to($new_user->VC_EMAIL)->send(new alertUser($new_user));
        return redirect()->route('listausuarios');

    }

    public function EstadoUsuario(Request $request)
    {
        $idUser = $request->input('idUser');
       $usuario = usuarioModel::where('CH_ID_USUARIO',$idUser)->first();

       if($usuario->VC_ESTADO == 'HABILITADO')
       {
           $usuario->VC_ESTADO = 'DESHABILITADO';
           $usuario->save();

           //cambio de estado en cascada
           usuarioModel::where('CH_ID_USUARIO_CREACION',$usuario->CH_ID_USUARIO)
                        ->update(['VC_ESTADO' => 'DESHABILITADO']);
       }
       else{
           $usuario->VC_ESTADO = 'HABILITADO';
           $usuario->save();    
           //cambio de estado en cascada 
           usuarioModel::where('CH_ID_USUARIO_CREACION',$usuario->CH_ID_USUARIO)
                        ->update(['VC_ESTADO' => 'HABILITADO']);
       }
        return redirect()->route('listausuarios');
    }

    public function configUser(Request $request)
    {
        $usuarioNow = session('usu');

        //Procedemos a verificar las nuevas contraseñas
        $newPassword = $request->input('newPassword');
        $confirmPassword = $request->input('confirmPassword');

        if(empty($newPassword) || empty($confirmPassword) )
        {
            return redirect()->route('configUser')->with(array(
                'message' => 'Debe llenar ambos campos'
            ));  
        }else if($newPassword != $confirmPassword)
        {
            return redirect()->route('configUser')->with(array(
                'message' => 'Las contraseñas no son iguales'
            ));
        }else{
                $usuarioSave = usuarioModel::where('CH_ID_USUARIO',$usuarioNow->CH_ID_USUARIO)
                                            ->update(['VC_PASSWORD' => $confirmPassword]);
            return redirect()->route('configUser')->with(array(
                'messageAcept' => 'Tu clave ha sido cambiada exitosamente'
            ));
        }
    }
    
}
