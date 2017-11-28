<?php

include 'view/overall/header.php';
include 'view/overall/nav.php';

?>
<div class ="row filtros">
  <div class="col-xs-1 col-md-2"></div>
  <div class="col-xs-10 col-md-8">
    <form class="form-inline" method="post" action="<?php echo $PHP_SELF; ?>">
       <div class="form-group">
         <label class="" for="fecha">Fecha:&nbsp;</label>
         <input type="date" class="form-control" name="fecha"  placeholder="dd-mm-AAAA">
       </div>
       <button type="submit" class="btn btn-default" name="enviar">Submit</button>
     </form>
 </div>
 <div class="col-xs-1 col-md-2"></div>
</div>
<div class="row">
<<div class="col-xs-12 col-md-12">
 <table class="table table-striped">
  <thead>
    <tr>
      <th>Sesión</th>
      <th>Título</th>
      <th>Fch. Inicio</th>
      <th>Horario</th>
      <th>Gestor</th>
      <th>lugar</th>
      <th>Proveedor</th>
      <th>Gestor FS</th>
    </tr>
  </thead>
  <tbody>

    <?php
    while ($row = $resultado_sel->fetch_array()){

      $fecha1=  $row['Fecha_inicio'];
      $date1  = date_create($fecha1);
      $fecha2=  $row['Fecha_fin'];
      $date2  = date_create($fecha2);
 ?>

 <tr>
   <td><a href="?view=documentacion&conv=<?= $row['localizador']?>"/><?= $row['localizador']?></td>
   <td><?= $row['Titulo_curso']?></td>
   <td><?= date_format($date1,'d-m-Y')?></td>
   <td><?= date_format($date1,'h:i')?> -    <?= date_format($date2,'h:i')?></td>
   <td><?= $row['Gestor']?></td>
   <td><?= $row['Aula']?></td> 
   <td><?= $row['Proveedor']?></td>
   <td><?= $row['Creado']?></td>
 </tr>
 <?php
 }
  ?>
 </tbody>
 </table>
 </div>
 </div>

<?php include 'view/overall/footer.php'; ?>
