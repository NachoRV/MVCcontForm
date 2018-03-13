<?php
// Importamos la libreria para manejar elexcel 
require 'vendor/PHPExcel/Classes/PHPExcel/IOFactory.php';
// establecemos la conexion
$con = new Conexion();
// Recuperamos el Fichero 
extract($_POST);

if ($action == 'upload'){

    //cargamos el archivo al servidor modificando el nombre


    $nombreArchivo = $_FILES['excel']['name']; //RECOJEMOS EL NOMBRE DEL ARCHIVO

    $tipo = $_FILES['excel']['type'];//RECOJEMOS EL TIPO
    
    // obtenemos la extension del archivo 
    $info = new SplFileInfo($nombreArchivo);
    $tipo2 = $info->getExtension();  

    // Renombramos el fichero para guardarlo en el servidor, se ira sobreescribiendo con cada carga.    
    $nombreArchivo ="Formaciones.".$tipo2;

    /* COPIAMOS EL ERCHIVO AL SERVIDOR*/
    

     if (copy($_FILES['excel']['tmp_name'],$nombreArchivo)){

        echo '<span class= "menok">Archivo Cargado Con Éxito</span>';

    }else{

        echo 'Error Al Cargar el Archivo';

    }



 //cargamos el documento EN EL OBJETO $objPHPExcel

    if(isset($action )){

    $objPHPExcel = PHPExcel_IOFactory::load($nombreArchivo);

    //establecemos la hoja activa como la 0 la primera

    $objPHPExcel-> setActiveSheetIndex(0);

    // para obtener el numero de filas del documento

    $numRows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();


    //extraer la informacion

    //  echo "</br>'.$numRows'";

    //extraer la informacion
    $sql1  = 'DELETE FROM `cfpresencial`';
    $result1 = $con->query($sql1)
    or die ("error al borrar los  registros");
    

    for($i = 2;$i<=$numRows;$i++){
    // Recorremos el excel recuperando los valores y los vamos insertando en la base de datos
       $localizador = $objPHPExcel->getActiveSheet()->getCell('A'.$i)->getCalculatedValue();
       $titulo = $objPHPExcel->getActiveSheet()->getCell('B'.$i)->getCalculatedValue();
       $fechaInicio = $objPHPExcel->getActiveSheet()->getCell('C'.$i)->getValue();
       $fechafin = $objPHPExcel->getActiveSheet()->getCell('D'.$i)->getValue();

      /*** TRANSFORMA LAS FECHAS DE EXCEL A PHP****/
      
      $timestamp2 = PHPExcel_Shared_Date::ExcelToPHP($fechaInicio);
      date_default_timezone_set('UTC');
      $fecha_php = date("Y-m-d H:i",$timestamp2);
      $timestamp1 = PHPExcel_Shared_Date::ExcelToPHP($fechafin);
      date_default_timezone_set('UTC');
      $fecha_php1 = date("Y-m-d H:i",$timestamp1);


      $gestor = $objPHPExcel->getActiveSheet()->getCell('E'.$i)->getCalculatedValue();
      $lugar= $objPHPExcel->getActiveSheet()->getCell('F'.$i)->getCalculatedValue();
      $proveedor = $objPHPExcel->getActiveSheet()->getCell('G'.$i)->getCalculatedValue();
      $tipo = $objPHPExcel->getActiveSheet()->getCell('H'.$i)->getCalculatedValue();

/**** REEMPLAZAMOS COMILLAS SIMPLES DEL TEXTO DE LOS CURSOS *****/
      $titulo = str_replace("'"," ",$titulo);
      $lugar = str_replace("'"," ",$lugar);
       
      $sql = "INSERT INTO `cfpresencial`(`localizador`, `Titulo del curso`,`Fecha de inicio`,`Fecha fin`,`Gestor_de_formacion`,`Lugar de la formacion`,`Proveedor`,`Tipo de formación`)VALUES ('$localizador','$titulo','$fecha_php','$fecha_php1','$gestor','$lugar','$proveedor','$tipo')";
      //$sql = "INSERT INTO `cfpresencial`(`localizador`,`Titulo del curso`)VALUES ('$localizador','$titulo')";
      $result = $con->query($sql)
      or die ("error al insertar los registros");
     
  }

    echo " <p class='menok'> SE HAN IMPORTADAO $i</br></p>";

}else{
    echo "<span class='menbad'>Error al importar el ficero <span>";
}

echo "</div>";
}
$con->close();

 ?>
