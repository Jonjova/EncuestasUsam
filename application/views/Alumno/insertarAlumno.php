            <div class="modal fade" id="modalCreateAlumno" aria-hidden="true">
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
                                    <div class="card wizard-card" data-color="blue" id="wizardProfile1">
                                        <form id="createAlumno" class="needs-validation">

                                            <div class="wizard-header">
                                                <h3>
                                                    <b>CREAR</b> NUEVO PERFIL ALUMNO<br>
                                                    <small>Ingrese la informaci&oacute;n que se solicita del
                                                        alumno.</small>
                                                </h3>
                                            </div>

                                            <div class="wizard-navigation">
                                                <ul>
                                                    <li><a href="#datosPersonales1" data-toggle="tab">Personal</a></li>
                                                    <li><a href="#contacto1" data-toggle="tab">Contacto</a></li>
                                                    <li><a href="#direccion1" data-toggle="tab">Residencia</a></li>
                                                    <li><a href="#institucional1" data-toggle="tab">Institucional</a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="tab-content" id="tab-content">
                                                <div class="tab-pane" id="datosPersonales1">
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
                                                            <div class="col-sm-12">
                                                                <div class="form-group">
                                                                    <label>Carnet:</label>
                                                                    <input type="text" name="CARNET" id="CARNET"
                                                                        class="form-control"
                                                                        placeholder="Ingrese Carnet" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label>Primer Nombre:</label>
                                                                    <input name="PRIMER_NOMBRE_PERSONA"
                                                                        id="PRIMER_NOMBRE_PERSONA" type="text"
                                                                        class="form-control" placeholder="1er Nombre"
                                                                        required>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label>Segundo Nombre:</label>
                                                                    <input name="SEGUNDO_NOMBRE_PERSONA"
                                                                        id="SEGUNDO_NOMBRE_PERSONA" type="text"
                                                                        class="form-control" placeholder="2do Nombre">
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label>Primer Apellido:</label>
                                                                    <input name="PRIMER_APELLIDO_PERSONA"
                                                                        id="PRIMER_APELLIDO_PERSONA" type="text"
                                                                        class="form-control" placeholder="1er Apellido"
                                                                        required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Segundo Apellido:</label>
                                                                    <input name="SEGUNDO_APELLIDO_PERSONA"
                                                                        id="SEGUNDO_APELLIDO_PERSONA" type="text"
                                                                        class="form-control" placeholder="2do Apellido">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-10 col-sm-offset-1">
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label>Fecha de Nacimiento:</label>
                                                                    <input name="FECHA_NACIMIENTO" id="FECHA_NACIMIENTO"
                                                                        type="date" class="form-control" required>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label>Sexo:</label>
                                                                    <select name="SEXO" id="SEXO" class="custom-select"
                                                                        style="font-size: 1rem;"
                                                                        onblur="validaSelect(this);" required>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="tab-pane" id="contacto1">

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
                                                                    <input name="CORREO_PERSONAL" id="CORREO_PERSONAL"
                                                                        type="text" class="form-control"
                                                                        placeholder="personal@mail.com">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-5 col-sm-offset-1">
                                                            <div class="form-group">
                                                                <label>N&uacute;mero de Tel&eacute;fono Fijo:</label>
                                                                <input name="TELEFONO_FIJO" id="TELEFONO_FIJO"
                                                                    type="tel" class="form-control"
                                                                    placeholder="0000-0000" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-5">
                                                            <div class="form-group">
                                                                <label>N&uacute;mero de Tel&eacute;fono
                                                                    M&oacute;vil:</label>
                                                                <input name="TELEFONO_MOVIL" id="TELEFONO_MOVIL"
                                                                    type="tel" class="form-control"
                                                                    placeholder="0000-0000" required>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="tab-pane" id="direccion1">
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
                                                                <select name="DEPARTAMENTO" id="DEPARTAMENTO"
                                                                    class="custom-select" style="font-size: 1rem;"
                                                                    onblur="validaSelect(this);" required>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-7 col-sm-offset-2">
                                                            <div class="form-group">
                                                                <label>Direcci&oacute;n:</label>
                                                                <textarea name="DIRECCION" id="DIRECCION" rows="5"
                                                                    cols="50" class="form-control" required></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="tab-pane" id="institucional1">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <h4 class="info-text"> Informaci&oacute;n institucional
                                                            </h4>
                                                        </div>

                                                        <br>
                                                        <br>
                                                        <br>
                                                        <br>

                                                        <div class="col-sm-7 col-sm-offset-1">
                                                            <div class="form-group">
                                                                <label>Carrera</label>
                                                                <select name="CARRERA" id="CARRERA"
                                                                    class="custom-select required"
                                                                    onblur="validaSelect(this);"
                                                                    style="font-size: 1rem;" required>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-7 col-sm-offset-1">
                                                            <div class="form-group">
                                                                <label>Correo Institucional:</label>
                                                                <input name="CORREO_INSTITUCIONAL"
                                                                    id="CORREO_INSTITUCIONAL" type="text"
                                                                    class="form-control"
                                                                    placeholder="docente@liveusam.edu.sv" required>
                                                            </div>
                                                        </div>
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
                                                        name="finish" value="Guardar" id="btnCreateAlumno" />
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
                            <div class="row" id="confirmUpdate" style="display: none;">
                                <div class="col-sm-8" style="margin: auto;">
                                    <br>
                                    <div style="text-align: center; background-color: #f8d7da; border-color: #f5c6cb;
                                        color: #721c24; padding: 10px 25px 5px 25px; border-radius: 15px;">
                                        <h4 style="font-size: 1.35em;">
                                            Los datos del alumno ya existen en la base de datos.
                                        </h4>
                                        <h4 style="font-size: 1.35em;">Desea modificarlos?</h4>
                                    </div>
                                    <br>
                                    <div style="display: flex; justify-content: space-between;">
                                        <input type="button" class="btn btn-fill btn-default btn-wd btn-sm"
                                            value="CANCELAR" id="btnCancelUpdate" />
                                        <input type="button" class="btn btn-fill btn-form btn-wd btn-sm" value="ACEPTAR"
                                            id="btnAceptUpdate" data-toggle="modal" data-target="#modalUpdateAlumno" />
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

            <div class="modal fade" id="modalUpdateAlumno" aria-hidden="true">
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
                                    <div class="card wizard-card" data-color="blue" id="wizardProfile2">
                                        <form id="updateAlumno" class="needs-validation">

                                            <div class="wizard-header">
                                                <h3>
                                                    <b>ACTUALIZAR</b> PERFIL ALUMNO<br>
                                                    <small>Cambie la informaci&oacute;n que se muestra.</small>
                                                </h3>
                                            </div>

                                            <div class="wizard-navigation">
                                                <ul>
                                                    <li><a href="#datosPersonales2" data-toggle="tab">Personal</a></li>
                                                    <li><a href="#contacto2" data-toggle="tab">Contacto</a></li>
                                                    <li><a href="#direccion2" data-toggle="tab">Residencia</a></li>
                                                    <li><a href="#institucional2" data-toggle="tab">Institucional</a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="tab-content" id="tab-content">
                                                <div class="tab-pane" id="datosPersonales2">
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
                                                            <div class="col-sm-12">
                                                                <div class="form-group">
                                                                    <input type="hidden" name="ID_PERSONA_UPDATE" id="ID_PERSONA_UPDATE">
                                                                    <input type="hidden" name="ID_ALUMNO_UPDATE" id="ID_ALUMNO_UPDATE">
                                                                    <label>Carnet:</label>
                                                                    <input type="text" name="CARNET_UPDATE"
                                                                        id="CARNET_UPDATE" class="form-control"
                                                                        placeholder="Ingrese Carnet" required >

                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label>Primer Nombre:</label>
                                                                    <input name="PRIMER_NOMBRE_PERSONA"
                                                                        id="PRIMER_NOMBRE_PERSONA_UPDATE" type="text"
                                                                        class="form-control" placeholder="1er Nombre"
                                                                        required>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label>Segundo Nombre:</label>
                                                                    <input name="SEGUNDO_NOMBRE_PERSONA"
                                                                        id="SEGUNDO_NOMBRE_PERSONA_UPDATE" type="text"
                                                                        class="form-control" placeholder="2do Nombre">
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label>Primer Apellido:</label>
                                                                    <input name="PRIMER_APELLIDO_PERSONA"
                                                                        id="PRIMER_APELLIDO_PERSONA_UPDATE" type="text"
                                                                        class="form-control" placeholder="1er Apellido"
                                                                        required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Segundo Apellido:</label>
                                                                    <input name="SEGUNDO_APELLIDO_PERSONA"
                                                                        id="SEGUNDO_APELLIDO_PERSONA_UPDATE" type="text"
                                                                        class="form-control" placeholder="2do Apellido">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-10 col-sm-offset-1">
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label>Fecha de Nacimiento:</label>
                                                                    <input name="FECHA_NACIMIENTO"
                                                                        id="FECHA_NACIMIENTO_UPDATE" type="date"
                                                                        class="form-control" required>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label>Sexo:</label>
                                                                    <select name="SEXO" id="SEXO_UPDATE"
                                                                        class="custom-select" style="font-size: 1rem;"
                                                                        onblur="validaSelect(this);" required>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="tab-pane" id="contacto2">

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
                                                                <input name="TELEFONO_FIJO_UPDATE" id="TELEFONO_FIJO_UPDATE"
                                                                    type="tel" class="form-control"
                                                                    placeholder="0000-0000" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-5">
                                                            <div class="form-group">
                                                                <label>N&uacute;mero de Tel&eacute;fono
                                                                    M&oacute;vil:</label>
                                                                <input name="TELEFONO_MOVIL_UPDATE" id="TELEFONO_MOVIL_UPDATE"
                                                                    type="tel" class="form-control"
                                                                    placeholder="0000-0000" required>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="tab-pane" id="direccion2">
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
                                                                <select name="DEPARTAMENTO" id="DEPARTAMENTO_UPDATE"
                                                                    class="custom-select" style="font-size: 1rem;"
                                                                    onblur="validaSelect(this);" required>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-7 col-sm-offset-2">
                                                            <div class="form-group">
                                                                <label>Direcci&oacute;n:</label>
                                                                <textarea name="DIRECCION" id="DIRECCION_UPDATE"
                                                                    rows="5" cols="50" class="form-control"
                                                                    required></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="tab-pane" id="institucional2">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <h4 class="info-text"> Informaci&oacute;n institucional
                                                            </h4>
                                                        </div>

                                                        <br>
                                                        <br>
                                                        <br>
                                                        <br>

                                                        <div class="col-sm-7 col-sm-offset-1">
                                                            <div class="form-group">
                                                                <label>Carrera</label>
                                                                <select name="CARRERA" id="CARRERA_UPDATE"
                                                                    class="custom-select required"
                                                                    onblur="validaSelect(this);"
                                                                    style="font-size: 1rem;" required>
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