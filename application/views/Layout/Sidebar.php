<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container-fluid">

            <button type="button" id="sidebarCollapse" class="btn btn-info">
                <i class="fas fa-align-left"></i>
            </button>

            <button class="btn btn-secondary d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="fas fa-align-justify"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle " href="#" id="navbarDropdownMenuLink" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="https://image.freepik.com/vector-gratis/perfil-avatar-hombre-icono-redondo_24640-14046.jpg"
                                width="40" height="40" class="rounded-circle">
                            <span>&ensp; <?=$this->session->userdata('PERSONA_USUARIO')?> &ensp;&ensp;&ensp;</span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="<?php echo base_url();?>Cuenta/cambiar">
                                <i class="fas fa-key"></i> Cambiar Contrase&ntilde;a
                            </a>
                            <a class="dropdown-item" href="<?php echo base_url();?>Cuenta/persona">
                                <i class="fas fa-user-edit"></i> Editar Perfil
                            </a>
                            <a class="dropdown-item" href="<?php echo base_url()?>Accesos/logout">
                                <i class="fas fa-user-times"></i> Cerrar Sesion
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">

            <div class="image-sidebar">
                <!-- <h3>Bootstrap Sidebar</h3> -->
                <img src="<?php echo base_url();?>assets/img/usam.jpg" width="250px" style="" />
            </div>

            <ul class="list-unstyled components">
                <!-- <p>Dummy Heading</p> -->
                <li class="active">
                    <a href="<?php echo base_url();?>Accesos/home">
                        <i class="fas fa-home"></i> Inicio
                    </a>
                </li>

                <?php if($this->session->userdata('ID_TIPO_USUARIO') == 1): ?>
                <li>
                    <a href="#usersSubmenu" data-toggle="collapse" aria-expanded="false">
                        <i class="fas fa-users"></i> Usuarios
                    </a>
                    <ul class="collapse list-unstyled" id="usersSubmenu">
                        <li>
                            <a href="<?php echo base_url();?>Usuario/usuarios">
                                <i class="fas fa-eye"></i> Ver Usuarios
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fas fa-user-plus"></i> Registrar
                            </a>
                        </li>
                    </ul>
                </li>
                <?php endif; ?>

                <?php if($this->session->userdata('ID_TIPO_USUARIO') == 2): ?>
                <li>
                    <a href="#coordinadorSubmenu" data-toggle="collapse" aria-expanded="false">
                        <i class="fas fa-user-cog"></i> Coordinadores
                    </a>
                    <ul class="collapse list-unstyled" id="coordinadorSubmenu">
                        <li>
                            <a href="<?php echo base_url();?>Coordinador/coordinador">
                                <i class="fas fa-plus-circle"></i> Registrar
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>Coordinador/coordinadores">
                                <i class="fas fa-eye"></i> Ver Registrados
                            </a>
                        </li>
                    </ul>
                </li>
                <?php endif; ?>

                <?php if($this->session->userdata('ID_TIPO_USUARIO') == 3): ?>
                <li>
                    <a href="#DocenteSubmenu" data-toggle="collapse" aria-expanded="false"> 
                        <i class="fas fa-chalkboard-teacher"></i> Docentes
                    </a>
                    <ul class="collapse list-unstyled" id="DocenteSubmenu">
                        <li>
                            <a href="<?php echo base_url();?>Docente/docente">
                                <i class="fas fa-plus-circle"></i> Registrar
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>Docente/docentes">
                                <i class="fas fa-eye"></i> Ver Registrados
                            </a>
                        </li>
                    </ul>
                </li>
                <?php endif; ?>

                <?php if($this->session->userdata('ID_TIPO_USUARIO') == 3): ?>
                <li>
                    <a href="#AsignaturasSubmenu" data-toggle="collapse" aria-expanded="false">
                        <i class="fas fa-book-open"></i> Asignaturas
                    </a>
                    <ul class="collapse list-unstyled" id="AsignaturasSubmenu">
                        <li>
                            <a href="<?php echo base_url();?>Asignatura/asignatura">
                                <i class="fas fa-plus-circle"></i> Registrar
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>Asignatura/asignaturas">
                                <i class="fas fa-eye"></i> Ver Registradas
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>Asignatura/asignar">
                                <i class="fas fa-user-plus"></i> Asignar
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>Asignatura/asignadas">
                                <i class="fas fa-eye"></i> Ver Asignadas
                            </a>
                        </li>
                    </ul>
                </li>
                <?php endif; ?>

                <?php if($this->session->userdata('ID_TIPO_USUARIO') == 1 || $this->session->userdata('ID_TIPO_USUARIO') == 4): ?>

                    <li>
                        <a href="#proyectSubmenu" data-toggle="collapse" aria-expanded="false">Proyectos</a>
                        <ul class="collapse list-unstyled" id="proyectSubmenu">
                        <?php if(!isset($permisos->LEER) == 1): ?>
                            <li>
                                <a href="<?php echo base_url();?>Proyectos/index">Mostrar</a>
                            </li>
                        <?php endif; ?>
                        <li>
                            <a href="<?php echo base_url();?>Proyectos/proyecto">Agregar</a>
                        </li>
                    </ul>
                </li>
            <?php endif; ?>
            <?php if($this->session->userdata('ID_TIPO_USUARIO') == 1 || $this->session->userdata('ID_TIPO_USUARIO') == 2): ?>
                <li>
                    <a href="#permisosSubmenu" data-toggle="collapse" aria-expanded="false">Permisos</a>
                    <ul class="collapse list-unstyled" id="permisosSubmenu">
                       <li>
                           <a href="<?php echo base_url();?>Permisos/index">Mostrar</a>
                       </li>
                       <li>
                        <a href="<?php echo base_url();?>Permisos/permisos">Agregar</a>
                    </li>
                </ul>
            </li>
        <?php endif; ?>

                <!-- <li>
                    <a href="#">Portafolio</a>
                </li>
                <li>
                    <a href="#">Contacto</a>
                </li> -->
            </ul>

        </nav>

        <!-- Contenido de la página  -->
        <div id="content">