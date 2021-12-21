        <h2>Profesiones Registradas</h2>

        <br>

        <form action="">
            <table id="Profesiones" class="table table-hover table-striped dt-responsive nowrap" style="width: 100%; margin: auto;">
                <thead style="background-color: #094f8b; color: #fff; font-size: 17px;">
                    <tr>
                        <th>#</th>
                        <th>Nombre Profesión</th>
                        <th>Acción</th>
                    </tr>
                </thead>
            </table>
        </form>

        <div class="modal fade" id="modalProfesion" aria-hidden="true">
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
                                    <form id="UpdateProfesion" class="needs-validation">

                                        <div class="wizard-header">
                                            <h3>
                                                <b>ACTUALIZAR</b> PROFESIÓN<br>
                                            </h3>
                                        </div>

                                        <div class="wizard-navigation">
                                            <ul>
                                                <li><a href="#profesion" data-toggle="tab">Informaci&oacute;n</a></li>
                                            </ul>
                                        </div>

                                        <div class="tab-content" id="tab-content">
                                            <div class="tab-pane" id="profesion">
                                                <div class="row" style="display: block;">
                                                    <br><br><br><br><br>

                                                    <div class="col-sm-8 col-sm-offset-2">
                                                        <div class="form-group">
                                                            <label>Nombre de la profesión:</label>
                                                            <input type="hidden" name="ID_PROFESION_UPDATE" id="ID_PROFESION_UPDATE">
                                                            <input type="text" name="NOMBRE_PROFESION_UPDATE" id="NOMBRE_PROFESION_UPDATE" class="form-control" placeholder="Ingrese nombre" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="wizard-footer height-wizard">
                                            <div class="pull-right">
                                                <input type="submit" class="btn btn-finish btn-fill btn-form btn-wd btn-sm" name="finish" value="Actualizar" />
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