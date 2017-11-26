<?php
include 'view/overall/header.php';
include 'view/overall/nav.php'; ?>

<div class="container">
  <div class="row">
  <div class= "col-xs-1 col-md-4"></div>
    <div class="col-xs-10 col-md-5">
    <h2> Fichero control de formación </h2></div>
    <div class= "col-xs-1 col-md-3"></div>
  </div>
  <div class="row importar">
    <div class= "col-xs-1 col-md-3"></div>
    <div class= "col-xs-10 col-md-6 divimportar">
      <p><strong>Seleciona el fichero a importar</strong></p>
     <form name="importa" method="post" action="<?php echo $PHP_SELF; ?>" enctype="multipart/form-data" >

     <input type="file" name="excel" />

     <input type='submit' name='enviar'  value='Importar'/>

     <input type='hidden' value='upload' name='action'/>

     </form>
   </div>
   <div class= "col-xs-1 col-md-3"></div>
</div>
</div>
<?php include 'view/overall/footer.php'; ?>
