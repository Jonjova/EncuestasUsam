            <div class="container" id="container">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2" id="col-wizard">

                        <div class="wizard-container">

                            <div class="card wizard-card" data-color="blue" id="wizardProfile">
                                <form id="AsignarMateria" class="needs-validation">

                                    <div class="wizard-header">
                                        <h3>
                                            <b>NUEVA</b> ASIGNATURA DOCENTE<br>
                                        </h3>
                                    </div>

                                    <div class="wizard-navigation">
                                        <ul>
                                            <li><a href="#asignatura" data-toggle="tab">Informaci&oacute;n</a></li>
                                        </ul>
                                    </div>

                                    <div class="tab-content" id="tab-content">

                                        <div class="tab-pane" id="asignatura">
                                            <div class="row" style="display: block;">
                                                <h4 class="info-text"> Asignaci&oacute;n </h4>

                                                <div class="col-sm-8 col-sm-offset-2">
                                                    <div class="form-group">
                                                        <label>Asignatura:</label>
                                                        <select name="ID_ASIGNATURA" id="ID_ASIGNATURA" onchange="docente(this.value);"
                                                            class="custom-select" style="font-size: 1rem;"
                                                            onblur="validaSelect(this);" required>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Docente:</label>
                                                        <select name="ID_DOCENTE" id="ID_DOCENTE" class="custom-select"
                                                            style="font-size: 1rem; width: 100%;" onblur="validaSelect(this);"
                                                            required>
                                                        </select>
                                                        <input name="USUARIO_CREA" type="hidden"
                                                            value="<?=$this->session->userdata('ID_USUARIO')?>">
                                                        <input name="FECHA_CREA" type="hidden"
                                                            value="<?php echo date('Y/m/d'); ?>">
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