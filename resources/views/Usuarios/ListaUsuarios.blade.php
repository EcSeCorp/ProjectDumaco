@extends('layouts.index')

@section('content')
<div class="container">
<a class="btn btn-outline-dark" href="#" data-toggle="modal" data-target="#addUser">Nuevo Usuario</a>
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
                                                <input type="text" class="form-control" name="username" placeholder="Username" aria-describedby="inputGroupPrepend" required>
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
                                            <option value="00000001">Administrador</option>
                                            <option value="00000002">Avanzado</option>
                                            <option value="00000003">Intermedio</option>
                                            <option value="00000004">Basico</option>
                                        </select>
			    					</div>
			    				</div>
                        </div>
                            <div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			                    <input type="text" name="empresa"  class="form-control input-sm" placeholder="Empresa">
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
			    						<input type="text" name="numero_documento"  class="form-control input-sm" placeholder="Numero Documento" required>
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
			    				<!-- <div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-sm" placeholder="Confirmar Password">
			    					</div>
			    				</div> -->
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