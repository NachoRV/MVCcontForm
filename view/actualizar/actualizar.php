<?php
include 'view/overall/header.php';
include 'view/overall/nav.php';

    ?>
<div class="row">
   <div class = "col-xs-1 col-md-3"></div> 
   <div class = "col-xs-10 col-md-6">
    <form class="form-horizontal margenTop" method="POST" onsubmit="return validacion()" action="core/bin/insdatos.php">
      <div class="form-group">
        <input type="hidden" class="form-control" name="accion" readonly="readonly" value="UP">
      </div>
         <div class="form-group">
           <label class="control-label col-sm-4" for="loc">localizador:</label>
           <input type="text" class="form-control" name="localizador" readonly="readonly" value="<?= $conv?>" placeholder="<?= $conv?>">
        </div>
         <div class="form-group">
           <label class="control-label col-sm-4" for="pwd">Bonificado:</label>
           <select name="bonificado" class="form-control">
             <option value="<?= $datosConvocatoria['Bonficado']?>" style="display: none;"><?= $datosConvocatoria['Bonficado']?></option>
             <option value="No">No</option>
             <option value="Si">Si</option>
         </select>
         </div>
         <div class="form-group">
           <label class="control-label col-sm-4" for="pwd">Pet Montaje:</label>
           <input type="number" class="form-control" id="petMontaje" name="petMontaje" min="0" max="9999999" value="<?= $datosConvocatoria['Pet Montaje']?>" placeholder="<?= $datosConvocatoria['Pet Montaje']?>">
           <span id="altpetMontaje"></span>
         </div>
         <div class="form-group">
           <label class="control-label col-sm-4" for="pwd">Acceso:</label>
          <select name="Acceso" class="form-control">
             <option value="<?= $datosConvocatoria['Acceso']?>" style="display: none;"><?= $datosConvocatoria['Acceso']?></option>
             <option value="No">#N/A</option>
             <option value="No">No</option>
             <option value="Si">Si</option>
         </select>
         </div>
         <div class="form-group">
           <label class="control-label col-sm-4" for="pwd">Orange Trainer:</label>
           <input type="text" class="form-control" name="Orange_Trainer" maxlength="6" value="<?= $datosConvocatoria['Orange Trainer']?>" placeholder="<?= $datosConvocatoria['Orange Trainer']?>">
         </div>
         <div class="form-group">
           <label class="control-label col-sm-4" for="pwd">Envio doc:</label>

           <select name="Envio_doc" class="form-control">
                <option value="<?= $datosConvocatoria['Envio doc']?>" style="display: none;"><?= $datosConvocatoria['Envio doc']?></option>
                <option value="No">#N/A</option>
                <option value="No">No</option>
                <option value="Si">Si</option>
            </select>
         </div>
         <div class="form-group">
           <label  class="control-label col-sm-4" for="pwd">Recibida doc:</label>

           <select name="Recibuda_doc" class="form-control">
                <option value="<?= $datosConvocatoria['Recibuda doc']?>" style="display: none;"><?= $datosConvocatoria['Recibuda doc']?></option>
                <option value="No">#N/A</option>
                <option value="No">No</option>
                <option value="Si">Si</option>
            </select>
         </div>
         <div class="form-group center">
         
         <button type="submit" class="btn fondonaranja btn-block">Enviar</button>
        </div>
    </form>
    </div>
  <div class = "col-xs-1 col-md-3"></div>
</div>
<?php include 'view/overall/footer.php'; ?>
