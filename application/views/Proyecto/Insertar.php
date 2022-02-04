            <div class="container" id="container">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2" id="col-wizard">

                        <div class="wizard-container">

                            <div class="card wizard-card" data-color="blue" id="wizardProfile">
                                <form id="CrearProyecto" class="needs-validation">

                                    <div class="wizard-header">
                                        <h3>
                                            <b>CREAR</b> NUEVO PROYECTO<br>
                                            <small>Ingrese la informaci&oacute;n que se solicita del
                                                proyecto.</small>
                                        </h3>
                                    </div>

                                    <div class="wizard-navigation">
                                        <ul>
                                            <li>
                                                <a href="#datosProyecto" data-toggle="tab">Informaci&oacute;n</a>
                                            </li>
                                            <li>
                                                <a href="#asignacion" data-toggle="tab">Asignaci&oacute;n</a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="tab-content" id="tab-content">

                                        <div class="tab-pane" id="datosProyecto">
                                            <div class="row" style="display: block;">
                                                <h4 class="info-text"> Datos del proyecto </h4>
                                                <div class="col-sm-4 col-sm-offset-1" id="logo_USAM">
                                                    <div class="picture-container">
                                                        <img src="<?php echo base_url();?>assets/img/logo_USAM.png"
                                                            class="picture-src" id="wizardPicturePreview" title="" />
                                                    </div>
                                                </div>

                                                <br>

                                                <div class="col-sm-6" id="col_persona">
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label>Tema del proyecto:</label>
                                                            <input name="NOMBRE_PROYECTO" id="NOMBRE_PROYECTO"
                                                                type="text" class="form-control" placeholder="Nombre">

                                                        </div>
                                                        <div class="form-group">
                                                            <label>Descripci&oacute;n:</label>
                                                            <textarea name="DESCRIPCION" id="DESCRIPCION"
                                                                placeholder="Descripción" rows="2" cols="50"
                                                                class="form-control"></textarea>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="col-sm-10 col-sm-offset-1">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Tipo de investigaci&oacute;n:</label>
                                                            <select name="ID_TIPO_INVESTIGACION"
                                                                id="ID_TIPO_INVESTIGACION"
                                                                class="custom-select"></select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Asignatura:</label>
                                                            <select name="ID_ASIGNATURA" id="ID_ASIGNATURA"
                                                                class="custom-select" onblur="validaSelect(this);"
                                                                style="font-size: 1rem;" required>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Diseño de investigaci&oacute;n:</label>
                                                            <select name="ID_DISENIO_INVESTIGACION"
                                                                id="ID_DISENIO_INVESTIGACION" class="custom-select"
                                                                onblur="validaSelect(this);" style="font-size: 1rem;"
                                                                required>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-pane" id="asignacion">

                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <h4 class="info-text"> Informaci&oacute;n de Asignaci&oacute;n
                                                    </h4>
                                                </div>

                                                <br>
                                                <br>
                                                <br>
                                                <br>

                                                <div class="col-sm-10 col-sm-offset-2">
                                                    <div class="col-sm-10">
                                                        <div class="form-group">
                                                            <label>Ciclo:</label>
                                                            <select name="CICLO" id="CICLO" class="custom-select"
                                                                onblur="validaSelect(this);" style="font-size: 1rem;"
                                                                required>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Grupo de alumno:</label>
                                                            <select name="ID_GRUPO_ALUMNO" title="Selecciona.."
                                                                id="ID_GRUPO_ALUMNO" class="custom-select"
                                                                onblur="validaSelect(this);" style="font-size: 1rem;"
                                                                required>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6" style="margin-top: 2rem;">
                                                        <button type="button" class="btn btn-success"
                                                            data-toggle="modal" data-target="#modalGrupo"
                                                            onclick="grupoAsignaturaCiclo();">
                                                            <i class="fas fa-plus-circle"></i> Nuevo Grupo
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="wizard-footer height-wizard">
                                        <div class="pull-right">
                                            <input type="button" class="btn btn-next btn-fill btn-form btn-wd btn-sm"
                                                name="next" value="siguiente" />
                                            <input type="submit" class="btn btn-finish btn-fill btn-form btn-wd btn-sm"
                                                name="finish" value="guardar" />
                                        </div>

                                        <div class="pull-left">
                                            <input type="button"
                                                class="btn btn-previous btn-fill btn-default btn-wd btn-sm"
                                                name="previous" value="anterior" />
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>

                                </form>
                            </div>
                        </div>

                    </div>

                </div>

            </div>