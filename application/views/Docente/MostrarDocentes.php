        <h2>Docentes Registrados</h2>
        
        <br>
		
        <form action="">
            <table id="Docentes" class="table table-hover table-striped dt-responsive nowrap" style="width: 100%; margin: auto;">
                <thead style="background-color: #094f8b; color: #fff; font-size: 17px;">
                    <tr>
                        <th>#</th>
                        <th>Docente</th>
                        <th>Usuario</th>
                        <th>Tel&eacute;fono M&oacute;vil</th>
                        <?php if($this->session->userdata('ID_TIPO_USUARIO') == 1): ?>
                            <th>Responsable</th>
                        <?php endif; ?>
                        <th>Acciones</th>
                    </tr>
                </thead>
            </table>
        </form>

        <div class="modal fade" id="InfoDocente" aria-hidden="true">
            <div class="modal-dialog  modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #094f8b; color: #fff;">
                        <h5 class="modal-title" id="exampleModalLongTitle">Informaci&oacute;n del Docente</h5>
                        <div id="msg"></div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times-circle text-white"></i></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <br>
                        <div class="row" style="word-break: break-all;">
                            <div class="col-sm-5 col-sm-offset-1">
                                <label>Nombres:</label>
                                <p id="DO_NOMBRES"></p>
                                <label>Apellidos:</label>
                                <p id="DO_APELLIDOS"></p>
                                <label>DUI:</label>
                                <p id="DO_DUI"></p>
                                <label>NIT:</label>
                                <p id="DO_NIT"></p>
                                <label>Tel&eacute;fono Fijo:</label>
                                <p id="DO_TELEFONO_FIJO"></p>
                                <label>Tel&eacute;fono M&oacute;vil:</label>
                                <p id="DO_TELEFONO_MOVIL"></p>
                                <label>Direcci&oacute;n:</label>
                                <p id="DO_NOMBRE_DEPARTAMENTO"></p>
                                <p id="DO_DIRECCION"></p>
                            </div>
                            <div class="col-sm-5">
                                <label>Profesi&oacute;n:</label>
                                <p id="DO_PROFESION"></p>
                                <label>Correo Institucional:</label>
                                <p id="DO_CORREO_INSTITUCIONAL"></p>
                                <label>Correo Personal:</label>
                                <p id="DO_CORREO_PERSONAL"></p>
                                <?php if($this->session->userdata('ID_TIPO_USUARIO') == 1): ?>
                                    <label>Responsable:</label>
                                    <p id="DO_RESPONSABLE"></p>
                                <?php endif; ?>
                                <label>Nombre Usuario:</label>
                                <p id="DO_NOMBRE_USUARIO"></p>
                                <label>Estado:</label>
                                <p id="DO_ESTADO"></p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" style="background-color: #094f8b;">
                        <div class="btn-sm"></div>
                    </div>
                </div>
            </div>
        </div>