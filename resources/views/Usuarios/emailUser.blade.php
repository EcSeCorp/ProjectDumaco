<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>Registro de Usuario</title>
</head>
<body>
    <p>Se ha creado un usuario con este correo: {{ $receptor->VC_EMAIL }}.</p>
    <p>Estos son los datos del usuario que se ha registrado:</p>
    <ul>
        <li>Nombre: {{ $receptor->VC_NOMBRE }}</li>
        <li>Apellidos: {{ $receptor->VC_APELLIDO_PATERNO.' '.$receptor->VC_APELLIDO_MATERNO }}</li>
        <li>Documento: {{ $receptor->CH_NUMERO_DOCUMENTO }}</li>
    </ul>
    <p>Puede ingresar al aplicativo con la siguiente clave y cambiarla en el apartado configuracion</p>
    <ul>
        <li>Password: {{ $receptor->VC_PASSWORD }}</li>
    </ul>
</body>
</html>