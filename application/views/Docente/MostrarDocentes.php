            <h2>Docentes Registrados</h2>

            <br>

            <?php if($this->session->userdata('ID_TIPO_USUARIO') == 1):?>
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Filtrar por coordinador:</label>
                    <select name="ID_COORDINADOR" id="ID_COORDINADOR" class="custom-select" style="font-size: 1rem;">
                    </select>
                </div>
            </div>
            <br>
            <?php else:?>
            <input type="hidden" name="ID_COORDINADOR" value="<?=$this->session->userdata('COORDINADOR')?>">
            <?php endif?>

            <form action="">
                <table id="Docentes" class="table table-hover table-striped dt-responsive nowrap"
                    style="width: 100%; margin: auto;">
                    <thead style="background-color: #094f8b; color: #fff; font-size: 17px;">
                        <tr>
                            <th>#</th>
                            <th>Docente</th>
                            <th>Usuario</th>
                            <th>Tel&eacute;fono M&oacute;vil</th>
                            <th>Correo Personal</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                </table>
            </form>

            <div class="modal fade" id="InfoDocente" aria-hidden="true">
                <div class="modal-dialog  modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color: #094f8b; color: #fff;">
                            <h5 class="modal-title" id="exampleModalLongTitle">Informaci&oacute;n del Docente</h5>
                            <div id="msg"></div>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"><i class="fas fa-times-circle text-white"></i></span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <br>
                            <div class="row" style="word-break: break-all;">
                                <div class="col-sm-5 col-sm-offset-1">
                                    <label>Nombres:</label>
                                    <p id="DO_NOMBRES"></p>
                                    <label>Apellidos:</label>
                                    <p id="DO_APELLIDOS"></p>
                                    <label>Profesi&oacute;n:</label>
                                    <p id="DO_PROFESION"></p>
                                    <label>Tel&eacute;fono Fijo:</label>
                                    <p id="DO_TELEFONO_FIJO"></p>
                                    <label>Tel&eacute;fono M&oacute;vil:</label>
                                    <p id="DO_TELEFONO_MOVIL"></p>
                                    <label>Direcci&oacute;n:</label>
                                    <p id="DO_NOMBRE_DEPARTAMENTO"></p>
                                    <p id="DO_DIRECCION"></p>
                                </div>
                                <div class="col-sm-5">
                                    <label>Correo Institucional:</label>
                                    <p id="DO_CORREO_INSTITUCIONAL"></p>
                                    <label>Correo Personal:</label>
                                    <p id="DO_CORREO_PERSONAL"></p>
                                    <label>DUI:</label>
                                    <p id="DO_DUI"></p>
                                    <label>NIT:</label>
                                    <p id="DO_NIT"></p>
                                    <label>Nombre Usuario:</label>
                                    <p id="DO_NOMBRE_USUARIO"></p>
                                    <label>Estado:</label>
                                    <p id="DO_ESTADO"></p>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer" style="background-color: #094f8b;">
                            <div class="btn-sm"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="modalDocente" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color: #094f8b; color: #fff;">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"><i class="fas fa-times-circle text-white"></i></span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="col-sm-12">
                                <div class="wizard-container">
                                    <div class="card wizard-card" data-color="blue" id="wizardProfile">
                                        <form id="UpdateDocente" class="needs-validation">

                                            <div class="wizard-header">
                                                <h3>
                                                    <b>ACTUALIZAR</b> PERFIL DOCENTE<br>
                                                    <small>Cambie la informaci&oacute;n que se muestra.</small>
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

                                            <div class="tab-content" id="tab-content">
                                                <div class="tab-pane" id="datosPersonales">
                                                    <div class="row" style="display: block;">
                                                        <h4 class="info-text"> Informaci&oacute;n b&aacute;sica</h4>
                                                        <div class="col-sm-4 col-sm-offset-1" id="logo_USAM">
                                                            <div class="picture-container">
                                                                <img src="<?php echo base_url();?>assets/img/logo_USAM.png"
                                                                    class="picture-src" id="wizardPicturePreview"
                                                                    title="" />
                                                            </div>
                                                        </div>

                                                        <br>

                                                        <div class="col-sm-6" id="col_persona">
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label>Primer Nombre:</label>
                                                                    <input type="hidden" name="ID_PERSONA_UPDATE"
                                                                        id="ID_PERSONA_UPDATE">
                                                                    <input name="PRIMER_NOMBRE_PERSONA_UPDATE"
                                                                        id="PRIMER_NOMBRE_PERSONA_UPDATE" type="text"
                                                                        class="form-control" placeholder="1er Nombre"
                                                                        required>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label>Segundo Nombre:</label>
                                                                    <input name="SEGUNDO_NOMBRE_PERSONA_UPDATE"
                                                                        id="SEGUNDO_NOMBRE_PERSONA_UPDATE" type="text"
                                                                        class="form-control" placeholder="2do Nombre">
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label>Primer Apellido:</label>
                                                                    <input name="PRIMER_APELLIDO_PERSONA_UPDATE"
                                                                        id="PRIMER_APELLIDO_PERSONA_UPDATE" type="text"
                                                                        class="form-control" placeholder="1er Apellido"
                                                                        required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Segundo Apellido:</label>
                                                                    <input name="SEGUNDO_APELLIDO_PERSONA_UPDATE"
                                                                        id="SEGUNDO_APELLIDO_PERSONA_UPDATE" type="text"
                                                                        class="form-control" placeholder="2do Apellido">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-10 col-sm-offset-1">
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label>Fecha de Nacimiento:</label>
                                                                    <input name="FECHA_NACIMIENTO_UPDATE"
                                                                        id="FECHA_NACIMIENTO_UPDATE" type="date"
                                                                        class="form-control" required>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label>Sexo:</label>
                                                                    <select name="SEXO_UPDATE" id="SEXO_UPDATE"
                                                                        class="custom-select" style="font-size: 1rem;"
                                                                        onblur="validaSelect(this);" required>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label>N&uacute;mero de DUI:</label>
                                                                    <input name="DUI_UPDATE" id="DUI_UPDATE" type="text"
                                                                        class="form-control" placeholder="00000000-0"
                                                                        required>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label>N&uacute;mero de NIT:</label>
                                                                    <input name="NIT_UPDATE" id="NIT_UPDATE" type="text"
                                                                        class="form-control"
                                                                        placeholder="0000-000000-000-0" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

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
                                                                    <label>Correo Personal(No Obligatorio):</label>
                                                                    <input name="CORREO_PERSONAL_UPDATE"
                                                                        id="CORREO_PERSONAL_UPDATE" type="text"
                                                                        class="form-control"
                                                                        placeholder="personal@mail.com">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-5 col-sm-offset-1">
                                                            <div class="form-group">
                                                                <label>N&uacute;mero de Tel&eacute;fono Fijo:</label>
                                                                <input name="TELEFONO_FIJO_UPDATE"
                                                                    id="TELEFONO_FIJO_UPDATE" type="tel"
                                                                    class="form-control" placeholder="0000-0000"
                                                                    required>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-5">
                                                            <div class="form-group">
                                                                <label>N&uacute;mero de Tel&eacute;fono
                                                                    M&oacute;vil:</label>
                                                                <input name="TELEFONO_MOVIL_UPDATE"
                                                                    id="TELEFONO_MOVIL_UPDATE" type="tel"
                                                                    class="form-control" placeholder="0000-0000"
                                                                    required>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="tab-pane" id="direccion">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <h4 class="info-text"> Informaci&oacute;n de la
                                                                direcci&oacute;n
                                                            </h4>
                                                        </div>

                                                        <br>
                                                        <br>
                                                        <br>
                                                        <br>

                                                        <div class="col-sm-7 col-sm-offset-2">
                                                            <div class="form-group">
                                                                <label>Departamento:</label>
                                                                <select name="DEPARTAMENTO_UPDATE"
                                                                    id="DEPARTAMENTO_UPDATE" class="custom-select"
                                                                    style="font-size: 1rem;"
                                                                    onblur="validaSelect(this);" required>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-7 col-sm-offset-2">
                                                            <div class="form-group">
                                                                <label>Direcci&oacute;n:</label>
                                                                <textarea name="DIRECCION_UPDATE" id="DIRECCION_UPDATE"
                                                                    rows="5" cols="50" class="form-control"
                                                                    required></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="tab-pane" id="laboral">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <h4 class="info-text"> Informaci&oacute;n laboral </h4>
                                                        </div>

                                                        <br>
                                                        <br>
                                                        <br>
                                                        <br>

                                                        <div class="col-sm-5 col-sm-offset-1">
                                                            <div class="form-group">
                                                                <label>Profesi&oacute;n:</label>
                                                                <select name="PROFESION_UPDATE" id="PROFESION_UPDATE"
                                                                    class="custom-select" style="font-size: 1rem;"
                                                                    onblur="validaSelect(this);" required>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-7 col-sm-offset-1">
                                                            <div class="form-group">
                                                                <label>Correo Institucional:</label>
                                                                <input name="CORREO_INSTITUCIONAL_UPDATE"
                                                                    id="CORREO_INSTITUCIONAL_UPDATE" type="text"
                                                                    class="form-control"
                                                                    placeholder="docente@liveusam.edu.sv" required>
                                                            </div>
                                                        </div>
                                                        <!-- ID COORDINADOR -->
                                                        <?php if($this->session->userdata('ID_TIPO_USUARIO') == 1):?>
                                                        <div class="col-sm-7 col-sm-offset-1">
                                                            <div class="form-group">
                                                                <label>Coordinador:</label>
                                                                <select name="COORDINADOR_UPDATE"
                                                                    id="COORDINADOR_UPDATE" class="custom-select"
                                                                    style="font-size: 1rem;"
                                                                    onblur="validaSelect(this);" required>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <?php else:?>
                                                        <input type="hidden" name="COORDINADOR_UPDATE"
                                                            value="<?=$this->session->userdata('COORDINADOR')?>">
                                                        <?php endif;?>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="wizard-footer height-wizard">
                                                <div class="pull-right">
                                                    <input type="button"
                                                        class="btn btn-next btn-fill btn-form btn-wd btn-sm" name="next"
                                                        value="Siguiente" />
                                                    <input type="submit"
                                                        class="btn btn-finish btn-fill btn-form btn-wd btn-sm"
                                                        name="finish" value="Actualizar" />
                                                </div>

                                                <div class="pull-left">
                                                    <input type="button"
                                                        class="btn btn-previous btn-fill btn-default btn-wd btn-sm"
                                                        name="previous" value="Anterior" />
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer" style="background-color: #094f8b;">
                            <div class="btn-sm"></div>
                        </div>
                    </div>
                </div>
            </div>