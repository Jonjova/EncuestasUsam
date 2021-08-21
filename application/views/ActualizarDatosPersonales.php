            <!--Contenido de desarrollo-->
            <div class="container" id="container">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2" id="col-wizard">

                        <!--      Wizard container        -->
                        <div class="wizard-container">

                            <div class="card wizard-card" data-color="blue" id="wizardProfile">
                                <form id="UpdatePersona" class="needs-validation">

                                    <div class="wizard-header">
                                        <h3>
                                            <b>ACTUALIZAR</b> MI PERFIL <br>
                                            <small>Cambie la informaci&oacute;n que se muestra.</small>
                                        </h3>
                                    </div>

                                    <div class="wizard-navigation">
                                        <ul>
                                            <li><a href="#datosPersonales" data-toggle="tab">Mis Datos</a></li>
                                        </ul>
                                    </div>

                                    <!-- DATOS WIZARD -->
                                    <div class="tab-content" id="tab-content">

                                        <div class="tab-pane" id="datosPersonales">
                                            <div class="row" style="display: block;">
                                                <h4 class="info-text"> Datos Personales</h4>
                                                <div class="col-sm-4 col-sm-offset-1" id="logo_USAM">
                                                    <div class="picture-container">
                                                        <img src="<?php echo base_url();?>assets/img/logo_USAM.png" class="picture-src" id="wizardPicturePreview" title="" />
                                                    </div>
                                                </div>

                                                <br>

                                                <div class="col-sm-6" id="col_persona">
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label>N&uacute;mero de Tel&eacute;fono Fijo</label>
                                                            <input name="ID_PERSONA" id="ID_PERSONA_UPDATE" type="hidden" value="<?=$this->session->userdata('PERSONA')?>">
                                                            <input name="TELEFONO_FIJO" id="TELEFONO_FIJO_UPDATE" type="tel" class="form-control" placeholder="0000-0000" required>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>N&uacute;mero de Tel&eacute;fono M&oacute;vil</label>
                                                            <input name="TELEFONO_MOVIL" id="TELEFONO_MOVIL_UPDATE" type="tel" class="form-control" placeholder="0000-0000" required>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Departamento</label>
                                                            <select name="DEPARTAMENTO" id="DEPARTAMENTO" class="custom-select" style="font-size: 1rem;" onblur="validaSelect(this);" required>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-10 col-sm-offset-1">
                                                    <div class="col-sm-10">
                                                        <div class="form-group">
                                                            <label>Correo Personal(No Obligatorio)</label>
                                                            <input name="CORREO_PERSONAL" id="CORREO_PERSONAL_UPDATE" type="email" class="form-control" placeholder="personal@mail.com">
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label>Direcci&oacute;n</label>
                                                            <textarea name="DIRECCION" id="DIRECCION_UPDATE" rows="3" cols="50" class="form-control" required></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- FIN DATOS WIZARD -->

                                    <div class="wizard-footer height-wizard">
                                        <div class="pull-right">
                                            <input type="button" class="btn btn-next btn-fill btn-form btn-wd btn-sm" name="next" value="Siguiente" />
                                            <input type="submit" class="btn btn-finish btn-fill btn-form btn-wd btn-sm" name="finish" value="Guardar" />
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
            
</body>