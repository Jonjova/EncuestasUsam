            <div class="modal fade" id="modalGrupo" aria-hidden="true">
                <div class="modal-dialog  modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color: #094f8b; color: #fff;">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"><i class="fas fa-times-circle text-white"></i></span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="col-sm-12">
                                
                                <br><br>
                                
                                <h3 style="text-align: center;">
                                    <b>CREAR</b> NUEVO GRUPO<br>
                                    <small>Ingrese la informaci&oacute;n que se solicita del
                                                        grupo.</small>
                                </h3>
                                <form id="CreateGrupo" class="needs-validation">

                                    <input type="hidden" name="ID_ASIGNATURA_G" id="ID_ASIGNATURA_G">
                                    <input type="hidden" name="CICLO_G" id="CICLO_G">

                                    <br><br>

                                    <div class="col-sm-8 col-sm-offset-2">
                                        <div class="form-group">
                                            <label>Nombre del grupo:</label>
                                            <input type="text" placeholder="Ingrese nombre del grupo" id="NOMBRE_GRUPO"
                                                name="NOMBRE_GRUPO" class="form-control" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Alumnos:</label>
                                            <select name="ID_ALUMNO_GA[]" id="ID_ALUMNO_GA" title="Selecciona..."
                                                onblur="validaSelect(this);" data-live-search="true"
                                                class="bootstrap-select strings show-tick" multiple data-width="100%"
                                                required>
                                            </select>
                                        </div>
                                    </div>

                                    <br><br>

                                    <div class="pull-right">
                                        <input type="submit" class="btn btn-finish btn-fill btn-form btn-wd btn-sm"
                                            name="finish" value="GUARDAR" />
                                    </div>

                                    <br><br>

                                </form>
                            </div>
                        </div>
                        <div class="modal-footer" style="background-color: #094f8b;">
                            <div class="btn-sm"></div>
                        </div>
                    </div>
                </div>
            </div>