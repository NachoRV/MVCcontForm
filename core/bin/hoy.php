<?php 

$con = new Conexion();

$fecha = $_POST['fecha'];
$fecha1 = $fecha." 24:00:00";


if(isset($_POST['fecha'])){

 $fecha= date("Y-m-d H:i:s");
 $fecha1 = $fecha." 23:00:00";

}

$sql  = "SELECT `localizador`, `Titulo_curso`,`Fecha_inicio`,`Fecha_fin`,`Proveedor`, `Aula`, `Gestor`, `Creado` FROM `sesion` WHERE `Fecha_inicio` >='$fecha' and `Fecha_inicio` <='$fecha1' group by `localizador` ORDER BY `Fecha_inicio` ASC";

$resultado_selhoy = $con->query($sql)
or die ("Error en la consulta");
?>