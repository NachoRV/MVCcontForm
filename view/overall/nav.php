  <body>
    <!-- Navigation -->
  <nav class="navbar navbar-expand-lg nav fixed-top" id="nav-nacho">
        <a class="navbar-brand" href="/MVCcontForm">
          <img src="public/img/logo.jpg" width="150" height="50" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarResponsive">

          <ul class="navbar-nav ml-auto">
            <li class="nav-item ">
              <a class="nav-a" href="/"> Home&nbsp;&nbsp;
                <b class="caret"></b>
              </a>
            </li>
            <li class="nav-item ">
              <a class="nav-a" href="?view=documentacion"> Documentacion&nbsp;&nbsp;
                <b class="caret"></b>
              </a>
            </li>

            <li class="dropdown">
             <a class="dropdown-toggle nav-a" data-toggle="dropdown" href="#">Convocatoria<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <!--<li><a  href="?view=importar">Importar</a></li>-->
              <li><a  href="?view=hoy">Hoy</a></li>
              <li><a  href="?view=tareas">Tareas</a></li>
            </ul>
          </li>
          <li class="dropdown">
             <a class="dropdown-toggle nav-a" data-toggle="dropdown" href="#">&nbsp;Importar<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a class="nav-a" href="?view=importar">Importar Control de formación</a></li>
              <li><a class="nav-a" href="?view=imphoy">Partes de sesion: Hoy</a></li>
            </ul>
          </li>

            <!--<li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>-->
          </ul>
        </div>
      </div>
    </nav>
