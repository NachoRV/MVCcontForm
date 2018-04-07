<?php 

if(!isset($_POST['Id'])){

$con = new Conexion();
$Id = $_POST['Id'];

$sql  = "SELECT * FROM `usuario` WHERE `Id_Usuario` = '$conv'";

$resultado_sel = $con->query($sql)
or die ("Error en la consulta");
$row = $resultado_selec->fetch_array();
$nombre = $row['nombre'];
$correo = $row['correo'];    
$apellidos = $row['apellidos'];
$id = $row['Id_Usuario'];

}
?>