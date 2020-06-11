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
            .header{

            }
            .items{
            width: 60%;
            margin:auto;
            }
            .logo-img {
            width: 50px;
            margin:0px 10px;
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
            Registro de visitas
        </div>
        <div class="margin">
          <table>
			  <tr>
			    <th>nombre</th>
			    <th>apellido</th>
			    <th>cedúla</th>
			    <th>teléfono</th>
			    <th>procedencia</th>
			    <th>sector</th>
			    <th>pase</th>
                <th>observación</th>
			    <th>llegada</th>
			    <th>salida</th>
			  </tr>
			  @foreach($data as $item)
			  <tr>
			    <td>{{$item['first_name']}}</td>
			    <td>{{$item['last_name']}}</td>
			    <td>{{$item['identification_card']}}</td>
			    <td>{{$item['phone']}}</td>
			    <td>{{$item['provenance']}}</td>
			    <td>{{$item['sector']}}</td>
			    <td>{{$item['ticket']}}</td>
                <td>{{$item['observation']}}</td>
                <td>{{$item['input']}}</td>
			    <td>{{$item['output']}}</td>
			  </tr>
          	  @endforeach
		</table>
        </div>
    </div>

</body>
</html>