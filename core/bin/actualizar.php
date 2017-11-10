<?php

$con = new Conexion();
$conv= $_GET['conv'];


  //$sql  = "SE LECT * FROM `tareas` WHERE `	locSesion` = '$conv";
  /*  $sql  = "SELECT COUNT(`locSesion`) AS locSesion FROM `tareas` WHERE `locSesion`= '$conv'";
  $resultado_sel = $con->query($sql)
  or die ("Error en la consulta");
  $tareasConvocatoria = $resultado_sel->fetch_assoc();
  echo $tareasConvocatoria['locSesion'];

  if($tareasConvocatoria['locSesion']==1){*/

    $sqlSelect= "SELECT * FROM `tareas` WHERE `locSesion`= '$conv'";
    $resultado_selec = $con->query($sqlSelect)
    or die ("Error en la consulta");
    $datosConvocatoria = $resultado_selec->fetch_assoc();
    echo  $datosConvocatoria[''];
    $con->liberar($resultado_selec);
    $con->close();
?>
