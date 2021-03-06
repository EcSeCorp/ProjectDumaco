    @extends('layouts.index')

    @section('content')
        <div class="container">
            @if(session('message'))
                <div class="alert  alert-success" role="alert">
                        {{session('message')}}
                </div>
            @endif
        </div>
    <div class="container">
        <form action="{{ route('CargaMasiva')}}" method="POST" enctype="multipart/form-data" >
        <h1>Prueba de Carga de Archivos</h1>
            <div class="fprm-group">
                <select name="tablasExcel">
                    <option value="Nodo">Tabla Nodo</option>
                    <option value="EquipamientoAIO">Tabla Equipamiento AIO</option>
                    <option value="Diseno">Tabla Diseno</option>
                    <option value="Tarea">Tabla Tareas</option>
                    <option value="Pmp">Tabla Pmp</option> 
                    <option value="IpPlaningPMP">Ip Planing PMP</option>
                    <option value="Ptp">Tabla Ptp</option>
                    <option value="IpPlaningPTP">Ip Planing PTP</option>
                </select>
                <input type="file" class="btn btn-info" name="fileexcel"/>
            </div>
            <div class="form-group">
            <!-- <label for="excel">Subir Archivo Excel</label> -->
            <!-- <input type="file" class="form-control" name="fileexcel"/> -->
            </div>
            <div>
                <input type="submit" class="btn btn-success" value="Cargar"/>
            </div>
        </form>
    </div>
    
    @endsection
