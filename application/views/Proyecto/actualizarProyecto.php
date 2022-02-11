            <div class="modal fade" id="modalProyecto" aria-hidden="true">
                <div class="modal-dialog  modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color: #094f8b; color: #fff;">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"><i class="fas fa-times-circle text-white"></i></span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="col-sm-12">

                                <div style="border-radius: .25rem;
                                    border: 1px solid rgba(0,0,0,.125);
                                    box-shadow: 0 0 15px rgba(0, 0, 0, 0.15), 0 0 1px 1px rgba(0, 0, 0, 0.1);">
                                    <br>

                                    <h3 style="text-align: center;">
                                        <b>ACTUALIZAR</b> PROYECTO<br>
                                        <small>Cambie la informaci&oacute;n que se muestra.</small>
                                    </h3>
                                    <div class="wizard-navigation">
                                        <ul class="nav nav-pills">
                                            <li style="width: 100%;">
                                                <a data-toggle="tab" class="">Informaci&oacute;n</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <form id="UpdateProyecto" class="needs-validation">

                                        <br>

                                        <h4 class="info-text" style="text-align: center;">
                                            Informaci&oacute;n b&aacute;sica
                                        </h4>

                                        <br>

                                        <div class="col-sm-8 col-sm-offset-2">
                                            <div class="form-group">
                                                <label>Tema del proyecto:</label>
                                                <input type="hidden" name="ID_PROYECTO_UPDATE" id="ID_PROYECTO_UPDATE">
                                                <input name="NOMBRE_PROYECTO_UPDATE" id="NOMBRE_PROYECTO_UPDATE"
                                                    type="text" class="form-control" placeholder="Nombre" required>
                                            </div>

                                            <div class="form-group">
                                                <label>Descripci&oacute;n:</label>
                                                <textarea name="DESCRIPCION_UPDATE" id="DESCRIPCION_UPDATE"
                                                    placeholder="Descripción" rows="2" cols="50" class="form-control"
                                                    required></textarea>
                                            </div>

                                            <div class="form-group">
                                                <label>Tipo de investigaci&oacute;n:</label>
                                                <select name="ID_TIPO_INVESTIGACION_UPDATE"
                                                    id="ID_TIPO_INVESTIGACION_UPDATE" class="custom-select"
                                                    required></select>
                                            </div>

                                            <div class="form-group">
                                                <label>Diseño de investigaci&oacute;n:</label>
                                                <select name="ID_DISENIO_INVESTIGACION_UPDATE"
                                                    id="ID_DISENIO_INVESTIGACION_UPDATE" class="custom-select"
                                                    onblur="validaSelect(this);" style="font-size: 1rem;" required>
                                                </select>
                                            </div>
                                        </div>

                                        <br><br>

                                        <div class="pull-right" style="padding: 0 10px">
                                            <input type="submit" class="btn btn-finish btn-fill btn-form btn-wd btn-sm"
                                                name="finish" value="ACTUALIZAR" />
                                        </div>

                                        <br><br>

                                    </form>
                                </div>

                                <!-- <div class="wizard-container">
                                    <div class="card wizard-card" data-color="blue" id="wizardProfile">
                                        <form id="UpdateProyecto" class="needs-validation">

                                            <div class="wizard-header">
                                                <h3>
                                                    <b>ACTUALIZAR</b> PROYECTO<br>
                                                    <small>Cambie la informaci&oacute;n que se muestra.</small>
                                                </h3>
                                            </div>

                                            <div class="wizard-navigation">
                                                <ul>
                                                    <li><a href="#datosProyecto"
                                                            data-toggle="tab">Informaci&oacute;n</a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="tab-content" id="tab-content">
                                                <div class="tab-pane" id="datosProyecto">
                                                    <div class="row" style="display: block;">
                                                        <h4 class="info-text"> Informaci&oacute;n b&aacute;sica</h4>
                                                        <div class="col-sm-4 col-sm-offset-1" id="logo_USAM">
                                                            <div class="picture-container">
                                                                <img src="<?php echo base_url();?>assets/img/logo_USAM.png"
                                                                    class="picture-src" id="wizardPicturePreview"
                                                                    title="" />
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="col-sm-12">
                                                                <div class="form-group">
                                                                    <label>Tema del proyecto:</label>
                                                                    <input type="hidden" name="ID_PROYECTO_UPDATE"
                                                                        id="ID_PROYECTO_UPDATE">
                                                                    <input name="NOMBRE_PROYECTO_UPDATE"
                                                                        id="NOMBRE_PROYECTO_UPDATE" type="text"
                                                                        class="form-control" placeholder="Nombre"
                                                                        required>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label>Descripci&oacute;n:</label>
                                                                    <textarea name="DESCRIPCION_UPDATE"
                                                                        id="DESCRIPCION_UPDATE"
                                                                        placeholder="Descripción" rows="2" cols="50"
                                                                        class="form-control" required></textarea>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-10 col-sm-offset-1">
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label>Tipo de investigaci&oacute;n:</label>
                                                                    <select name="ID_TIPO_INVESTIGACION_UPDATE"
                                                                        id="ID_TIPO_INVESTIGACION_UPDATE"
                                                                        class="custom-select" required></select>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label>Asignatura:</label>
                                                                    <select name="ID_ASIGNATURA_UPDATE"
                                                                        id="ID_ASIGNATURA_UPDATE" class="custom-select"
                                                                        onblur="validaSelect(this);"
                                                                        style="font-size: 1rem;" required>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label>Diseño de investigaci&oacute;n:</label>
                                                                    <select name="ID_DISENIO_INVESTIGACION_UPDATE"
                                                                        id="ID_DISENIO_INVESTIGACION_UPDATE"
                                                                        class="custom-select"
                                                                        onblur="validaSelect(this);"
                                                                        style="font-size: 1rem;" required>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="wizard-footer height-wizard">
                                                <div class="pull-right" style="padding: 0 10px">
                                                    <input type="submit"
                                                        class="btn btn-finish btn-fill btn-form btn-wd btn-sm"
                                                        name="finish" value="Actualizar" />
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>

                                        </form>
                                    </div>
                                </div> -->
                            </div>

                        </div>
                        <div class="modal-footer" style="background-color: #094f8b;">
                            <div class="btn-sm"></div>
                        </div>
                    </div>
                </div>
            </div>