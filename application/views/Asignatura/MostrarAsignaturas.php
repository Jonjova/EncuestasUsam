            <h2>Asignaturas Registradas</h2>

            <br>

            <form action="">
                <table id="Asignaturas" class="table table-hover table-striped dt-responsive nowrap"
                    style="width: 100%; margin: auto;">
                    <thead style="background-color: #094f8b; color: #fff; font-size: 17px;">
                        <tr>
                            <th>#</th>
                            <th>C&oacute;digo Asignatura</th>
                            <th>Nombre Asignatura</th>
                            <th>Accion</th>
                        </tr>
                    </thead>
                </table>
            </form>

            <div class="modal fade" id="modalAsignatura" aria-hidden="true">
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
                                        <form id="UpdateAsignatura" class="needs-validation">

                                            <div class="wizard-header">
                                                <h3>
                                                    <b>ACTUALIZAR</b> ASIGNATURA<br>
                                                </h3>
                                            </div>

                                            <div class="wizard-navigation">
                                                <ul>
                                                    <li><a href="#datosAsignatura"
                                                            data-toggle="tab">Informaci&oacute;n</a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="tab-content" id="tab-content">

                                                <div class="tab-pane" id="datosAsignatura">
                                                    <div class="row" style="display: block;">
                                                        <h4 class="info-text"> Datos de la Asignatura </h4>

                                                        <div class="col-sm-8 col-sm-offset-2">
                                                            <div class="form-group">
                                                                <input type="hidden" name="ID_ASIGNATURA_UPDATE"
                                                                    id="ID_ASIGNATURA_UPDATE">
                                                                <label>C&oacute;digo de la Asignatura:</label>
                                                                <input name="CODIGO_ASIGNATURA_UPDATE"
                                                                    id="CODIGO_ASIGNATURA_UPDATE" type="text"
                                                                    class="form-control" placeholder="Código" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Nombre de la Asignatura:</label>
                                                                <input name="NOMBRE_ASIGNATURA_UPDATE"
                                                                    id="NOMBRE_ASIGNATURA_UPDATE" type="text"
                                                                    class="form-control" placeholder="Nombre" required>
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