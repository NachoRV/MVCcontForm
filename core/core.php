<?php
/*
El nucleo de la aplicacion
*/
/* Comienza la sesion */
session_start();
/*#Constantes de Conexion*/
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','root');
define('DB_NAME','formacion');

/*define('DB_HOST','mysql508int.srv-hostalia.com');
define('DB_USER','u5167132_nacho');
define('DB_PASS','nachoroyo_12');
define('DB_NAME','db5167132_formacion');*/

/*#constantes de la app*/
//define('HTML_DIR','public/');
define('TITULO','Control de formació');
define('APP_COPY','Copyright&Copy '.date('Y',time()). ' Ignacio Royo-Villanova.');
define('APP_URL','http://localhost/MVCcontForm/');
/*#Estructura*/
//require('vendor/autoload.php');
require('core/models/class.conexion.php');
//require('core/bin/function/Encrypt.php');
//require('core/bin/function/users.php');

//$users = Users();

 ?>
