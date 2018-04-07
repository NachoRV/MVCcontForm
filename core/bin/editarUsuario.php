<?php 

if(isset($_POST['Id'])){

$con = new Conexion();
$Id = $_POST['Id'];

$sql  = "SELECT * FROM `usuario` WHERE `Id_Usuario` = '$Id'";

$resultado_selc = $con->query($sql)
or die ("Error en la consulta");
    $row = $resultado_selc->fetch_assoc();
    $nombre = $row['nombre'];
    $correo = $row['correo'];    
    $apellidos = $row['apellidos'];
    $id = $row['Id_Usuario'];
    echo $nombre. $nombre;
    
    $con->close();

}

?>
<div class="row">
<div class="col-12">
<form class="form-inline margenTop" method="POST" onsubmit="return validacionNivel()" action="core/bin/actUsuario.php">   
       <div class="form-group">
           <label class="" for="loc">Nombre:</label>
         <input type="text" class="form-control form-control-sm" name="nombre"  placeholder="<?= $row['nombre']?>" required value="<?= $row['nombre']?>" minlength="2" maxlength="30">
        </div>
       <div class="form-group">
           <label class="" for="pwd">Apellidos:</label>
            <input type="text" class="form-control form-control-sm" name="apellidos"  placeholder="<?= $row['apellidos']?>" value="<?= $row['apellidos']?>"  maxlength="40"required>
      </div>
         <div class="form-group">
           <label class="" for="pwd">Email:</label>
           <input type="email" class="form-control form-control-sm" name="email" placeholder="<?= $row['correo']?>" value="<?= $row['correo']?>" required>
        </div>
       <div class="form-group">
           <label class="" for="pwd">Nivel:</label>
          <select name="nivel" class="form-control form-control-sm" required>
             <option value="<?= $row['nivel']?>"><?= $row['nivel']?></option>
             <option value="1">Administrador</option>
             <option value="2">Gestor</option>
             <option value="3">Usuario</option>
         </select>
         <span id="altpetNivel"></span>
         </div>
         <div class="form-group">
           <label class="" for="pwd">Contraseña:</label>
           <input type="password" class="form-control form-control-sm" id="contrasena" name="contrasena" placeholder="<?= $row['contaseña']?>" value="<?= $row['contaseña']?>" minlength="8" maxlength="8" required>  
         </div>   
         <div class="form-group">
            <button type="" class="btn fondonaranja btn-block">Enviar</button>          
        </div>
    </form>
</div>
</div>