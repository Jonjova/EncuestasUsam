<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container-fluid">

            <button type="button" id="sidebarCollapse" class="btn btn-info">
                <i class="fas fa-align-left"></i>
            </button>

            <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-align-justify"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle " style="margin-left: 95px;" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="https://image.freepik.com/vector-gratis/perfil-avatar-hombre-icono-redondo_24640-14046.jpg" width="40" height="40" class="rounded-circle">
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#"> <?=$this->session->userdata('NOMBRE_USUARIO')?> </a>
                            <a class="dropdown-item" href="#">Editar Perfil</a>
                            <a class="dropdown-item" href="<?php  echo base_url('Accesos/logout')?>"><i class="fas fa-sign-out-alt"></i></a>
                        </div>
                    </li>   
                </ul>
            </div>
        </div>
    </nav>

    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">

            <div class="">
                <!-- <h3>Bootstrap Sidebar</h3> -->
                <img src="<?php echo base_url();?>assets/img/usam.jpg" width="250px" style="margin-top: 18px;"/>
            </div>

            <ul class="list-unstyled components">
                <p>Dummy Heading</p>
                <li class="active">
                    <a href="<?php echo base_url();?>Accesos/home">Inicio</a>
                </li>
                <li>
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">Coordinadores</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="<?php echo base_url();?>Accesos/coordinador">Agregar</a>
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
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false">Docentes</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <?php if($this->session->userdata('ID_TIPO_USUARIO') == 1): ?>
                            <li>
                               <a href="<?php echo base_url();?>Accesos/docente">Agregar</a>
                           </li>
                       <?php endif; ?>
                       <li>
                        <a href="#">Página  2</a>
                    </li>
                    <li>
                        <a href="#">Página  3</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">Portafolio</a>
            </li>
            <li>
                <a href="#">Contacto</a>
            </li>
        </ul>

    </nav>

    <!-- Contenido de la página  -->
    <div id="content">