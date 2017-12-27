<?php 
require 'vendor/PHPExcel/Classes/PHPExcel/IOFactory.php';

include_once 'vendor/autoload.php';


use PhpOffice\PhpWord\TemplateProcessor;

// include 'core/funciones/cartel.php';

$listados = $_POST['listado'];
$cartel= $_POST['cartel'];
$conv = $_GET['conv'];
$correo = $_POST['Correo'];


// creamos la conexión con la BBDD

$con = new Conexion();

// Consultamos el nímero de dias de la sesión 
/* pendiente de borrado*/
$sql  = "SELECT COUNT( DISTINCT `Fecha_inicio`) as  'sesiones' FROM `sesion` WHERE `localizador` = '$conv'";
$resultado_sel = $con->query($sql)
or die ("Error en la consulta");
$dias = $resultado_sel->fetch_assoc();
$dias = $dias['sesiones'];

//calculamos el numero de usuarios.

$sql  = "SELECT COUNT( DISTINCT `ID_USUARIO`) as  'numPart' FROM `sesion` WHERE `localizador` = '$conv'";
$participantes = $con->query($sql)
or die ("Error en la consulta");
$numPrat = $participantes->fetch_assoc();


/** 
 * selecciono los datos de la convocatoria
 */

 $sql = "SELECT `Titulo del curso`,`Fecha de inicio`,`Fecha fin` FROM `cfpresencial` WHERE `localizador` ='$conv'";
 $resultado = $con->query($sql)
 or die ("Error en la consulta");
 $convocatoria = $resultado ->fetch_assoc();

 $sql  = "SELECT DISTINCT (`ID_USUARIO`), `DNI`, `Nombre`, `Accion`, `Grupo`,  `localizador`, `Titulo_curso`,`Proveedor`, `Aula`FROM `sesion` WHERE `localizador` = '$conv'";
 $resultado_sel = $con->query($sql)
or die ("Error en la consulta");
$curso = $resultado_sel->fetch_assoc();

 $titulo = $convocatoria['Titulo del curso'];
 $AF = $curso['Accion'];
 $G = $curso['Grupo'];

    $fecha1= $convocatoria['Fecha de inicio'];;
    $date1  = date_create($fecha1);
    $fecha2= $convocatoria['Fecha fin'];
    $date2  = date_create($fecha2);
    $fechaInicio = date_format($date1,'d-m-Y');
    $fechaFin = date_format($date2,'d-m-Y');
    $horario = date_format($date1,'H:ii'). " - ".date_format($date2,'H:ii');
    $aula = $curso['Aula'];



  /* $sql  = "SELECT DISTINCT (`ID_USUARIO`), `DNI`, `Nombre`, `Accion`, `Grupo`,  `localizador`, `Titulo_curso`,`Proveedor`, `Aula`FROM `sesion` WHERE `localizador` = '$conv'";
    $resultado_sel = $con->query($sql)
    or die ("Error en la consulta");
    $curso = $resultado_sel->fetch_assoc();*/

