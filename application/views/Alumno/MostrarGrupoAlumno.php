            <div class="modal fade" id="InfoGrupoAlumno" aria-hidden="true">
                <div class="modal-dialog  modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color: #094f8b; color: #fff;">
                            <h5 class="modal-title" id="exampleModalLongTitle">Información del grupo</h5>
                            <div id="msg"></div>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"><i class="fas fa-times-circle text-white"></i></span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <br>
                            <div class="row" style="word-break: break-all;">
                                <div class="col-sm-12">
                                    <div id="NOMBRE_PROYECTO" style="width: fit-content; margin: auto;">

                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div id="INTEGRANTES"
                                        style="width: fit-content; margin: auto; margin-top: 30px; margin-bottom: 50px;">
                                    </div>
                                    <form id="agregarGAForm" style="width: 40%; margin: auto;">
                                        <input type="hidden" name="ASIGNATURA_AL" id="ASIGNATURA_AL">
                                        <input type="hidden" name="GRUPO_GA" id="GRUPO_GA">
                                        <button type="button" class="btn btn-success" onclick="agregarAlumnoGA();"
                                            id="agregarAlumnoG" style="width: 100%; margin-bottom: 50px;">
                                            Agregar <i class="fas fa-plus-circle"></i>
                                        </button>
                                        <div id="cont-agregarAlumnoG" style="margin-bottom: 80px;">
                                            <div class="form-group">
                                                <label>Nombre del Grupo:</label>
                                                <input type="text" id="NOMBRE_GRUPO_ALUMNO"
                                                    class="form-control mb-2 mr-sm-2 " readonly>
                                                <label>Alumno:</label>
                                                <select name="ID_ALUMNO_GA[]" id="ALUMNO_GA" title="Selecciona.."
                                                    onblur="validaSelect(this);" data-live-search="true"
                                                    class="bootstrap-select strings show-tick " multiple
                                                    data-width="100%" required>
                                                </select>
                                            </div>
                                            <button type="submit" class="btn btn-success" style="width: 100%;"
                                                id="">Guardar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer" style="background-color: #094f8b;">
                            <div class="btn-sm"></div>
                        </div>
                    </div>
                </div>
            </div>