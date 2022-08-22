            <div class="modal fade" id="InfoGrupoAlumno" aria-hidden="true">
                <div class="modal-dialog  modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color: #094f8b; color: #fff;">
                            <h5 class="modal-title" id="exampleModalLongTitle">Informaci&oacute;n del grupo</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"><i class="fas fa-times-circle text-white"></i></span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <br>
                            <div class="row" style="word-break: break-all;">
                                <div class="col-sm-12">
                                    <div id="NOMBRE_PROYECTO"
                                        style="text-align: center; width: fit-content; margin: auto; margin-top: 30px;">
                                    </div>
                                    <div id="NOMBRE_GRUPO_ALUMNO"
                                        style="text-align: center; width: fit-content; margin: 20px auto 0px auto;">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                <div class="container"id="infointegrantes">
                                    <div class="body_content">
                                    <div id="INTEGRANTES"
                                        style="width: fit-content; margin: auto; margin-top: 30px; margin-bottom: 50px;">
                                    </div>
                                    </div>
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
                                                <label>Alumno:</label>
                                                <select name="ID_ALUMNO_GA[]" id="ALUMNO_GA" title="Selecciona.."
                                                    onblur="validaSelect(this);" data-live-search="true"
                                                    class="bootstrap-select strings show-tick" multiple
                                                    data-width="100%" required>
                                                </select>
                                            </div>
                                            <button type="submit" class="btn btn-success"
                                                style="width: 100%;" >Guardar</button>
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


            <style>
                .body_content {
                position: relative;
                margin-top: 10px;
                padding: 5px;
                max-height: 150px;
                left: 0px;
                margin-left: 100px;
                margin-right: 100px;
                margin-bottom: 10px;
                
                }
            </style>