        <h2>Usuarios Registrados</h2>
        
        <br>
		
        <form action="">
            <table id="Usuarios" class="table table-hover table-striped dt-responsive nowrap" style="width: 100%; margin: auto;">
                <thead style="background-color: #094f8b; color: #fff; font-size: 17px;">
                    <tr>
                        <th>#</th>
                        <th>Persona Usuario</th>
                        <th>Nombre Usuario</th>
                        <th>Rol</th>
                        <th>Accion</th>
                    </tr>
                </thead>
            </table>
        </form>

        <div class="modal fade" id="InfoUsuario" aria-hidden="true">
            <div class="modal-dialog  modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #094f8b; color: #fff;">
                        <h5 class="modal-title" id="exampleModalLongTitle">Informaci&oacute;n del Usuario</h5>
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
                                <p ID="U_NOMBRES"></p>
                                <label>Apellidos:</label>
                                <p ID="U_APELLIDOS"></p>
                                <label>DUI:</label>
                                <p ID="U_DUI"></p>
                                <label>NIT:</label>
                                <p ID="U_NIT"></p>
                                <label>Direcci&oacute;n:</label>
                                <p ID="U_NOMBRE_DEPARTAMENTO"></p>
                                <p ID="U_DIRECCION"></p>
                            </div>
                            <div class="col-sm-5">
                                <label>Tel&eacute;fono Fijo:</label>
                                <p ID="U_TELEFONO_FIJO"></p>
                                <label>Tel&eacute;fono M&oacute;vil:</label>
                                <p ID="U_TELEFONO_MOVIL"></p>
                                <label>Correo Institucional:</label>
                                <p ID="U_CORREO_INSTITUCIONAL"></p>
                                <label>Correo Personal:</label>
                                <p ID="U_CORREO_PERSONAL"></p>
                                <label>Nombre Usuario:</label>
                                <p ID="U_NOMBRE_USUARIO"></p>
                                <label>Estado:</label>
                                <p ID="U_ESTADO"></p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" style="background-color: #094f8b;">
                        <div class="btn-sm"></div>
                    </div>
                </div>
            </div>
        </div>