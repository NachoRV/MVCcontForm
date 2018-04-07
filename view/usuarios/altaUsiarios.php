<?php
include 'view/overall/header.php';
include 'view/overall/nav.php';
?>
<div class="row">
 <div class = "col-3"></div>
   <div class = "col-6">
    <form class="margenTop" method="POST" onsubmit="return validacionNivel()" action="core/bin/altaUsiarios.php">   
      <div class="form-group">
        <input type="hidden" class="" name="accion" readonly="readonly" value="UP">
      </div>
         <div class="form-group">
           <label class="" for="loc">Nombre:</label>
           <div class="">
           <input type="text" class="form-control form-control-sm" name="nombre"  placeholder="Nombre de usuario" re minlength="2" maxlength="30"
        </div>
         <div class="form-group">
           <label class="" for="pwd">Apellidos:</label>
           <div class="">
            <input type="text" class="form-control form-control-sm" name="apellidos"  placeholder="Apellidos"  maxlength="40"required>
        </div>
         </div>
         <div class="form-group">
           <label class="" for="pwd">Email:</label>
           <div class="">
           <input type="email" class="form-control form-control-sm" name="email" placeholder="Correo electronico" required>
           </div>
         </div>
         <div class="">
           <label class="" for="pwd">Nivel:</label>
           <div class="">
          <select name="nivel" class="form-control form-control-sm" required>
             <option value="">Selecciona una opcion</option>
             <option value="1">Administrador</option>
             <option value="2">Gestor</option>
             <option value="3">Usuario</option>
         </select>
         <span id="altpetNivel"></span>
         </div>
         </div>
          <div class="">
           <label class="" for="pwd">Contraseña:</label>
        <div class="">
           <input type="password" class="form-control form-control-sm" id="contrasena" name="contrasena" placeholder="Contraseña" minlength="8" maxlength="8" required><br>
           <input type="password" class="form-control form-control-sm" id="contrasena1" name="contrasena1" placeholder="Confirma la contraseña"  minlength="8" maxlength="8" required><br>
         </div>     
         </div>  
         <div class="">
         <button type="" class="btn fondonaranja btn-block">Enviar</button>
         </div>
        </div>
    </form>
    </div>
  <div class = "col-3"></div>
</div>
<?php include 'view/overall/footer.php'; ?>