<?php
/*
El nucleo de la aplicacion
*/
/* Comienza la sesion */

session_start();

// Constantes de Conexion local 

define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','root');
define('DB_NAME','formacion');

// Constantes de Conexion En el servidor
/***
define('DB_HOST','mysql508int.srv-hostalia.com');
define('DB_USER','u5167132_nacho');
define('DB_PASS','nachoroyo_22');
define('DB_NAME','db5167132_formacion');
***/

/*#constantes de la app*/

define('TITULO','Control de formació');
define('APP_COPY','Copyright&Copy '.date('Y',time()). ' Ignacio Royo-Villanova.');
define('APP_URL','http://localhost/MVCcontForm/');

require('core/models/class.conexion.php');
;


 ?>
