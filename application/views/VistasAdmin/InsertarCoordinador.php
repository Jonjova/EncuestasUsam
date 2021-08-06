            <!--Contenido de desarrollo-->
            <div class="container" id="container">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2" id="col-wizard">

                        <!--      Wizard container        -->
                        <div class="wizard-container">

                            <div class="card wizard-card" data-color="blue" id="wizardProfile">
                                <form id="CreateCoordinador" class="needs-validation">

                                    <div class="wizard-header">
                                        <h3>
                                            <b>CREAR</b> NUEVO PERFIL COORDINADOR<br>
                                            <small>Ingrese la informaci&oacute;n que se solicita del coordinador.</small>
                                        </h3>
                                    </div>

                                    <div class="wizard-navigation">
                                        <ul>
                                            <li><a href="#datosPersonales" data-toggle="tab">Personal</a></li>
                                            <li><a href="#contacto" data-toggle="tab">Contacto</a></li>
                                            <li><a href="#direccion" data-toggle="tab">Residencia</a></li>
                                            <li><a href="#laboral" data-toggle="tab">Laboral</a></li>
                                        </ul>
                                    </div>

                                    <!-- DATOS WIZARD -->
                                    <div class="tab-content" id="tab-content">

                                        <!-- DATOS PERSONALES -->
                                        <div class="tab-pane" id="datosPersonales">
                                            <div class="row" style="display: block;">
                                                <h4 class="info-text"> Datos Personales (Informaci&oacute;n básica)</h4>
                                                <div class="col-sm-4 col-sm-offset-1" id="logo_USAM">
                                                    <div class="picture-container">
                                                        <img src="<?php echo base_url();?>assets/img/logo_USAM.png" class="picture-src" id="wizardPicturePreview" title="" />
                                                    </div>
                                                </div>

                                                <br>

                                                <div class="col-sm-6" id="col_persona">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Primer Nombre</label>
                                                            <input name="PRIMER_NOMBRE_PERSONA" id="PRIMER_NOMBRE_PERSONA" type="text" class="form-control" placeholder="1er Nombre" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Primer Apellido</label>
                                                            <input name="PRIMER_APELLIDO_PERSONA" id="PRIMER_APELLIDO_PERSONA" type="text" class="form-control" placeholder="1er Apellido" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Segundo Nombre</label>
                                                            <input name="SEGUNDO_NOMBRE_PERSONA" id="SEGUNDO_NOMBRE_PERSONA" type="text" class="form-control" placeholder="2do Nombre" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Segundo Apellido</label>
                                                            <input name="SEGUNDO_APELLIDO_PERSONA" id="SEGUNDO_APELLIDO_PERSONA" type="text" class="form-control" placeholder="2do Apellido" required>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-10 col-sm-offset-1">
                                                    <div class="col-sm-10">
                                                        <div class="form-group">
                                                            <label>Sexo</label>
                                                            <select name="SEXO" id="SEXO" class="custom-select" style="font-size: 1rem;" required>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>N&uacute;mero de DUI</label>
                                                            <input name="DUI" id="DUI" type="text" class="form-control" placeholder="00000000-0" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>N&uacute;mero de NIT</label>
                                                            <input name="NIT" id="NIT" type="text" class="form-control" placeholder="0000-000000-000-0" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- DATOS DE CONTACTO -->
                                        <div class="tab-pane" id="contacto">

                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <h4 class="info-text"> Informaci&oacute;n de Contacto </h4>
                                                </div>

                                                <br>
                                                <br>
                                                <br>
                                                <br>

                                                <div class="col-sm-7 col-sm-offset-1">
                                                    <div class="form-group">
                                                        <div class="form-group">
                                                            <label>Correo Personal</label>
                                                            <input name="CORREO_PERSONAL" id="CORREO_PERSONAL" type="email" class="form-control" placeholder="personal@mail.com">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-5 col-sm-offset-1">
                                                    <div class="form-group">
                                                        <label>N&uacute;mero de Tel&eacute;fono Fijo</label>
                                                        <input name="TELEFONO_FIJO" id="TELEFONO_FIJO" type="tel" class="form-control" placeholder="Telefono Fijo" required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-5">
                                                    <div class="form-group">
                                                        <label>N&uacute;mero de Tel&eacute;fono Movil</label>
                                                        <input name="TELEFONO_MOVIL" id="TELEFONO_MOVIL" type="tel" class="form-control" placeholder="Telefono Movil" required>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <!-- DATOS DE DIRECCION -->
                                        <div class="tab-pane" id="direccion">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <h4 class="info-text"> Informaci&oacute;n de la direcci&oacute;n </h4>
                                                </div>

                                                <br>
                                                <br>
                                                <br>
                                                <br>

                                                <div class="col-sm-7 col-sm-offset-2">
                                                    <div class="form-group">
                                                        <label>Departamento</label>
                                                        <select name="DEPARTAMENTO" id="DEPARTAMENTO" class="custom-select" style="font-size: 1rem;" required>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-7 col-sm-offset-2">
                                                    <div class="form-group">
                                                        <label>Direcci&oacute;n</label>
                                                        <textarea name="DIRECCION" id="DIRECCION" rows="5" cols="50" class="form-control" required></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- DATOS LABORALES -->
                                        <div class="tab-pane" id="laboral">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <h4 class="info-text"> Informaci&oacute;n laboral </h4>
                                                </div>

                                                <br>
                                                <br>
                                                <br>
                                                <br>

                                                <div class="col-sm-6 col-sm-offset-1">
                                                    <div class="form-group">
                                                        <div class="form-group">
                                                            <label>Correo Institucional</label>
                                                            <input name="CORREO_INSTITUCIONAL" id="CORREO_INSTITUCIONAL" type="text" class="form-control" placeholder="coordinador@liveusam.edu.sv" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-5 col-sm-offset-1">
                                                    <div class="form-group">
                                                        <label>Profesi&oacute;n</label>
                                                        <select name="PROFESION" id="PROFESION" class="custom-select" style="font-size: 1rem;" required>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-5">
                                                    <div class="form-group">
                                                        <label>Coordinaci&oacute;n</label><br>
                                                        <select name="COORDINACION" id="COORDINACION" class="custom-select" style="font-size: 1rem;" required>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- DATOS DE LA CUENTA -->
                                        <div class="tab-pane" id="cuenta">
                                            <span>
                                                <!-- USUARIO -->
                                                <input name="NOMBRE_USUARIO" id="NOMBRE_USUARIO" type="text">
                                                <input name="PASSWORD" id="PASSWORD" type="text">
                                            </span>
                                        </div>

                                    </div>
                                    <!-- FIN DATOS WIZARD -->

                                    <div class="wizard-footer height-wizard">
                                        <div class="pull-right">
                                            <input type="button" class="btn btn-next btn-fill btn-form btn-wd btn-sm" name="next" value="Siguiente" />
                                            <input type="submit" class="btn btn-finish btn-fill btn-form btn-wd btn-sm" name="finish" value="Guardar" onclick="crearCoordinador();"/>
                                        </div>

                                        <div class="pull-left">
                                            <input type="button" class="btn btn-previous btn-fill btn-default btn-wd btn-sm" name="previous" value="Anterior" />
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>

                                </form>
                            </div>
                        </div>
                        <!-- wizard container -->

                    </div>
                </div>
                <!-- end row -->
            </div>
            <!--aqui termina tu contenido de desarrollo-->

    <script>
        $('#DUI').mask('99999999-9');
        $('#NIT').mask('9999-999999-999-9');
        $('#TELEFONO_FIJO').mask('9999-9999');
        $('#TELEFONO_MOVIL').mask('9999-9999');
    </script>
</body>