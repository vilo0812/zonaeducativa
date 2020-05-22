<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

	<meta charset="UTF-8">
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
        </style>
</head>
<body>
	<div class="content">
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