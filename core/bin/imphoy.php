<?php

require 'vendor/PHPExcel/Classes/PHPExcel/IOFactory.php';

$con = new Conexion();

extract($_POST);

//echo $_FILES['excel']['tmp_name'];/* SACA LA RUTA TEMPORAL DEL FICHERO CARGADO */

if ($action == 'upload'){

    //cargamos el archivo al servidor con el mismo nombre


    $nombreArchivo = $_FILES['excel']['name']; //RECOJEMOS EL NOMBRE DEL ARCHIVO

    $tipo = $_FILES['excel']['type'];//RECOJEMOS EL TIPO


    /* COPIAMOS EL ERCHIVO AL servidor */
    if (copy($_FILES['excel']['tmp_name'],$nombreArchivo)){

        echo '<span class= "menok">Archivo Cargado Con Éxito</span></br>';

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

    $sql1  = 'DELETE FROM `sesion`';
    $result1 = $con->query($sql1)
    or die ("error al borrar los  registros");
    

    for($i = 2;$i<=$numRows;$i++){

       $ID_USUARIO  = $objPHPExcel->getActiveSheet()->getCell('A'.$i)->getCalculatedValue();
       $DNI = $objPHPExcel->getActiveSheet()->getCell('B'.$i)->getCalculatedValue();
       $Nombre = $objPHPExcel->getActiveSheet()->getCell('C'.$i)->getCalculatedValue();
       $Correo = $objPHPExcel->getActiveSheet()->getCell('D'.$i)->getCalculatedValue();

      $Sociedad = $objPHPExcel->getActiveSheet()->getCell('E'.$i)->getCalculatedValue();
      $Bonificable = $objPHPExcel->getActiveSheet()->getCell('F'.$i)->getCalculatedValue();
      $Accion  = $objPHPExcel->getActiveSheet()->getCell('G'.$i)->getCalculatedValue();
      $Grupo  = $objPHPExcel->getActiveSheet()->getCell('H'.$i)->getCalculatedValue();
      $Id_formación   = $objPHPExcel->getActiveSheet()->getCell('I'.$i)->getCalculatedValue();
      $localizador  = $objPHPExcel->getActiveSheet()->getCell('J'.$i)->getCalculatedValue();
      $Imparticion   = $objPHPExcel->getActiveSheet()->getCell('K'.$i)->getCalculatedValue();
      $Tipo_Formacion  = $objPHPExcel->getActiveSheet()->getCell('L'.$i)->getCalculatedValue();
      $Titulo_curso   = $objPHPExcel->getActiveSheet()->getCell('M'.$i)->getCalculatedValue();
      $Objetivo   = $objPHPExcel->getActiveSheet()->getCell('N'.$i)->getCalculatedValue();

      $Fecha_inicio   = $objPHPExcel->getActiveSheet()->getCell('P'.$i)->getValue();
      $Fecha_fin  = $objPHPExcel->getActiveSheet()->getCell('Q'.$i)->getValue();
      $Horas_sesion   = $objPHPExcel->getActiveSheet()->getCell('R'.$i)->getCalculatedValue();
      $Duracion_formacion = $objPHPExcel->getActiveSheet()->getCell('S'.$i)->getCalculatedValue();
      $Horas_formacion   = $objPHPExcel->getActiveSheet()->getCell('S'.$i)->getCalculatedValue();
      $Proveedor   = $objPHPExcel->getActiveSheet()->getCell('T'.$i)->getCalculatedValue();
      $Estado_expedient   = $objPHPExcel->getActiveSheet()->getCell('U'.$i)->getCalculatedValue();
      $Ciudad   = $objPHPExcel->getActiveSheet()->getCell('V'.$i)->getCalculatedValue();
      $Aula   = $objPHPExcel->getActiveSheet()->getCell('W'.$i)->getCalculatedValue();
      $Gestor   = $objPHPExcel->getActiveSheet()->getCell('X'.$i)->getCalculatedValue();
      $Creado   = $objPHPExcel->getActiveSheet()->getCell('Y'.$i)->getCalculatedValue();

      /*** TRANSFORMA LAS FECHAS DE EXCEL A php ****/
      
      $timestamp2 = PHPExcel_Shared_Date::ExcelToPHP($Fecha_inicio);
     date_default_timezone_set('UTC');
      $fecha_php = date("Y-m-d H:i",$timestamp2);
      $timestamp1 = PHPExcel_Shared_Date::ExcelToPHP($Fecha_fin);
     date_default_timezone_set('UTC');
      $hora= date_default_timezone_get();
      $fecha_php1 = date("Y-m-d H:i",$timestamp1);

/**** REEMPLAZAMOS COMILLAS SIMPLES DEL TEXTO DE LOS CURSOS *****/

      $Titulo_curso = str_replace("'"," ",$Titulo_curso);
      $Aula = str_replace("'"," ",$Aula);

    
      $sql = "INSERT INTO  `sesion`(`ID_USUARIO`, `DNI`, `Nombre`, `Correo`, `Sociedad`, `Bonificable`, `Accion`, `Grupo`, `Id_formación`, `localizador`, `Imparticion`, `Tipo_Formacion`, `Titulo_curso`, `Objetivo`, `Fecha_inicio`, `Fecha_fin`, `Horas_sesion`, `Duracion_formacion`, `Horas_formacion`, `Proveedor`, `Estado_expedient`, `Ciudad`, `Aula`, `Gestor`, `Creado`) 
      VALUES ('$ID_USUARIO','$DNI','$Nombre','$Correo','$Sociedad','$Bonificable','$Accion','$Grupo','$Id_formación','$localizador','$Imparticion','$Tipo_Formacion','$Titulo_curso','$Objetivo','$fecha_php','$fecha_php1','$Horas_sesion','$Duracion_formacion','$Horas_formacion','$Proveedor','$Estado_expedient','$Ciudad','$Aula','$Gestor','$Creado')";
     
      $result = $con->query($sql)
      or die ("error al insertar los registros");
     

      //echo "$ID_USUARIO','$DNI','$Nombre','$Correo','$Sociedad','$Bonificable','$Accion','$Grupo','$Id_formación','$localizador','$Imparticion','$Tipo_Formacion','$Titulo_curso','$Objetivo','$fecha_php','$fecha_php1','$Horas_sesion','$Duracion_formacion','$Horas_formacion','$Proveedor','$Estado_expedient','$Ciudad','$Aula','$Gestor','$Creado'</br>";


  }


    echo " <p class='menok'> SE HAN IMPORTADAO $i</br></p>";

}else{
    echo "<span class='menbad'>importa el fichero<span>";
}

echo "</div>";
}
$con->close();

 ?>