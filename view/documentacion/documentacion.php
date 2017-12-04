<?php
include 'view/overall/header.php';
include 'view/overall/nav.php';
?>

 <div class="container">
        <h1 class = "center margen"> Selecciona la documentacion a imprimir</h1>
        <div class = "row  margen">
            <div class = "col-xs-1 col-md-3"></div>
            <div class = "col-xs-1 col-md-6">
                <div>
                    <span ><?echo "<strong>Convocatoria:</strong> ". $conv. "</br>";?> </span>
                    <span><?echo "<strong>Título de la formación: </strong>". $titulo. "</br>";?> </span>
                <div >
            </div>
            <div class = "col-xs-1 col-md-3"></div>
        </div>
        <div class = "row margen">
            <div class = "col-xs-1 col-md-3"></div>
                <div class = "col-xs-1 col-md-6">
                    <form name="doc" method="post" action="<?php echo $PHP_SELF; ?>" enctype="multipart/form-data" >     
                        <div class="form-check">
                            <label class="form-check-label">
                            <input name='listado' type="checkbox" class="form-check-input" value="Listados">
                            Listados
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                            <input name='cartel' type="checkbox" class="form-check-input" value="cartel">
                            Cartel
                            </label>
                        </div> 
                        <div class="form-group">
                        <label class="" form="loc">Correo: &nbsp;</label>
                            <select name="Correo">
                                <option value="">Selecciona un tipo de correo</option>
                                <option value="CorreoBonificadoExterno">Correo Externo Bonificado</option>
                                <option value="CorreoBonificadoInterno">Correo Interno Bonificado</option>
                                <option value="CorreoExterno">Correo Externo NO Bonificado</option>
                                <option value="CorreoInterno">Correo Interno NO Bonificado</option>
                            </select>
                        </div>
                       
                        <button name='generar' type="submit" class="btn btn-primary ">Submit</button>
                       
                    </form>
                </div>
            <div class = "col-xs-1 col-md-3"></div>
        </div>

    <div class = "row">
        <div class = "col-xs-1 col-md-3"></div>
            <div class = "col-xs-1 col-md-6">
                <?php 
                    if(isset ($_POST['listado'])){

                        echo "<a href= 'Listado_de_asistencia.xlsx'/>Pulsa para descargar el listado<a></br>";
                  
                    }
                    if(isset ($_POST['cartel'])){

                       echo "<a href= 'cartel.docx'/>Pulsa para descargar el cartel del aula<a></br>";
                        
                    }
                      if(isset ($_POST['Correo'])){

                        echo "<a href= 'correo.docx'/>Pulsa para descargar el correo</br>";
                    }
                ?>
            </div>
        <div class = "col-xs-1 col-md-3"></div>
    </div>
</div>
</div>
</div>

<?php include 'view/overall/footer.php'; ?>
