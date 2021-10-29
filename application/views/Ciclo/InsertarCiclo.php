            <div class="container" id="container">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2" id="col-wizard">

                        <div class="wizard-container">

                            <div class="card wizard-card" data-color="blue" id="wizardProfile">
                                <form id="CreateCiclo" class="needs-validation">

                                    <div class="wizard-header">
                                        <h3>
                                            <b>CREAR</b> NUEVO CICLO<br>
                                            <small>Ingrese la informaci&oacute;n que se solicita de la asignatura.</small>
                                        </h3>
                                    </div>

                                    <div class="wizard-navigation">
                                        <ul>
                                            <li><a href="#ciclo" data-toggle="tab">Informaci&oacute;n</a></li>
                                        </ul>
                                    </div>

                                    <div class="tab-content" id="tab-content">

                                        <div class="tab-pane" id="ciclo">
                                            <div class="row" style="display: block;">
                                                <h4 class="info-text"> Datos del ciclo </h4>

                                                <div class="col-sm-8 col-sm-offset-2">
                                                    <div class="form-group">
                                                        <label>Nombre del ciclo:</label>
                                                        <select name="COD_CICLO" id="COD_CICLO"
                                                            class="custom-select" required>
                                                            <option selected disabled value="">Seleccionar...</option>
                                                            <option value="Ciclo Impar <?php echo date('Y')?>">Ciclo Impar <?php echo date('Y')?></option>
                                                            <option value="Ciclo Par <?php echo date('Y')?>">Ciclo Par <?php echo date('Y')?></option>
                                                        </select>
                                                    </div>
                                                    
                                                    <?php if(date('Y-m-d') > date('Y-01-01') && date('Y-m-d') < date('Y-06-30')): ?>
                                                        <div class="form-group">
                                                            <label>Fecha Inicio:</label>
                                                            <input name="FECHA_INICIO" id="FECHA_INICIO" value="<?php echo date('Y-01-10')?>"
                                                                type="date" class="form-control" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Fecha Fin:</label>
                                                            <input name="FECHA_FIN" id="FECHA_FIN" value="<?php echo date('Y-06-25')?>"
                                                                type="date" class="form-control" required>
                                                        </div>
                                                    <?php else: ?>
                                                        <div class="form-group">
                                                            <label>Fecha Inicio:</label>
                                                            <input name="FECHA_INICIO" id="FECHA_INICIO" value="<?php echo date('Y-07-10')?>"
                                                                type="date" class="form-control" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Fecha Fin:</label>
                                                            <input name="FECHA_FIN" id="FECHA_FIN" value="<?php echo date('Y-12-15')?>"
                                                                type="date" class="form-control" required>
                                                        </div>
                                                    <?php endif; ?>
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