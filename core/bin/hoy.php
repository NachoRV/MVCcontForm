<?php 

$con = new Conexion();

$fecha = $_POST['fecha'];
$fecha1 = "$fecha"."24:00:00";

 $sql  = "SELECT `localizador`, `Titulo_curso`,`Fecha_inicio`,`Fecha_fin`,`Proveedor`, `Aula`, `Gestor`, `Creado` FROM `sesion` WHERE `Fecha_inicio` >='$fecha' and `Fecha_inicio` <='$fecha1' group by `localizador`";

$resultado_sel = $con->query($sql)
or die ("Error en la consulta");
?>