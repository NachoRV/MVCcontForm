<?php

require('../../core/models/class.conexion.php');
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','root');
define('DB_NAME','formacion');

$con = new Conexion();

$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$email = $_POST['email'];
$nivel = $_POST['nivel'];
$contrasena = $_POST['contrasena'];

 $sql = "UPDATE `usuario` SET `nombre`='$nombre',`apellidos`='$apellidos',`correo`='$email',`cotraseña`='$contrasena',`nivel`='$nivel'WHERE `Id_Usuario` = '$Id'";
     
      $result = $con->query($sql)
      or die ("error al insertar los registros");

      $con->close();
?>
<?php
      header("Location: ../..?view=Buscarusuario");
?>
?>