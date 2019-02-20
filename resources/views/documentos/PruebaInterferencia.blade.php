<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Anexo 01 Prueba de Interferencia</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <script src="main.js"></script>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Utlitarios CSS -->
    <link href="css/utilitarios.css" rel="stylesheet">

</head>
<body>
    <div class="row">
        <div class="col-md-12">
            @if($tarea->VC_ID_NODO_B != "")
            <h2>{{ $documentos->VC_NOMBRE_DOCUMENTO }} &nbsp&nbsp&nbsp&nbsp Nodo o IIBB A: {{$tarea->VC_NODO_IIBB_A}} || Nodo B: {{ $tarea->VC_ID_NODO_B}}</h2>
            @else
            <h2>{{ $documentos->VC_NOMBRE_DOCUMENTO }} &nbsp&nbsp&nbsp&nbsp Nodo o IIBB A: {{$tarea->VC_NODO_IIBB_A}} ||Tipo Tarea: {{ $tarea->VC_TIP_LINK}}</h2>
            @endif
        </div>
    </div>
    <div id="navbar-example ">
                
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#tabfrecuencia" role="tab" >Seleccion de Frecuencia</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab"  href="#tabmaterial" role="tab">Materiales</a>
            </li>
        </ul>
        <div class="tab-content">
        <!-- Inicio de Primer Tab -->
            <div class="tab-pane fade show active" id="tabfrecuencia" name="tabfrecuencia" role="tabpanel">
                <div class="content">
                    <div class="row">
                        <div class="col-md-6">Foto Ejemplo</div>
                        <div class="col-md-6">Foto a Subir</div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <img id="imgEjemplo"  src="img/triangulo.gif" >
                        </div>
                        <div class="col-md-6">
                            <img id="imgSubida" src="img/triangulo.gif" />
                        </div>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <input class="btn btn-success" type="submit" id="btnGuardar"  value="Guardar" />
                        </div>
                        <div class="col-md-4"></div>
                    </div>
                </div>
            </div>
            <!-- Fin de Primer Tab -->
            <div class="tab-pane fade" id="tabmaterial" name="tabmaterial" role="tabpanel" >Prueba Material</div>
         </div>

    </div>

    <!-- Scripts para Bootstrap -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script> 
</body>
</html>