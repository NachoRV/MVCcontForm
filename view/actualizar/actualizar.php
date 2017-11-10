<?php
include 'view/overall/header.php';
include 'view/overall/nav.php';

    ?>
    <form class="form" method="POST" onsubmit="return validacion()" action="core/bin/insdatos.php">
      <div class="form-group">
        <input type="hidden" class="form-control" name="accion" readonly="readonly" value="UP">
      </div>
         <div class="form-group">
           <label for="loc">localizador:</label>
           <input type="number" class="form-control" name="localizador" readonly="readonly" value="<?= $conv?>" placeholder="<?= $conv?>">
        </div>
         <div class="form-group">
           <label for="pwd">Bonificado:</label>
           <select name="bonificado" class="form-control">
             <option value="<?= $datosConvocatoria['Bonficado']?>" style="display: none;"><?= $datosConvocatoria['Bonficado']?></option>
             <option value="No">No</option>
             <option value="Si">Si</option>
         </select>
         </div>
         <div class="form-group">
           <label for="pwd">Pet Montaje:</label>
           <input type="number" class="form-control" id="petMontaje" name="petMontaje" value="<?= $datosConvocatoria['Pet Montaje']?>" placeholder="<?= $datosConvocatoria['Pet Montaje']?>">
           <span id="altpetMontaje"></span>
         </div>
         <div class="form-group">
           <label for="pwd">Acceso:</label>
        <select name="Acceso" class="form-control">
             <option value="<?= $datosConvocatoria['Acceso']?>" style="display: none;"><?= $datosConvocatoria['Acceso']?></option>
             <option value="No">No</option>
             <option value="Si">Si</option>
         </select>
         </div>
         <div class="form-group">
           <label for="pwd">Orange Trainer:</label>
           <select name="Orange_Trainer" class="form-control">
                <option value="<?= $datosConvocatoria['Orange Trainer']?>" style="display: none;"><?= $datosConvocatoria['Orange Trainer']?></option>
                <option value="No">No</option>
                <option value="Si">Si</option>
            </select>
         </div>
         <div class="form-group">
           <label for="pwd">Envio doc:</label>

           <select name="Envio_doc" class="form-control">
                <option value="<?= $datosConvocatoria['Envio doc']?>" style="display: none;"><?= $datosConvocatoria['Envio doc']?></option>
                <option value="No">No</option>
                <option value="Si">Si</option>
            </select>
         </div>
         <div class="form-group">
           <label for="pwd">Recibuda doc:</label>

           <select name="Recibuda_doc" class="form-control">
                <option value="<?= $datosConvocatoria['Recibuda doc']?>" style="display: none;"><?= $datosConvocatoria['Recibuda doc']?></option>
                <option value="No">No</option>
                <option value="Si">Si</option>
            </select>
         </div>
         <button type="submit" class="btn btn-default">Submit</button>
    </form>

<?php include 'view/overall/footer.php'; ?>
