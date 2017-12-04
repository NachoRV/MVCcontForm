<body>
    <!-- Navigation -->
  <nav class="navbar navbar-expand-md  navbar-dark fixed-top" id="nav-nacho">
  <!-- Brand -->
        <a class="navbar-brand" href="/">
          <img src="public/img/logo.jpg" width="150" height="50" alt="">
        </a>

  <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
    </button>

  <!-- Navbar links -->
<div class="collapse navbar-collapse" id="collapsibleNavbar">
    

          <ul class="nav navbar-nav ml-auto">
            <li class="nav-item ">
              <a class="nav-a text-uppercase text-expanded" href="/"> Home&nbsp;&nbsp;
                <b class="caret"></b>
              </a>
            </li>
           <!-- <li class="nav-item ">
              <a class="nav-a" href="?view=documentacion"> Documentacion&nbsp;&nbsp;
                <b class="caret"></b>
              </a>
            </li>-->

            <li class="dropdown">
             <a class="dropdown-toggle nav-a text-uppercase text-expanded" data-toggle="dropdown" href="#">Convocatoria<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <!--<li><a  href="?view=importar">Importar</a></li>-->
              <li><a class="nav-a text-uppercase text-expanded" href="?view=hoy">Hoy</a></li>
              <li><a class="nav-a text-uppercase text-expanded" href="?view=tareas">Tareas</a></li>
            </ul>
          </li>
          <li class="dropdown">
             <a class="dropdown-toggle nav-a text-uppercase text-expanded" data-toggle="dropdown" href="#">&nbsp;Importar<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a class="nav-a text-uppercase text-expanded" href="?view=importar">Importar Control de formación</a></li>
              <li><a class="nav-a text-uppercase text-expanded" href="?view=imphoy">Partes de sesion: Hoy</a></li>
            </ul>
          </li>
            <li>
              <a class="nav-a text-uppercase text-expanded" data-toggle="modal" data-target="#myModal" href="#">Login</a>
            </li>
        </ul>     
  </div>         
</nav> 

  <!-- Modal -->
      <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Acceso</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              
            </div>
            <div class="modal-body">
              <form class="form" method="POST" action="core/bin/login.php">
                <div class="row">
                    <div class="form-group col-lg-12">
                    <label class="text-heading">Email Address</label>
                    <input type="email" class="form-control" name="email">
                  </div>
                  <div class="form-group col-lg-12">
                    <label class="text-heading">Password </label>
                    <input type="Password" class="form-control" name="contrasena">
                  </div>
                  
                  <div class="form-group col-lg-12">
                    <button type="submit" class="btn btn-secondary btenvio">Submit</button>
                  </div>
                </div>
              </form>
            </div>
           </div>
         </div>
      </div>
    

          


