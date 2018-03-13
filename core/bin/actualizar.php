<?php

$con = new Conexion();
$conv= $_GET['conv'];

    $sqlSelect= "SELECT * FROM `tareas` WHERE `locSesion`= '$conv'";
    $resultado_selec = $con->query($sqlSelect)
    or die ("Error en la consulta");
    $datosConvocatoria = $resultado_selec->fetch_assoc();
    echo  $datosConvocatoria[''];
    $con->liberar($resultado_selec);
    $con->close();
?>
