<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

	<meta charset="UTF-8">
	<title>ticket</title>
    <style>
        .content{
            text-align: center;
        }
        .container{
        border: 1px black solid;
        width: 350px;
        margin-top: 15px;
        margin:auto;
        border-radius: 50%;
        }
        .header{
        display: inline-block;
        border-bottom: 1px black solid;
        height: 50px;
        background: red;
        width: 100%;
        margin-top: 0px;
        }
        .main{
        width: 250px;
        margin: auto;
        }
        .centerImg{
        width: 100%;
        }
        .centerCode{
        text-align: center;
        }
        .items{
        width: 60%;
        margin:auto;
        }
        .logo-img {
        width: 50px;
        margin:0px 10px;
        }
        .logo-img2 {
        width: 150px;
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
        <div>
            <div class="items">
                <img src="images/icons/GobiernoBolivarianoVenezolano.png" alt="logo ministerio" class="logo-img2">
                <img src="images/icons/mppe.png" alt="logo gobernación" class="logo-img2">
                <img src="images/icons/zeg.png" alt="logo zona educativa guarico" class="logo-img2">
            </div>
             <h1 class="header-title">
            Ministerio Del Poder Popular Para la Educación<br/>
            Zona Educativa Del estado Guárico<br/>
            Dirección del municipio Juan Germán Roscio
        </h1>
        </div>
    </div>
    <div class="container">
       
        <div class="header">
            <h3 class="centerCode">{{$data['code']}}</h3>
        </div>
        <div class="main">
            <img class="centerImg" src="images/icons/zeg.png" alt="">
            <h3 class="centerCode">{{$data['direction']}}</h3>
            <h3 class="centerCode">{{$data['ticket']}}</h3>
        </div>
        <div class="footer">
            <div class="items">
                <img src="images/icons/GobiernoBolivarianoVenezolano.png" alt="logo ministerio" class="logo-img">
                <img src="images/icons/mppe.png" alt="logo gobernación" class="logo-img">
                <img src="images/icons/zeg.png" alt="logo zona educativa guarico" class="logo-img">
            </div>
        </div>
    </div>
</body>
</html>