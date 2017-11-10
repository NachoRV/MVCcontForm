<?php

$con = new Conexion();
$sql;
if (isset($_POST['enviar'])){

  /** Recuperamos los datos de los filtros **/

$gestor= $_POST['gestor'];
$fecha1= $_POST['fechainicio'];
$fecha2= $_POST['fechafin'];
echo "Filtors aplicados</br>";
echo $gestor."</br>";
echo $fecha1."</br>";
echo $fecha2."</br>";

if($gestor !="" && $fecha1 != "" && $fecha2 !="" ){
// BUSQUEA POR GESTOR FECHA FIN Y FECHA INICIO

$sql  = "SELECT * FROM `cfpresencial` LEFT JOIN tareas ON `localizador` = tareas.locSesion WHERE `Gestor_de_formacion` = '$gestor' AND (`Fecha de inicio`>='$fecha1' AND `Fecha fin` <= '$fecha2')ORDER BY `Fecha de inicio` ASC ";
}else if(isset($_POST['fechainicio']) && $fecha2 !="" &&  $gestor !=""){
// BUSQUEDA POR GESTOR FECHA FIN

$sql  = "SELECT * FROM `cfpresencial` LEFT JOIN tareas ON `localizador` = tareas.locSesion WHERE `Gestor_de_formacion` = '$gestor' AND ( `Fecha fin` <= '$fecha2') ORDER BY `Fecha de inicio` ASC";
}else if(isset($_POST['gestor']) && $fecha2 !="" &&  $fecha1 !=""){
// BUSQUEDA POR  FECHA FIN Y FECHA INICIO
;
$sql  = "SELECT * FROM `cfpresencial` LEFT JOIN tareas ON `localizador` = tareas.locSesion WHERE  (`Fecha de inicio`>='$fecha1' AND `Fecha fin` <= '$fecha2')ORDER BY `Fecha de inicio` ASC ";
}else if($gestor !="" && $fecha1 != "" && isset($_POST['fechafin']))
{
// BUSQUEDA POR GESTOR

$sql  = "SELECT * FROM `cfpresencial` LEFT JOIN tareas ON `localizador` = tareas.locSesion WHERE `Gestor_de_formacion` = '$gestor' AND (`Fecha de inicio`>='$fecha1')ORDER BY `Fecha de inicio` ASC ";
}else if((isset($_POST['fechainicio']) && isset($_POST['gestor'])) &&  $fecha2 !=""){
// BUSQUEDA SOLO CON FECHA FIN

$sql  = "SELECT * FROM `cfpresencial` LEFT JOIN tareas ON `localizador` = tareas.locSesion WHERE  (`Fecha fin`<= '$fecha2') ORDER BY `Fecha de inicio` ASC";
}else if(isset($_POST['fechafin']) && isset($_POST['gestor']) && $fecha1 != ""){
// Busca las formaciones por el dia de inicio.

$sql  = "SELECT * FROM `cfpresencial` LEFT JOIN tareas ON `localizador` = tareas.locSesion WHERE  (`Fecha de inicio`='$fecha1')ORDER BY `Fecha de inicio` ASC ";
}else if (isset($_POST['fechainicio']) && isset($_POST['fechafin']) && $gestor !=""){
// Busca por gestor y fecha de inicio

$sql  = "SELECT * FROM `cfpresencial` LEFT JOIN tareas ON `localizador` = tareas.locSesion WHERE  `Gestor_de_formacion` = '$gestor' ORDER BY `Fecha de inicio` ASC ";
$sql  = "SELECT * FROM `cfpresencial` LEFT JOIN tareas ON `localizador` = tareas.locSesion WHERE `Gestor_de_formacion` = '$gestor' AND (`Fecha de inicio`>='$fecha1')ORDER BY `Fecha de inicio` ASC ";

}else{

$fecha1= date("Y-m-d H:i:s");
$fecha2 = $fecha1+15;
$sql  = "SELECT * FROM `cfpresencial` LEFT JOIN tareas ON `localizador` = tareas.locSesion WHERE (`Fecha de inicio`>='$fecha1' AND `Fecha fin` <= '$fecha2') ORDER BY `Fecha de inicio` ASC ";

}


}else{

  $fecha1= date("Y-m-d H:i:s");
  $fecha2 = $fecha1+15;
  $sql  = "SELECT * FROM `cfpresencial` LEFT JOIN tareas ON `localizador` = tareas.locSesion WHERE (`Fecha de inicio`>='$fecha1' AND `Fecha fin` <= '$fecha2') ORDER BY `Fecha de inicio` DESC ";
}
//  $resultado_sel = $con->query($sql)
//  or die ("Error en la consulta");
  $resultado_sel = $con->query($sql)
  or die ("Error en la consulta");

 
  $con->close();

 ?>
