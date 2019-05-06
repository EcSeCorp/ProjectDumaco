// Con esto cargamos la vista previa en la carga de imagenes
var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
  };


  //Llenando el documento 
  var imgCapturaPantallaRadioePMP = document.getElementById('CapturaPantallaRadioePMP');