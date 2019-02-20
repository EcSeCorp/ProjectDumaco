@extends('layouts.index')
@php
     $session = session('usu');
@endphp
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <a class="btn btn-outline-dark float-left" href="#" data-toggle="modal" data-target="#addUser">Nuevo Usuario</a>
        </div>
        <div class="col-md-4"></div>
        <div class="col-md-4">
            @if($session->CH_ID_PERFIL == '00000001')
            <a class="btn btn-outline-dark float-right"href="#" data-toggle="modal" data-target="#addCliente">Nuevo Cliente</a>
            @endif
        </div>
    </div>
</div>
<br/>
<div class="table-responsive">
<table class="table table-sm">
  <caption>Lista de Usuarios</caption>
  <thead>
    <tr>
      <th scope="col">Username</th>
      <th scope="col">Perfil</th>
      <th scope="col">Nombres</th>
      <th scope="col">Documento/Nro</th>
      <th scope="col">Email</th>
      <th scope="col">Empresa</th>
      <th scope="col">Estado</th> 
      <!-- <th scope="col">Acciones</th> -->
    </tr>
  </thead>
  <tbody id="miTabla">
      @foreach($usuarios as $usu)
      <form method = "POST" action = "{{ route('changeState')}}"> 
      <tr>
          <td scope="row">{{ $usu->CH_ID_USUARIO}}</td>
          <td>{{ $usu->perfil['VC_NOMBRE']}}</td>        
          <td>{{ $usu->VC_NOMBRE.' '.$usu->VC_APELLIDO_PATERNO.' '.$usu->VC_APELLIDO_MATERNO}}</td>
          <td>{{ $usu->documentoIdentidad['VC_NOMBRE_DOCUMENTO'].': '.$usu->CH_NUMERO_DOCUMENTO}}</td>
          <td>{{ $usu->VC_EMAIL}}</td>
          <td>{{ $usu->VC_EMPRESA}}</td>
          <input type="hidden" id="userID" name="idUser" value="{{ $usu->CH_ID_USUARIO }}">
          @if($usu->VC_ESTADO == 'HABILITADO')
          <td><input class="btn btn-info" type="submit" name="estado" value="{{ $usu->VC_ESTADO }}"/></td>
          @else
          <td><input class="btn btn-danger" type="submit" name="estado" value="{{ $usu->VC_ESTADO }}"/></td>
          @endif
          <!-- <td>
              <a class="nav-link" href="#">
                  <i class="fas fa-fw fas fa-archive"></i>
                  <span>Eliminar</span>
              </a>
          </td> -->
      </tr>
      </form>
      @endforeach
  </tbody>
</table>
</div>
<!-- Esto es para la paginacion -->
 <!--  echo $usuarios->render(); ?>  -->


<!-- Modal para agregar Usuario -->
<div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Registrar Usuario</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
              <!-- Ingreso de Formulario -->
                    <form role="form" action="{{ route('addUser')}}" method="POST">
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                                            </div>
                                                <input type="text" class="form-control" name="username"  placeholder="Username" aria-describedby="inputGroupPrepend" required>
                                            <div class="invalid-feedback">
                                                Please choose a username.
                                            </div>
                                        </div>
                                    </div>
                            </div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<select name="perfiles" class=" custom-select form-control" >
                                            <option selected>Escoger un Perfil</option>
                                            @if($session->CH_ID_PERFIL == '00000001')
                                            <option value="00000001">Administrador</option>
                                            <option value="00000002">Avanzado</option>
                                            @endif
                                            @if($session->CH_ID_PERFIL == '00000001' || $session->CH_ID_PERFIL == '00000002')
                                            <option value="00000003">Intermedio</option>
                                            @endif
                                            <option value="00000004">Basico</option>
                                        </select>
			    					</div>
			    				</div>
                        </div>
                            <div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
                                        <input type="text" name="empresa" id="empresa" class="form-control input-sm" placeholder="Nombre Empresa" required>
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="text" name="nombre" id="last_name" class="form-control input-sm" placeholder="Nombre" required>
			    					</div>
			    				</div>
			    			</div>
			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			                    <input type="text" name="apellido_paterno" id="first_name" class="form-control input-sm" placeholder="Apellido Paterno" required>
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="text" name="apellido_materno" id="last_name" class="form-control input-sm" placeholder="Apellido Materno" required>
			    					</div>
			    				</div>
			    			</div>
                            <div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
                                        <select name="tipo_documento" class=" custom-select form-control" required>
                                            <option selected>Tipo Documento</option>
                                            <option value="00000001">DNI</option>
                                            <option value="00000002">Pasaporte</option>
                                        </select>
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="text" name="numero_documento" maxlength="8" class="form-control input-sm" placeholder="Numero Documento" required>
			    					</div>
			    				</div>
			    			</div>
			    			<div class="form-group">
			    				<input type="email" name="email"  class="form-control input-sm" placeholder="Correo Electronico" required>
			    			</div>

			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="password" name="password" id="password" class="form-control input-sm" placeholder="Password" required>
			    					</div>
			    				</div>
                                @if($session->CH_ID_PERFIL == '00000001')
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
                                        <select name="cliente" class="custom-select form-control">
                                        <option selected>Elegir Cliente</option>
                                            @foreach($clientes as $cliente)
                                            <option value="{{ $cliente->IN_ID_CLIENTE}}">{{ $cliente->VC_NOMBRE}}</option>
                                            @endforeach
                                        </select>
			    					</div>
			    				</div>
                                @endif
			    			</div>
			    			
			    			<input type="submit" value="Registrar" class="btn btn-info btn-block">
                    </form>
              <!-- Fin de Formulario -->
          </div>
          <!-- <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="{{ url('/') }}">Logout</a>
          </div> -->
        </div>
      </div>
</div>
<!-- Fin del Modal -->

<!-- Modal para agregar Cliente -->
<div class="modal fade" id="addCliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Registrar Cliente</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
              <!-- Ingreso de Formulario -->
                    <form role="form" action="{{ route('addCliente')}}" method="POST">
                            <div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			                    <input type="text" name="cliente"  class="form-control input-sm" placeholder="Nombre Cliente">
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="text" name="ruc" id="RUC" minlength="11" maxlength="11" class="form-control input-sm" placeholder="RUC" required>
			    					</div>
			    				</div>
			    			</div>
			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			                    <input type="text" name="pais" id="pais" class="form-control input-sm" placeholder="Pais" required>
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="text" name="ciudad" id="ciudad" class="form-control input-sm" placeholder="Ciudad" required>
			    					</div>
			    				</div>
			    			</div>
			    			<div class="form-group">
			    				<input type="text" name="direccion"  class="form-control input-sm" placeholder="Direccion" required>
			    			</div>
                            <div class="form-group">
                                <input type="email" name="email" id="email" class="form-control input-sm" placeholder="Email" required>
                            </div>
			    			
			    			<input type="submit" value="Registrar" class="btn btn-info btn-block">
                    </form>
              <!-- Fin de Formulario -->
          </div>
          <!-- <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="{{ url('/') }}">Logout</a>
          </div> -->
        </div>
      </div>
</div>
<!-- Fin del Modal -->
@endsection