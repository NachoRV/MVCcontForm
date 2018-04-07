<?php
include 'view/overall/header.php';
include 'view/overall/nav.php';
?>
<div class="margenTop row">
    <div class="col-1"></div>
    <div class="col-5">
        <label>Nombre de Usuario</label>
        <input class="form-control form-control-sm" type="text" id="busqueda" placeholder="Nombre" />
    </div>
     <div class="col-5">
        <form class="form" method="post" action="<?php echo $PHP_SELF; ?>">
            <div class="form-group">
                <label class="">Id:&nbsp;</label>
                <input type="number" class="form-control form-control-sm" name="Id"  placeholder="Id">
            </div>
            <button type="submit" class="btn btn-default" name="enviar">Buscar</button>
     </form>
    </div>
</div>
<div id="resultado">

</div>
<div class="row">
<div class="col-12">
<form class="form-inline margenTop" method="POST" onsubmit="return validacionNivel()" action="core/bin/altaUsiarios.php">   
       <div class="form-group">
           <label class="" for="loc">Nombre:</label>
         <input type="text" class="form-control form-control-sm" name="nombre"  placeholder="Nombre de usuario" re minlength="2" maxlength="30">
        </div>
       <div class="form-group">
           <label class="" for="pwd">Apellidos:</label>
            <input type="text" class="form-control form-control-sm" name="apellidos"  placeholder="Apellidos"  maxlength="40"required>
      </div>
         <div class="form-group">
           <label class="" for="pwd">Email:</label>
           <input type="email" class="form-control form-control-sm" name="email" placeholder="Correo electronico" required>
        </div>
       <div class="form-group">
           <label class="" for="pwd">Nivel:</label>
          <select name="nivel" class="form-control form-control-sm" required>
             <option value="">Selecciona una opcion</option>
             <option value="1">Administrador</option>
             <option value="2">Gestor</option>
             <option value="3">Usuario</option>
         </select>
         <span id="altpetNivel"></span>
         </div>
         <div class="form-group">
           <label class="" for="pwd">Contraseña:</label>
           <input type="password" class="form-control form-control-sm" id="contrasena" name="contrasena" placeholder="Contraseña" minlength="8" maxlength="8" required>  
         </div>   
         <div class="form-group">
            <button type="" class="btn fondonaranja btn-block">Enviar</button>          
        </div>
    </form>
</div>
</div>
<?php include 'view/overall/footer.php'; ?>