            <div class="container" id="container">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2" id="col-wizard">

                        <div class="wizard-container">

                            <div class="card wizard-card" data-color="blue" id="wizardProfile">
                                <form id="CreateAsignatura" class="needs-validation" >

                                    <div class="wizard-header">
                                        <h3>
                                            <b>CREAR</b> NUEVA ASIGNATURA<br>
                                            <small>Ingrese la informaci&oacute;n que se solicita de la asignatura.</small>
                                        </h3>
                                    </div>

                                    <div class="wizard-navigation">
                                        <ul>
                                            <li><a href="#datosAsignatura" data-toggle="tab">Informaci&oacute;n</a></li>
                                        </ul>
                                    </div>

                                    <div class="tab-content" id="tab-content">

                                        <div class="tab-pane" id="datosAsignatura">
                                            <div class="row" style="display: block;">
                                                <h4 class="info-text"> Datos de la Asignatura </h4>

                                                <div class="col-sm-8 col-sm-offset-2">
                                                    <div class="form-group">
                                                        <label>C&oacute;digo de la Asignatura:</label>
                                                        <input name="CODIGO_ASIGNATURA" id="CODIGO_ASIGNATURA" type="text" class="form-control" placeholder="Código" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Nombre de la Asignatura:</label>
                                                        <input name="NOMBRE_ASIGNATURA" id="NOMBRE_ASIGNATURA" type="text" class="form-control" placeholder="Nombre" required>
                                                        <input name="USUARIO_CREA" type="hidden" value="<?=$this->session->userdata('ID_USUARIO')?>">
                                                        <input name="FECHA_CREA" type="hidden" value="<?php echo date('Y/m/d'); ?>">
                                                    </div>
                                                    <?php if($this->session->userdata('ID_TIPO_USUARIO') == 1): ?>
                                                        <div class="form-group">
                                                            <label>Coordinador:</label>
                                                            <select name="COORDINADOR" id="COORDINADOR" class="custom-select" style="font-size: 1rem;" onblur="validaSelect(this);" required>
                                                            </select>
                                                        </div>
                                                    <?php endif; ?>
                                                    <?php if($this->session->userdata('ID_TIPO_USUARIO') == 3): ?>
                                                        <input type="hidden" name="COORDINADOR" value="<?=$this->session->userdata('COORDINADOR')?>">
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="wizard-footer height-wizard">
                                        <div class="pull-right">
                                            <input type="submit" class="btn btn-finish btn-fill btn-form btn-wd btn-sm" name="finish" value="Guardar" />
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>

                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>