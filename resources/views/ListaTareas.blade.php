@extends('layouts.index')

@section('content')
<form method="POST" action="{{ route('busquedaNodo')}}">
<div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <diV class="col-md-6">
                        <input type="text" name="nodo" placeholder="Ingresar Nodo"/>
                    </div>
                    <div class="col-md-6">
                        <input class="" type="submit" name="Buscar" value="Buscar" />
                    </div>
                </div>
            </div>
        </div>
</div>
<br/>
</form>
<div class="table-responsive">
<table class="table table-sm">
  <caption>Lista de Tareas</caption>
  <thead>
    <tr>
      <th scope="col">Tarea</th>
      <th scope="col">T.Tarea</th>
      <th scope="col">T.Nodo A</th>
      <th scope="col">Nodo A</th>
      <th scope="col">T.Nodo B</th>
      <th scope="col">Nodo B</th>
      <th scope="col">Contratista</th>
      <th scope="col">Acciones</th> 
    </tr>
  </thead>
  <tbody id="miTabla">
      @foreach($tareas as $tarea)
      <tr>
          <td scope="row">{{ $tarea->CH_ID_LINK}}</td>
          <td>{{ $tarea->VC_TIP_LINK }}</td>        
          <td>{{ $tarea->VC_TIP_NODO_A }}</td>
          <td>{{ $tarea->VC_NODO_IIBB_A }}</td>
          <td>{{ $tarea->VC_TIP_NODO_B}}</td>
          <td>{{ $tarea->VC_ID_NODO_B}}</td>
          <td>{{ $tarea->VC_CONTRATISTA}}</td>
          <td>
          <form method="post" action="{{ route('listadoc')}}">
            <input type="hidden" name="id_tarea" value = "{{ $tarea->CH_ID_LINK}}">
            <input type="hidden" name="tipotarea" value = "{{ $tarea->VC_TIP_LINK}}" />
            <input type="submit" value="T"> 
          </form>
          </td>
      </tr>
      @endforeach
  </tbody>
</table>
</div>
@php 
echo $tareas->render(); 
@endphp 
<!-- Esto es para la paginacion -->



@endsection
