<h1 style="text-align: center;">Sistema  para Controlar las Permanencias de  la 
Zona Educativa del Estado Guárico </h1>
<img width="1000" heigth="500" src="public/images/icons/image_principal.png" alt="">
<p>Se trata de una sistema de seguimiento sobre las personas que van a ingresar a alguna de las muchas dependencias del edificio de la zona educativa del estado Guárico, ya sea por motivos de : visita personal, asistencia a una vídeo conferencia, entre otros. Almacenando un registro de las visitas que hayan realizado en el edificio, además que permitirá imprimir tickets con la dirección de la dependencia a al que deseas ingresar brindando un apoyo a la seguridad del edifico.</p>
<h2>Instalación</h2>
<ul>
	<li>- git clone https://github.com/vilo0812/zonaeducativa.git</li>
	<li>sudo chmod -R 777 zonaeducativa</li>
	<li>cd zonaeducativa</li>
	<li>composer install</li>
	<li>cp .env.example .env</li>
	<li>php artisan key:generate</li>
	<li>composer update</li>
	<li>php artisan cache:clear && php artisan config:cache && php artisan config:clear</li>
	<li>composer require tymon/jwt-auth</li>
	<li>php artisan jwt:secret</li>
	<li>Desde la consola (usando MySql) podrías hacer algo similar a esto<br/>
	mysql -uroot -psecret</li>
	<li>CREATE DATABASE tu_base_de_datos;</li>
	<li>Posteriormente debes agregar las credenciales al archivo .env<br/>
	DB_HOST=localhost<br/>
	DB_DATABASE=tu_base_de_datos<br/>
	DB_USERNAME=root<br/>
	DB_PASSWORD=tu-contraseña</li>
	<li>php artisan migrate --seed</li>
	<li>npm install</li>
	<li>npm run dev</li>
</ul>
<span>
	<p>
		puedes ingresar al sistema con el siguiente usuario:
	</p>
	<ul>
		<li>
			correo: gabriel.viloria0812@gmail.com
		</li>
		<li>
			clave: 1234
		</li>
	</ul>
</span>
<small style="text-align: center;">
	Ministerio Del Poder Popular Para la Educación<br/>
	Zona Educativa Del estado Guárico<br/>
	Dirección del municipio Juan Germán Roscio<br/>
	2020-2019
</small>
