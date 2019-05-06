<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Anexo 01 Prueba de Interferencia</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <!-- <script src="main.js"></script> -->
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
    <link href="css/PruebaInterferencia.css" rel="stylesheet" >
</head>

<body>
    @foreach($documentos as $docu)
    <div class="row container-fluid">
        <div class="col-md-12 align-content-center">
            @if($tarea->VC_ID_NODO_B != "")
            <h2>{{ $docu->VC_VALOR_CADENA_1 }} &nbsp&nbsp&nbsp&nbsp Nodo o IIBB A: {{$tarea->VC_NODO_IIBB_A}} ||
                Nodo B: {{ $tarea->VC_ID_NODO_B}}</h2>
            @else
            <h2>{{ $docu->VC_VALOR_CADENA_1 }} &nbsp&nbsp&nbsp&nbsp Nodo o IIBB A: {{$tarea->VC_NODO_IIBB_A}}
                ||Tipo Tarea: {{ $tarea->VC_TIP_LINK}}</h2>
            @endif
        </div>
    </div>
    <div id="navbar-example">
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#tabfrecuencia" role="tab">Seleccion de
                    Frecuencia</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tabmaterial" role="tab">Materiales</a>
            </li>
        </ul>
        <div class="tab-content">
            <!-- Inicio de Primer Tab -->
            <div class="tab-pane fade show active" id="tabfrecuencia" name="tabfrecuencia" role="tabpanel">
                <form action="{{ route('pruebaInterferencia') }}" method="POST" enctype="multipart/form-data">
                    <div class="row container-fluid">
                        <div class="col-md-6 col-xs-12">
                            <label for="CapturaPantallaRadioePMPEjemplo">{{ $datos->DESCRIPCION }}</label>
                            <div id="divCapturaPantallaRadioePMPEjemplo" name="divCapturaPantallaRadioePMPEjemplo">
                                <img id="CapturaPantallaRadioePMPEjemplo" name="CapturaPantallaRadioePMPEjemplo"
                                    class="img-fluid" src="storage/{{ $datos->RUTA }} " alt="Responsive image">
                            </div>
                            <!-- <div class="col-md-6">{{ $datos->DESCRIPCION }}</div>
                            <div class="col-md-6">Foto a Subir</div> -->
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group">
                                <div class="box_1 switch_box">
                                    <input class="switch_1" type="checkbox" id="chkCapturaPantallaRadioePMP" value=""
                                        name="chkCapturaPantallaRadioePMP">
                                </div>
                                <div>
                                        <textarea name="CapturaPantallaRadioePMPComentario"
                                        id="CapturaPantallaRadioePMPComentario"></textarea>
                                </div>
                                <input type="file" id="CapturaPantallaRadioePMP" name="CapturaPantallaRadioePMP"
                                    accept="image/*" onchange="loadFile(event)" width="500px" height="auto">
                                <img id="output" float: left/>
                            </div>
                        </div>
                        <br />
                    </div>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <input class="btn btn-success" type="submit" id="btnGuardar" value="Guardar" />
                        </div>
                        <div class="col-md-4"></div>
                    </div>
                    <!-- Datos a enviar ocultos  -->
                    <input type="hidden" id="id_tarea" name="id_tarea" value="{{ $tarea->CH_ID_LINK }}">
                    <input type="hidden" id="id_documento" name="id_documento" value="{{ $docu->CH_ID_VALOR }}">
                </form>
            </div>
            <!-- Fin de Primer Tab -->
            <div class="tab-pane fade" id="tabmaterial" name="tabmaterial" role="tabpanel">Prueba Material</div>
        </div>
    </div>
    <!-- Scripts para Bootstrap -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="javascript/documentoPruebaInterferencia.js"></script>
    @endforeach
</body>

</html>