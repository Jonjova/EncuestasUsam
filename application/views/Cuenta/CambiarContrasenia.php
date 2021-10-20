            <!--Contenido de desarrollo-->
            <div class="container" id="container">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2" id="col-wizard">

                        <!--      Wizard container        -->
                        <div class="wizard-container">

                            <div class="card wizard-card" data-color="blue" id="wizardProfile">
                                <form id="UpdatePass" class="needs-validation">

                                    <div class="wizard-header">
                                        <h3>
                                            <b>CAMBIAR</b> MI CONTRASE&Ntilde;A<br>
                                        </h3>
                                    </div>

                                    <div class="wizard-navigation">
                                        <ul>
                                            <li><a href="#Pass" data-toggle="tab">Mi contrase&ntilde;a</a></li>
                                        </ul>
                                    </div>

                                    <!-- DATOS WIZARD -->
                                    <div class="tab-content" id="tab-content">

                                        <div class="tab-pane" id="Pass">
                                            <div class="row" style="display: block;">
                                                <h4 class="info-text"> Nueva Contrase&ntilde;a </h4>

                                                <div class="col-sm-8 col-sm-offset-2">
                                                    <div class="form-group">
                                                        <label>Contrase&ntilde;a Antigua:</label>
                                                        <input name="OLD_PASSWORD" id="OLD_PASSWORD" type="password"
                                                            class="form-control" placeholder="••••••••••••" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Nueva Contrase&ntilde;a:</label>
                                                        <input name="PASSWORD" id="PASSWORD" type="password"
                                                            class="form-control" placeholder="••••••••••••" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Confirmar Contrase&ntilde;a:</label>
                                                        <input name="RE_PASSWORD" id="RE_PASSWORD" type="password"
                                                            class="form-control" placeholder="••••••••••••" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- FIN DATOS WIZARD -->

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
                        <!-- wizard container -->

                    </div>
                </div>
                <!-- end row -->
            </div>
            <!--aqui termina tu contenido de desarrollo-->