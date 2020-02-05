<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>Nuevo Usuario Registrado</title>
</head>
<body>
	<p> Un nuevo usuario ha sido registrado como administrador</p>
    <p>Estos son los datos del usuario que ha sido registrado:</p>
	<ul>
        <li>Nombre: {{$first_name}}</li>
        <li>Apellido: {{$last_name}}</li>
        <li>cedula: {{$identification_card}}</li>
        <li>correo: {{$email}}</li>
        <li>Teléfono: {{$phone}}</li>
    </ul>
    <p>Y esta es su contraseña:</p>
    <ul>
        <li>Contraseña: {{$password}}</li>
    </ul>
</body>
</html>