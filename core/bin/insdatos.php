<?php
/*
define('DB_HOST','mysql508int.srv-hostalia.com');
define('DB_USER','u5167132_nacho');
define('DB_PASS','nachoroyo_22');
define('DB_NAME','db5167132_formacion');*/

 
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','root');
define('DB_NAME','formacion');

require('../../core/models/class.conexion.php');

$con= new Conexion();

/**Recupero los daros del formulario**/

$loc = $_POST['localizador'];
$bonic = trim(strtoupper($_POST["bonificado"]));
$mon = trim($_POST["petMontaje"]);
$acceso = trim(strtoupper($_POST["Acceso"]));
$ot = trim(strtoupper($_POST["Orange_Trainer"]));
$envdoc =trim(strtoupper($_POST["Envio_doc"]));
$recdoc = trim(strtoupper($_POST["Recibuda_doc"]));
//$accion= trim(strtoupper($_POST['accion']));

  $sql  = "SELECT COUNT(`locSesion`) AS locSesion FROM `tareas` WHERE `locSesion`= '$loc'";
  $resultado_sel = $con->query($sql)
  or die ("Error en la consulta");
  $tareasConvocatoria = $resultado_sel->fetch_assoc();

  //  echo $tareasConvocatoria['locSesion'];

  if($tareasConvocatoria['locSesion']==1){
    $accion = "UP";
  }else{

    $accion = "IN";
  }

if($accion == "UP"){

  $sql= "UPDATE `tareas` SET `Bonficado`= '$bonic',`Pet Montaje`='$mon',`Acceso`='$acceso',`Orange Trainer`='$ot',`Envio doc`='$envdoc',`Recibuda doc`='$recdoc' WHERE `locSesion`='$loc'";
  $resultado_selec = $con->query($sql)
  or die ("Error en la consulta");
header("Location: ../../?view=tareas");

}else if($accion == "IN"){

  $sql= "INSERT INTO `tareas`(`locSesion`, `Bonficado`, `Pet Montaje`, `Acceso`, `Orange Trainer`, `Envio doc`, `Recibuda doc`) VALUES ('$loc','$bonic','$mon','$acceso','$ot','$envdoc','$recdoc')";
  $resultado_selec = $con->query($sql)
  or die ("Error en la consulta");

  header("Location: ../../?view=tareas");
}
$con->liberar($resultado_selec);
$con->close();

?>
