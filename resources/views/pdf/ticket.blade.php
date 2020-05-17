<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

	<meta charset="UTF-8">
	<title>ticket</title>
    <style>
        .container{
        border: 1px black solid;
        border-radius: 50%;
        width: 350px;
        margin:auto;
        }
        .header{
        border-bottom: 1px black solid;
        height: 50px;
        background: red;
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
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            
        </div>
        <div class="main">
            <img class="centerImg" src="images/icons/zeg.png" alt="">
            <h3 class="centerCode">{{$data}}</h3>
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