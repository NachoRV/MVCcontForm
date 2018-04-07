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
$contrasena1 = $_POST['contrasena1'];

// echo  "'$nombre' '$apellidos' '$email' '$nivel' '$contrasena' '$contrasena1'";
 $sql = "INSERT INTO `usuario`(`Id_Usuario`, `nombre`, `apellidos`, `correo`, `cotraseña`, `nivel`) VALUES (default,'$nombre','$apellidos','$email','$contrasena','$nivel')";
     
      $result = $con->query($sql)
      or die ("error al insertar los registros");

      $con->close();
?>
<?php
      header("Location: ../..?view=altusuario");
?>
