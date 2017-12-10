<?php
include "../models/class.usuario.php";

$correo = $_POST['email'];
$Contrasena = $_POST['contrasena'];

$usuario = new Usuario();

$datosUsuarop = $usuario->usuarioLogin($correo, $Contrasena);

$_SESSION['nombreUsuario'] = $datosUsuarop['nombre'];


echo $_SESSION['nombreUsuario'];
/*header("Location: ../../");*/
?>