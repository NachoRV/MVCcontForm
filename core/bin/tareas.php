<?php

$con = new Conexion();
$sql;

if (isset($_POST['enviar'])){

  /** Recuperamos los datos de los filtros **/

$gestor= $_POST['gestor'];
$fecha1= $_POST['fechainicio'];
$fecha2= $_POST['fechafin'];


/*
 echo "Filtors aplicados</br>";
 echo $gestor."</br>";
 echo $fecha1."</br>";
 echo $fecha2."</br></div>";

*/

 

if(!empty($_POST['gestor']) && !empty($_POST['fechainicio']) && !empty($_POST['fechafin'])){
// BUSQUEA POR GESTOR FECHA FIN Y FECHA INICIO - ok
echo "1.1";
$sql  = "SELECT * FROM `cfpresencial` LEFT JOIN tareas ON `localizador` = tareas.locSesion WHERE `Gestor_de_formacion` = '$gestor' AND (`Fecha de inicio`>='$fecha1' AND `Fecha de inicio` <= '$fecha2')ORDER BY `Fecha de inicio` ASC ";
}else if(!empty($_POST['gestor']) && empty($_POST['fechainicio']) && !empty($_POST['fechafin'])){
// BUSQUEDA POR GESTOR FECHA FIN
echo "2";
$sql  = "SELECT * FROM `cfpresencial` LEFT JOIN tareas ON `localizador` = tareas.locSesion WHERE `Gestor_de_formacion` = '$gestor' AND ( `Fecha de inicio` <= '$fecha2') ORDER BY `Fecha de inicio` ASC";
}else if(empty($_POST['gestor']) && $fecha2 !="" &&  $fecha1 !=""){
// BUSQUEDA POR  FECHA FIN Y FECHA INICIO
echo "3";
$sql  = "SELECT * FROM `cfpresencial` LEFT JOIN tareas ON `localizador` = tareas.locSesion WHERE  (`Fecha de inicio`>='$fecha1' AND `Fecha de inicio` <= '$fecha2')ORDER BY `Fecha de inicio` ASC ";
}else if(!empty($_POST['gestor']) && !empty($_POST['fechainicio']) && empty($_POST['fechafin']))
{
  echo "4";
// BUSQUEDA POR GESTOR y fecha inicio

$sql  = "SELECT * FROM `cfpresencial` LEFT JOIN tareas ON `localizador` = tareas.locSesion WHERE `Gestor_de_formacion` = '$gestor' AND (`Fecha de inicio`>='$fecha1')ORDER BY `Fecha de inicio` ASC ";
}else if(empty($_POST['fechainicio']) && empty($_POST['gestor']) && isset($_POST['fechafin'])){
// BUSQUEDA SOLO CON FECHA FIN
echo "5";
$sql  = "SELECT * FROM `cfpresencial` LEFT JOIN tareas ON `localizador` = tareas.locSesion WHERE  (`Fecha de inicio`>= '$fecha2') ORDER BY `Fecha de inicio` ASC";
}else if(empty($_POST['fechafin']) && empty($_POST['gestor']) && !empty($_POST['fechainicio'])){
// Busca las formaciones por el dia de inicio.
echo "6";
$sql  = "SELECT * FROM `cfpresencial` LEFT JOIN tareas ON `localizador` = tareas.locSesion WHERE  (`Fecha de inicio`>='$fecha1')ORDER BY `Fecha de inicio` ASC ";
}else if (empty($_POST['fechainicio']) && empty($_POST['fechafin']) && !empty($_POST['gestor'])){
// Busca por gestor - ok
echo "7";
$fecha1= date("Y-m-d H:i:s");
$sql  = "SELECT * FROM `cfpresencial` LEFT JOIN tareas ON `localizador` = tareas.locSesion WHERE `Gestor_de_formacion` = '$gestor' AND (`Fecha de inicio`>='$fecha1')ORDER BY `Fecha de inicio` ASC ";

}else{
echo "8";
$fecha1= date("Y-m-d H:i:s");
$fecha2 = $fecha1+15;
$sql  = "SELECT * FROM `cfpresencial` LEFT JOIN tareas ON `localizador` = tareas.locSesion WHERE (`Fecha de inicio`>='$fecha1' AND `Fecha de inicio` <= '$fecha2') ORDER BY `Fecha de inicio` ASC ";

}


}else{
  echo "9";
  $fecha1= date("Y-m-d H:i:s");
  $fecha2 = $fecha1+15;
  $sql  = "SELECT * FROM `cfpresencial` LEFT JOIN tareas ON `localizador` = tareas.locSesion WHERE (`Fecha de inicio`>='$fecha1' AND `Fecha de inicio` <= '$fecha2') ORDER BY `Fecha de inicio` ASC";
}
//  $resultado_sel = $con->query($sql)
//  or die ("Error en la consulta");
  $resultado_sel = $con->query($sql)
  or die ("Error en la consulta");

 
  $con->close();

 ?>
