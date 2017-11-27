<?php 
require 'vendor/PHPExcel/Classes/PHPExcel/IOFactory.php';

$listados = $_POST['listado'];
$cartel= $_POST['cartel'];
$conv = $_GET['conv'];

echo $listados."</br>";
echo $cartel."</br>";
echo $conv. "</br>";
// creamos la conexión con la BBDD

$con = new Conexion();

// Consiltamos el nímero de dias de la sesión 

$sql  = "SELECT COUNT( DISTINCT `Fecha_inicio`) as  'sesiones' FROM `sesion` WHERE `localizador` = '$conv'";
$resultado_sel = $con->query($sql)
or die ("Error en la consulta");

$dias = $resultado_sel->fetch_assoc();
echo $dias['sesiones']."</br>";

//calculamos el numero de usuarios.

$sql  = "SELECT COUNT( DISTINCT `ID_USUARIO`) as  'numPart' FROM `sesion` WHERE `localizador` = '$conv'";
$participantes = $con->query($sql)
or die ("Error en la consulta");

$numPrat = $participantes->fetch_assoc();
echo $numPrat['numPart'];

if ($listados == "Listados"){

    if($dias['sesiones']==1 && $numPrat['numPart'] <= 25){

    $plantilla = "lista.xlsx";

    $sql  = "SELECT `ID_USUARIO`, `DNI`, `Nombre`, `Accion`, `Grupo`,  `localizador`, `Titulo_curso`, `Fecha_inicio`, `Fecha_fin`,   `Proveedor`, `Aula`FROM `sesion` WHERE `localizador` = '$conv'";
    $resultado_sel = $con->query($sql)
    or die ("Error en la consulta");
    $curso = $resultado_sel->fetch_assoc();

    $plantilla = "lista.xlsx"; 
    } else if ($dias['sesiones']==1 && $numPrat['numPart'] >25 && $numPrat['numPart'] <50){

        $plantilla = "lista2.xlsx"; 
        $sql  = "SELECT `ID_USUARIO`, `DNI`, `Nombre`, `Accion`, `Grupo`,  `localizador`, `Titulo_curso`, `Fecha_inicio`, `Fecha_fin`,   `Proveedor`, `Aula`FROM `sesion` WHERE `localizador` = '$conv'";
        $resultado_sel = $con->query($sql)
        or die ("Error en la consulta");
        $curso = $resultado_sel->fetch_assoc();

    }
    //Creo un objeto Excel 2007 CON LA PLANTILLA
    $objPHPExcel = PHPExcel_IOFactory::load("plantillas/".$plantilla);

    // formateo las fechas

      $fecha1=  $curso['Fecha_inicio'];
      $date1  = date_create($fecha1);
      $fecha2=  $curso['Fecha_fin'];
      $date2  = date_create($fecha2);


    //Indicamos que se pare en la hoja uno del libro
    $objPHPExcel->setActiveSheetIndex(0);

    // escribimos la cabecera:

    $objPHPExcel->getActiveSheet()->SetCellValue('B13', "DENOMINACIÓN DE LA ACCIÓN FORMATIVA: ". $curso['Titulo_curso']." Nº CONVOCATORIA: ".$curso['localizador']);
    $objPHPExcel->getActiveSheet()->SetCellValue('B15', "Nº: ".$curso['Accion']  ." GRUPO: ".$curso['Grupo']   ." FECHA DE INICIO: ".date_format($date1,'d-m-Y') ." FECHA FIN: ".date_format($date2,'d-m-Y'));
    $objPHPExcel->getActiveSheet()->SetCellValue('B19', "SESIÓN Nº: ".$dias['sesiones']. " de ".$dias['sesiones']." FECHA: ".date_format($date1,'d-m-Y')." HORARIO: ". date_format($date1,'h:i'). " - ".date_format($date2,'h:i'));

    $linea= 28;

    //Escribimos los articipantes
    while ($row = $resultado_sel->fetch_array()){
    //Escribo
    $objPHPExcel->getActiveSheet()->SetCellValue('B'.$linea, $row['ID_USUARIO']);
    $objPHPExcel->getActiveSheet()->SetCellValue('C'.$linea, $row['Nombre']);
    $objPHPExcel->getActiveSheet()->SetCellValue('D'.$linea, $row['DNI']);
    $linea= $linea+1;
    }

    $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
    $objWriter->save("Listado_de_asistencia.xlsx");

}


}

?>