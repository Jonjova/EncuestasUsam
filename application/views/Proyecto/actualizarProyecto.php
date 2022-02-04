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
                                <div class="wizard-container">
                                    <div class="card wizard-card" data-color="blue" id="wizardProfile">
                                        <form id="UpdateProyecto_" class="needs-validation">

                                            <div class="wizard-header">
                                                <h3>
                                                    <b>ACTUALIZAR</b> PROYECTO<br>
                                                    <small>Cambie la informaci&oacute;n que se muestra.</small>
                                                </h3>
                                            </div>

                                            <div class="wizard-navigation">
                                                <ul>
                                                    <li><a href="#datosProyecto" data-toggle="tab">Personal</a></li>
                                                  
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
                                                        <div class="col-sm-6" >
                                                            <div class="col-sm-12">
                                                               <div class="form-group">
                                                               <label>Tema del proyecto:</label>
                                                                <input type="hidden" name="ID_PROYECTO_UPDATE_" id="ID_PROYECTO_UPDATE_">
                                                                <input name="NOMBRE_PROYECTO_UPDATE" id="NOMBRE_PROYECTO_UPDATE"
                                                                type="text" class="form-control" placeholder="Nombre" required>
                                                              </div>

                                                              <div class="form-group">
                                                               <label>Descripci&oacute;n:</label>
                                                               <textarea name="DESCRIPCION_UPDATE" id="DESCRIPCION_UPDATE"
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
                                                            <select name="ID_ASIGNATURA_UPDATE_" id="ID_ASIGNATURA_UPDATE_"
                                                                class="custom-select" onblur="validaSelect(this);"
                                                                style="font-size: 1rem;" required>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Diseño de investigaci&oacute;n:</label>
                                                            <select name="ID_DISENIO_INVESTIGACION_UPDATE"
                                                                id="ID_DISENIO_INVESTIGACION_UPDATE" class="custom-select"
                                                                onblur="validaSelect(this);" style="font-size: 1rem;"
                                                                required>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                           <div class="wizard-footer height-wizard">
                                                <div class="pull-right">
                                                    <input type="submit"
                                                        class="btn btn-finish btn-fill btn-form btn-wd btn-sm"
                                                        name="finish" value="Actualizar" />
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