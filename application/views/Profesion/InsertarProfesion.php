            <div class="container" id="container">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2" id="col-wizard">

                        <div class="wizard-container">

                            <div class="card wizard-card" data-color="blue" id="wizardProfile">
                                <form id="CreateProfesion" class="needs-validation">

                                    <div class="wizard-header">
                                        <h3>
                                            <b>CREAR</b> NUEVA PROFESIÓN<br>
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
                                                <br>

                                                <div class="col-sm-8 col-sm-offset-2">
                                                    <div class="form-group">
                                                        <label>Nombre de la profesión:</label>
                                                        <input name="NOMBRE_PROFESION" id="NOMBRE_PROFESION" type="text"
                                                            class="form-control" placeholder="Ingrese nombre" required>
                                                    </div>
                                                </div>

                                                <div class="col-sm-8 col-sm-offset-2">
                                                    <div class="form-group">
                                                        <label>Abreviatura para nombres masculinos:</label>
                                                        <input name="ABREVIATURA_M" id="ABREVIATURA_M" type="text"
                                                            class="form-control" placeholder="Ingrese abreviatura" required>
                                                    </div>
                                                </div>

                                                <div class="col-sm-8 col-sm-offset-2">
                                                    <div class="form-group">
                                                        <label>Abreviatura para nombres femenino:</label>
                                                        <input name="ABREVIATURA_F" id="ABREVIATURA_F" type="text"
                                                            class="form-control" placeholder="Ingrese abreviatura">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="wizard-footer height-wizard">
                                        <div class="pull-right">
                                            <input type="submit" class="btn btn-finish btn-fill btn-form btn-wd btn-sm"
                                                name="finish" value="Guardar" />
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>

                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>