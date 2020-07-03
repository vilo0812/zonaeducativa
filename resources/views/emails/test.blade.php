<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <link rel="icon" type="image/png" href="images/icons/zeg.png" sizes="32x32">
    <title>Zona Educativa</title>
    <style>
        html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }
        .items{
            width: 50%;
            margin:auto;
            }
        .logo-img {
        width: 200px;
        margin:0px 10px;
        }
        .header-title{
            text-align: center;
            color: black;
            margin:0 5px;
        }
        .message{
            border:1px solid black;
            margin:30px;
            padding:30px;
        }
        .title {
        font-size: 24px;
        }
        .bold{
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="content">
     <h1 class="header-title">
        Ministerio Del Poder Popular Para la Educación<br/>
        Zona Educativa Del estado Guárico<br/>
        Dirección del municipio Juan Germán Roscio
    </h1>
    <div class="message">
    @if($rol_id == 2) 
    <p class="title bold"> Su usuario ha sido registrado como administrador en el sistema de control de permanencias de la zona educativa del estado guarico</p>
    @elseif($rol_id == 4)
    <p class="title bold"> Su usuario ha sido registrado como jefe de zona en el sistema de control de permanencias de la zona educativa del estado guarico</p>
    @endif
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
        <li >Contraseña: 
            <span class="bold">
                {{$password}}
            </span>    
        </li>
    </ul>
    <small>puede cambiar su contraseña en cualquier momento</small>
    </div>
</div>
</body>
</html>