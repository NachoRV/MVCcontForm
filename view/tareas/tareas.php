<?php
include 'view/overall/header.php';
include 'view/overall/nav.php';?>

<div class ="row filtros">
  <div class="col-xs-1 col-md-1"></div>
  <div class="col-xs-10 col-md-10">
    <form class="form-inline" method="post" action="<?php echo $PHP_SELF; ?>">
       <div class="form-group">
         <label class="" form="loc">Gestor:</label>
            <select name="gestor">
                <option value="">Selecciona un gestor </option>
                <option value="Ana Angela Lastra Aras">Ana Angela Lastra Aras</option>
                <option value="Ana Martinez Ruiz">Ana Martinez Ruiz</option>
                <option value="Ana Rodriguez Sigueros">Ana Rodriguez Sigueros</option>
                <option value="Ana Rus Brox Alarcón">Ana Rus Brox Alarcón</option>
                <option value="Cristina Quiñoa Canovas">Cristina Quiñoa Canovas</option>
                <option value="David Losada Juan">David Losada Juan</option>
                <option value="Jesús Vazquez Sauce">Jesús Vazquez Sauce</option>
                <option value="Joaquín Esteban Diaz del Rosal">Joaquín Esteban Diaz del Rosal</option>
                <option value="Maria Teresa Martin Gomez">Maria Teresa Martin Gomez</option>
                <option value="Marta Alonso Rodriguez">Marta Alonso Rodriguez</option>
              </select>
       </div>
       <div class="form-group">
         <label class=""for="fecha1">Fecha inicio:</label>
         <input type="date" class="form-control" name="fechainicio"  placeholder="dd-mm-AAAA">
       </div>
       <div class="form-group">
         <label for="fecha2">Fecha Fin:</label>
         <input type="date" class="form-control" name="fechafin" placeholder="dd-mm-AAAA">
       </div>
       <button type="submit" class="btn btn-default" name="enviar">Submit</button>
     </form>
 </div>
 <div class="col-xs-1 col-md-1"></div>
</div>

 <table class="table table-striped">
  <thead>
    <tr>
      <th>Localizador</th>
      <th>Título</th>
      <th>Fecha Inicio</th>
      <th>Fecha Fin</th>
      <th>Gestor de Formación</th>
      <th>lugar</th>
      <th>Proveedor</th>

      <th>Bonificado</th>
      <th>Pet. Monta</th>
      <th>Acceso</th>
      <th>Orange Trainer</th>
      <th>Envio Documentación</th>
      <th>Recibida Documentación</th>
    </tr>
  </thead>
  <tbody>

    <?php
    while ($row = $resultado_sel->fetch_array()){

      $fecha1=  $row['Fecha de inicio'];
      $date1  = date_create($fecha1);
      $fecha2=  $row['Fecha fin'];
      $date2  = date_create($fecha2);
 ?>

 <tr>
   <td><a href="?view=actualizar&conv=<?= $row['localizador']?>"/><?= $row['localizador']?></td>
   <td><?= $row['Titulo del curso']?></td>
   <td><?= date_format($date1,'d-m-Y')?></td>
   <td><?= date_format($date2,'d-m-Y')?></td>
   <td><?= $row['Gestor_de_formacion']?></td>
   <td><?= $row['Lugar de la formacion']?></td>
   <td><?= $row['Proveedor']?></td>

   <td><?= $row['Bonficado']?></td>
   <td><?= $row['Pet Montaje']?></td>
   <td><?= $row['Acceso']?></td>
   <td><?= $row['Orange Trainer']?></td>
   <td><?= $row['Envio doc']?></td>
   <td><?= $row['Recibuda doc']?></td>
 </tr>
 <?php
 }
  ?>
 </tbody>
 </table>

<?php include 'view/overall/footer.php'; ?>
