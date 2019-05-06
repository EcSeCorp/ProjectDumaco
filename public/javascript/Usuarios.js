// var btncarga = document.getElementById('btncarga');
// btncarga.addEventListener( 'click', function(){
//     var peticion = new XMLHttpRequest();
//     peticion.open('POST','/post/ListaUsuarios');
//     peticion.onreadystatechange =  function(){

//     }
//     peticion.send();
// });
//Mostrar Usuarios en Lista
var btncarga = document.getElementById('btncarga');


btncarga.addEventListener('click', function () {
    var tabla = document.getElementById('tabla');
    tabla.innerHTML = '<tr><th >Username</th><th>Perfil</th><th>Nombres</th><th>Documento/Nro</th><th>Email</th><th>Empresa</th><th>Estado</th></tr>';

    var peticion = new XMLHttpRequest();
    peticion.open('POST', '/post/ListaUsuarios');

    peticion.onload = function () {
        var datos = JSON.parse(peticion.responseText);
        // console.log(datos);
        for (var i = 0; i < (datos.usuarios).length; i++) {
            var fila = document.createElement('tr');
            fila.innerHTML += ("<td>" + datos.usuarios[i].CH_ID_USUARIO + "</td>");
            fila.innerHTML += ("<td>" + datos.usuarios[i].CH_ID_PERFIL + "</td");
            fila.innerHTML += ("<td>" + datos.usuarios[i].VC_NOMBRE + datos.usuarios[i].VC_APELLIDO_PATERNO + datos.usuarios[i].VC_APELLIDO_MATERNO + "</td");
            fila.innerHTML += ("<td>" + datos.usuarios[i].CH_ID_DOCUMENTO + datos.usuarios[i].CH_NUMERO_DOCUMENTO + "</td");
            fila.innerHTML += ("<td>" + datos.usuarios[i].VC_EMAIL + "</td");
            fila.innerHTML += ("<td>" + datos.usuarios[i].VC_EMPRESA + "</td");
            fila.innerHTML += ("<td>valor</td");
            tabla.appendChild(fila);
        }

    }

    peticion.send();

});


