<?php
  
      $b = $_POST['b'];
        
      if(!empty($b)) {
            buscar($b);
      }
        
      function buscar($b) {
            
            require('../../core/models/class.conexion.php');
            define('DB_HOST','localhost');
            define('DB_USER','root');
            define('DB_PASS','root');
            define('DB_NAME','formacion');

            $con = new Conexion();

            $sql  = 'SELECT * FROM `usuario` WHERE `nombre` LIKE \'%'.$b.'%\'';

            $resultado_selec = $con->query($sql);
        
            //$sql = mysql_query("SELECT * FROM usuario WHERE nombre LIKE '%".$b."%' LIMIT 10", $con);
              
            $contar =  $resultado_selec->num_rows;
          
            /*
            if($contar == 0){
                  echo "No se han encontrado resultados para '<b>".$b."</b>'.";
            }else{

                  echo '     <div class="table-responsive">
                              <table class="table">
                              <thead>
                                    <tr>
                                    <th>Nombre</th>
                                    <th>Apellidos</th>
                                    <th>correo</th>
                                    <th>Editar</th>
                                    </tr>
                              </thead>
                              <tbody>';
                              
              while ($row = $resultado_selec->fetch_array()){
           
                $nombre = $row['nombre'];
                $correo = $row['correo'];     
                $apellidos = $row['apellidos'];
                $id = $row['Id_Usuario'];
                
                echo " <tr>
                <td>". $nombre ."</td>
                <td>". $apellidos."</td>
                <td>". $correo."</td>
                <td><a href='?view=documentacion&idus='".$id."/>Editar</td>
            </tr>";
              }
       echo " </tbody>
        </table>
    </div>";
              
        }
      }*/
      $out="{";  
       while ($row = $resultado_selec->fetch_array()){ 
                $nombre = $row['nombre'];
                $correo = $row['correo'];     
                $apellidos = $row['apellidos'];
                $id = $row['Id_Usuario'];
            $out = $out.' "users"   : [{
            "ID"      : "'.$id.'",
            "username" : "'.$nombre.'",
            "apellidos"    : "'.$apellidos.'",
            "correo"      : "'.$correo.'",
            
        },';
      }
      $j= json_decode($out);
        echo $j;
       
      }
?>