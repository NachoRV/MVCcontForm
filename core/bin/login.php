<?php

include "../models/class.usuario.php";
session_start();
$correo = $_POST['email'];
$Contrasena = $_POST['contrasena'];

$usuario = new Usuario();

$datosUsuarop = $usuario->usuarioLogin($correo, $Contrasena);

$_SESSION['nombreUsuario'] = $datosUsuarop['nombre'];
$_SESSION['apellidos'] = $datosUsuarop['apellidos'];
$_SESSION['email'] = $datosUsuarop['correo'];
$_SESSION['nivel'] = $datosUsuarop['nivel'];

header("Location: ../../");
?>