<?php
include 'view/overall/header.php';
include 'view/overall/nav.php';
?>
<div class="margenTop row">
    <div class="col-1"></div>
    <div class="col-5">
    <form class="form-inline" method="post" action="">
        <label>Nombre de Usuario &nbsp;</label>
        <input class="form-control form-control-sm" type="text" id="busqueda" placeholder="Nombre" />
    </form>    
    </div>
     <div class="col-5">
        <form class="form-inline" method="post" action=""core/bin/actUsiarios.php"">
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

<?php include 'view/overall/footer.php'; ?>