            <div class="modal fade" id="modalAlumno" aria-hidden="true">
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
                                        <form id="createUpdateAlumno" class="needs-validation">

                                            <div class="wizard-header" id="titleCreateAlumno">
                                                <h3>
                                                    <b>CREAR</b> NUEVO PERFIL ALUMNO<br>
                                                    <small>Ingrese la informaci&oacute;n que se solicita del
                                                        alumno.</small>
                                                </h3>
                                            </div>

                                            <div class="wizard-header" id="titleUpdateAlumno">
                                                <h3>
                                                    <b>ACTUALIZAR</b> PERFIL ALUMNO<br>
                                                    <small>Cambie la informaci&oacute;n que se muestra.</small>
                                                </h3>
                                            </div>

                                            <div class="wizard-navigation">
                                                <ul>
                                                    <li><a href="#datosPersonales" data-toggle="tab">Personal</a></li>
                                                    <li><a href="#contacto" data-toggle="tab">Contacto</a></li>
                                                    <li><a href="#direccion" data-toggle="tab">Residencia</a></li>
                                                    <li><a href="#institucional" data-toggle="tab">Institucional</a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <input type="hidden" name="ID_PERSONA_UPDATE" id="ID_PERSONA_UPDATE">
                                            <input type="hidden" name="ID_ALUMNO_UPDATE" id="ID_ALUMNO_UPDATE">

                                            <div class="tab-content" id="tab-content">
                                                
                                            </div>

                                            <div class="wizard-footer height-wizard">
                                                <div class="pull-right">
                                                    <input type="button"
                                                        class="btn btn-next btn-fill btn-form btn-wd btn-sm"
                                                        name="next" value="siguiente" />
                                                    <div id="btnCreateUpdateAlumno">
                                                        
                                                    </div>
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
                                        <input type="button" class="btn btn-fill btn-form btn-wd btn-sm"
                                            value="ACEPTAR" id="btnAceptUpdate" />
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