<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <link rel="icon" type="image/png" href="images/icons/zeg.png" sizes="32x32">
	<title>Zona Educativa</title>
	<!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .m-b-md {
                margin-bottom: 5px;
            }
            table {
			  border-collapse: collapse;
			  width: 100%;
			}

			th, td {
			  text-align: left;
			  padding: 4px;
			}

			tr:nth-child(even){background-color: #f2f2f2}

			th {
			  background-color: #E24E42;
			  color: white;
			}
			.margin{
				margin: auto 10;
			}
            .items{
            width: 60%;
            margin:auto;
            }
            .logo-img {
            width: 200px;
            margin:0px 10px;
            }
            .header-title{
                color: black;
                margin:0 5px;
            }
        </style>
</head>
<body>
	<div class="content">
        <div class="header">
            <div class="items">
                <img src="images/icons/GobiernoBolivarianoVenezolano.png" alt="logo ministerio" class="logo-img">
                <img src="images/icons/mppe.png" alt="logo gobernación" class="logo-img">
                <img src="images/icons/zeg.png" alt="logo zona educativa guarico" class="logo-img">
            </div>
        </div>
        <h1 class="header-title">
            Ministerio Del Poder Popular Para la Educación<br/>
            Zona Educativa Del estado Guárico<br/>
            Dirección del municipio Juan Germán Roscio
        </h1>
        <div class="title m-b-md">
            Bitacora 
        </div>
        <h3>Bitacora del 
        @if($user['rol_id'] == 2)
        Administrador
        @endif
        @if($user['rol_id'] != 2)
        Jefe de Zona
        @endif
        {{$user['first_name']}} {{$user['last_name']}}
        </h3>
        <div class="margin">
          <table>
			  <tr>
			    <th>Acción</th>
			    <th>Hora</th>
			    <th>Detalles</th>
			  </tr>
			  @foreach($bit as $item)
			  <tr>
			    <td>{{$item['action']}}</td>
			    <td>{{$item['input']}}</td>
			    <td>{{$item['details']}}</td>
			  </tr>
          	  @endforeach
		</table>
        </div>
    </div>

</body>
</html>