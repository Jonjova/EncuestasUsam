<body>
  <nav class="navbar navbar-dark bg-dark navbar-expand-sm ">
              <button type="button" id="sidebarCollapse" class="btn btn-info"><i class="fas fa-align-left"></i></button>
              <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbar-list-4" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbar-list-4">
                <ul class="navbar-nav ">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle " style="margin-left: 95px;" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <img src="https://image.freepik.com/vector-gratis/perfil-avatar-hombre-icono-redondo_24640-14046.jpg" width="40" height="40" class="rounded-circle">
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                          <a class="dropdown-item" href="#">Dashboard</a>
                          <a class="dropdown-item" href="#">Editar Perfil</a>
                          <a class="dropdown-item" href="<?php  echo base_url('Accesos/logout')?>"><i class="fas fa-sign-out-alt"></i></a>
                      </div>
                  </li>   
              </ul>
          </div>
      </nav>
    <div class="wrapper">

        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Bootstrap Sidebar</h3>
            </div>

            <ul class="list-unstyled components">
                <p>Dummy Heading</p>
                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Inicio</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="#">Submenú 1</a>
                        </li>
                        <li>
                            <a href="#">Submenú 2</a>
                        </li>
                        <li>
                            <a href="#">Submenú 3</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">Acerca de nosotros</a>
                </li>
                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Página</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="#">Página 1</a>
                        </li>
                        <li>
                            <a href="#">Página 2</a>
                        </li>
                        <li>
                            <a href="#">Página 3</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">Portafolio</a>
                </li>
                <li>
                    <a href="#">Contactos</a>
                </li>
            </ul>


        </nav>

        <!-- Page Content  -->
        <div id="content">



      <h2>Contenido</h2>
  </div>
</div>
</body>