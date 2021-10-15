        <h2>Coordinadores Registrados</h2>

        <br>
		
        <form action="">
            <table id="Coordinadores" class="table table-hover table-striped dt-responsive nowrap" style="width: 100%; margin: auto;">
                <thead style="background-color: #094f8b; color: #fff; font-size: 17px;">
                    <tr>
                        <th>#</th>
                        <th>Coordinador</th>
                        <th>Usuario</th>
                        <th>Tel&eacute;fono M&oacute;vil</th>
                        <th>Info</th>
                    </tr>
                </thead>
            </table>
        </form>

        <div class="modal fade" id="InfoCoordinador" aria-hidden="true">
            <div class="modal-dialog  modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #094f8b; color: #fff;">
                        <h5 class="modal-title" id="exampleModalLongTitle">Informaci&oacute;n del Coordinador</h5>
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
                                <p id="CO_NOMBRES"></p>
                                <label>Apellidos:</label>
                                <p id="CO_APELLIDOS"></p>
                                <label>Profesi&oacute;n:</label>
                                <p id="CO_PROFESION"></p>
                                <label>Tel&eacute;fono Fijo:</label>
                                <p id="CO_TELEFONO_FIJO"></p>
                                <label>Tel&eacute;fono M&oacute;vil:</label>
                                <p id="CO_TELEFONO_MOVIL"></p>
                                <label>Direcci&oacute;n:</label>
                                <p id="CO_NOMBRE_DEPARTAMENTO"></p>
                                <p id="CO_DIRECCION"></p>
                            </div>
                            <div class="col-sm-5">
                                
                                <label>Correo Institucional:</label>
                                <p id="CO_CORREO_INSTITUCIONAL"></p>
                                <label>Correo Personal:</label>
                                <p id="CO_CORREO_PERSONAL"></p>
                                <label>DUI:</label>
                                <p id="CO_DUI"></p>
                                <label>NIT:</label>
                                <p id="CO_NIT"></p>
                                <label>Coordinaci&oacute;n:</label>
                                <p id="CO_COORDINACION"></p>
                                <label>Nombre Usuario:</label>
                                <p id="CO_NOMBRE_USUARIO"></p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" style="background-color: #094f8b;">
                        <div class="btn-sm"></div>
                    </div>
                </div>
            </div>
        </div>