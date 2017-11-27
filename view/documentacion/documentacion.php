<?php
include 'view/overall/header.php';
include 'view/overall/nav.php';
?>

 <div class="container">

 
    <h1> Selecciona la documentacion a imprimir </h1>

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
        <button name='generar' type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<?php 

    if(isset ($_POST['listado'])){

        echo "<a href= 'Listado_de_asistencia.xlsx'/>Pulsa para descargar el listado<a></br>";
    }


?>
<?php include 'view/overall/footer.php'; ?>
