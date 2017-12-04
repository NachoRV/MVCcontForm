<?php
include "../models/class.usuario.php";

$correo = $_POST['email'];
$Contrasena = $_POST['contrasena'];
echo $correo. "- ".$Contrasena;
$usuario = new Usuario();

$datosUsuarop = $usuario->usuarioLogin($correo, $Contrasena);


echo $datosUsuarop['nombre'];
header("Location: ../../");
?>