if ($listados == "Listados"){

    /*$sql  = "SELECT DISTINCT (`ID_USUARIO`), `DNI`, `Nombre`, `Accion`, `Grupo`,  `localizador`, `Titulo_curso`,`Proveedor`, `Aula`FROM `sesion` WHERE `localizador` = '$conv'";
    $resultado_sel = $con->query($sql)
    or die ("Error en la consulta");
    $curso = $resultado_sel->fetch_assoc();*/

    if($numPrat['numPart'] <= 25){

    $plantilla = "lista.xlsx";

        
    } else if ($numPrat['numPart'] >25 && $numPrat['numPart'] <=50){

        $plantilla = "lista2.xlsx"; 
       

    }else if ($numPrat['numPart'] >50 && $numPrat['numPart'] <=75){

        $plantilla = "lista3.xlsx"; 
    }else{

        $plantilla = "lista4.xlsx";

    }
    //Creo un objeto Excel 2007 CON LA PLANTILLA
    $objPHPExcel = PHPExcel_IOFactory::load("plantillas/".$plantilla);

    // formateo las fechas

     /* $fecha1= $convocatoria['Fecha de inicio'];;
      $date1  = date_create($fecha1);
      $fecha2= $convocatoria['Fecha fin'];
      $date2  = date_create($fecha2);*/


    //Indicamos que se pare en la hoja uno del libro
    $objPHPExcel->setActiveSheetIndex(0);

    // escribimos la cabecera:

    $objPHPExcel->getActiveSheet()->SetCellValue('B13', "DENOMINACIÓN DE LA ACCIÓN FORMATIVA: ". $convocatoria['Titulo del curso']." Nº CONVOCATORIA: ".$curso['localizador']);
    $objPHPExcel->getActiveSheet()->SetCellValue('B15', "Nº: ".$curso['Accion']  ." GRUPO: ".$curso['Grupo']   ." FECHA DE INICIO: ".date_format($date1,'d-m-Y') ." FECHA FIN: ".date_format($date2,'d-m-Y'));
    $objPHPExcel->getActiveSheet()->SetCellValue('B19', "SESIÓN Nº: ___ de ".$dias." FECHA: ".date_format($date1,'d-m-Y')." HORARIO: ". date_format($date1,'H:i'). " - ".date_format($date2,'H:i'));

    /**
     * escribimos las partes de sesión
     */

     $sql1  = "SELECT  DISTINCT `Fecha_inicio`,`Fecha_fin`FROM `sesion` WHERE `localizador` ='$conv' ORDER BY `Fecha_inicio` ASC";
     $resultado_selfechas = $con->query($sql1)
     or die ("Error en la consulta");
   
     $n = 27;
     $i = 1;
     while ($row1 = $resultado_selfechas->fetch_array()){

           
                if ($i == 1){
                    $celda ='E27';
                  
                }else if($i == 2){
                    $celda ='F27';
                   
                }else if($i == 3){
                    $celda ='G27';
                    
                }else if($i == 4){
                    $celda ='H27';
                    
                }else{
                    
                    $celda ='M'.$n;
                    $n++;
                    
                  }
                
            $fecha3= $row1['Fecha_inicio'];;
            $date3  = date_create($fecha3);
            $fecha4= $row1['Fecha_fin'];
            $date4  = date_create($fecha4);
            $objPHPExcel->getActiveSheet()->SetCellValue($celda, date_format($date3,'d-m-Y'). " ".date_format($date3,'H:i'). " - ".date_format($date4,'H:i') );

               $i++;
       
     }


    $linea= 28;
    $linea1= 28;
    $linea2= 28;
    $linea3= 28;

    //Escribimos los articipantes
    
    while ($row = $resultado_sel->fetch_array()){
        if ($linea<=52){
            //Escribo
            $objPHPExcel->getActiveSheet()->SetCellValue('B'.$linea, $row['ID_USUARIO']);
            $objPHPExcel->getActiveSheet()->SetCellValue('C'.$linea, $row['Nombre']);
            $objPHPExcel->getActiveSheet()->SetCellValue('D'.$linea, $row['DNI']);
          
        }else if($linea>=53 && $linea<=78 ){
         
            $objPHPExcel->setActiveSheetIndex(1);
            $objPHPExcel->getActiveSheet()->SetCellValue('B'.$linea1, $row['ID_USUARIO']);
            $objPHPExcel->getActiveSheet()->SetCellValue('C'.$linea1, $row['Nombre']);
            $objPHPExcel->getActiveSheet()->SetCellValue('D'.$linea1, $row['DNI']);
            $linea1 = $linea1+1 ;

        }else if($linea>78 && $linea<=103){

            $objPHPExcel->setActiveSheetIndex(2);
            $objPHPExcel->getActiveSheet()->SetCellValue('B'.$linea2, $row['ID_USUARIO']);
            $objPHPExcel->getActiveSheet()->SetCellValue('C'.$linea2, $row['Nombre']);
            $objPHPExcel->getActiveSheet()->SetCellValue('D'.$linea2, $row['DNI']);
            $linea2 = $linea2+1 ;

        }else{
            
            $objPHPExcel->setActiveSheetIndex(3);
            $objPHPExcel->getActiveSheet()->SetCellValue('B'.$linea3, $row['ID_USUARIO']);
            $objPHPExcel->getActiveSheet()->SetCellValue('C'.$linea3, $row['Nombre']);
            $objPHPExcel->getActiveSheet()->SetCellValue('D'.$linea3, $row['DNI']);
            $linea3 = $linea3+1 ;

        }

        $linea= $linea+1;
    }

    $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
    $objWriter->save("Listado_de_asistencia.xlsx");

}

/**
 * Generamos el cartel del curso
 */
if($cartel == "cartel"){

    
    $templateProcessor = new TemplateProcessor("plantillas/CartelAula.docx");


    $TituloDelCurso = $titulo;
    $Accion = $AF;
    $grupo = $G;

    $templateProcessor->setValue('TituloDelCurso',$TituloDelCurso);
    $templateProcessor->setValue('AF',$Accion);
    $templateProcessor->setValue('G',$grupo);
    

   $templateProcessor->saveAs('cartel.docx');
}

if($correo != ""){

    if($correo == "CorreoBonificadoExterno"){

        $plantillaCorreo = "CorreoBonificadoExterno.docx";

    }else if($correo == "CorreoBonificadoInterno"){

              $plantillaCorreo = "CorreoBonificadoInterno.docx";

    }else if($correo == "CorreoExterno"){

              $plantillaCorreo = "CorreoExterno.docx";

    }else if($correo == "CorreoInterno"){

              $plantillaCorreo = "CorreoInterno.docx";
    }
    
    $templateProcessor = new TemplateProcessor("plantillas/".$plantillaCorreo);


    $TituloDelCurso = $titulo;
  

    $templateProcessor->setValue('titulo',$TituloDelCurso);
    $templateProcessor->setValue('fechasInicio',$fechaInicio);
    $templateProcessor->setValue('fechasFin',$fechaFin);
    $templateProcessor->setValue('horario',$horario);
    $templateProcessor->setValue('aula',$aula);

     $templateProcessor->saveAs('correo.docx');
     
    
}

?>