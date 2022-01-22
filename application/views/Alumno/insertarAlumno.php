<style type="text/css">
.not-active {
    pointer-events: none;
    cursor: none;
}

.d {
    pointer-events: none;
    cursor: none;
}
</style>
<!--Aquí comienza el modal de nuevo de Alumno -->
<form id="crearAlumno" class="needs-validation">
    <div class="modal fade" id="modalAlumno" data-backdrop="static" aria-hidden="true" oncontextmenu="return false">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Nuevo Estudiante</h5>
                    <!-- <div class="meter" style="left: 120px;">
                        <div id="percentage"></div>
                    </div>-->
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                 <input  type="hidden" name="ID_PERSONA" id="ID_PERSONA">
                <input type="hidden" name="ID_ALUMNO" id="ID_ALUMNO">
                    <nav>
                        <ul class="nav nav-tabs" id="myTab" role="tablist" style="font-size: 13px;">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                    aria-controls="home" aria-selected="true">Personal</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                    aria-controls="profile" aria-selected="false">Contacto</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                                    aria-controls="contact" aria-selected="false">Residencia</a>
                            </li>
                        </ul>
                    </nav><br>
                    <div class="tab-content" id="myTabContent">
                        <!--Información de Personal-->
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Carnet</label>
                                    <input type="text" placeholder="Ingrese Carnet" id="CARNET" name="CARNET"
                                        class="form-control mb-2 mr-sm-2 required" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Primer Nombre</label>
                                    <input name="PRIMER_NOMBRE_PERSONA" id="PRIMER_NOMBRE_PERSONA" type="text"
                                        class="form-control required" placeholder="1er Nombre" required>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Segundo Nombre</label>
                                    <input name="SEGUNDO_NOMBRE_PERSONA" id="SEGUNDO_NOMBRE_PERSONA" type="text"
                                        class="form-control" placeholder="2do Nombre">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Primer Apellido</label>
                                    <input name="PRIMER_APELLIDO_PERSONA" id="PRIMER_APELLIDO_PERSONA" type="text"
                                        class="form-control required" placeholder="1er Apellido" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Segundo Apellido</label>
                                    <input name="SEGUNDO_APELLIDO_PERSONA" id="SEGUNDO_APELLIDO_PERSONA" type="text"
                                        class="form-control" placeholder="2do Apellido">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Sexo</label>
                                    <select name="SEXO" id="SEXO" class="custom-select required"
                                        onblur="validaSelect(this);" style="font-size: 1rem;" required>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Fecha de nacimiento</label>
                                    <input name="FECHA_NACIMIENTO_A" id="FECHA_NACIMIENTO_A" type="date"
                                        class="form-control required" required>
                                </div>
                            </div>
                            <!--Aquí termina la Información de Personal-->
                        </div>
                        <!--Información de Contacto-->
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Correo Personal</label>
                                    <input name="CORREO_PERSONAL" id="CORREO_PERSONAL" type="email"
                                        class="form-control required" placeholder="personal@mail.com">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Correo Institucional</label>
                                    <input name="CORREO_INSTITUCIONAL" id="CORREO_INSTITUCIONAL" type="text"
                                        class="form-control required" placeholder="eje: estudiante@liveusam.edu.sv"
                                        required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>N&uacute;mero de Tel&eacute;fono Fijo</label>
                                    <input name="TELEFONO_FIJO" id="TELEFONO_FIJO" type="tel"
                                        class="form-control required" placeholder="Telefono Fijo" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>N&uacute;mero de Tel&eacute;fono Movil</label>
                                    <input name="TELEFONO_MOVIL" id="TELEFONO_MOVIL" type="tel"
                                        class="form-control required" placeholder="Telefono Movil" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Carrera</label>
                                    <select name="CARRERA" id="CARRERA" class="custom-select required"
                                        onblur="validaSelect(this);" style="font-size: 1rem;" required>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!--Aquí termina la Información de Contacto-->
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            <!--Información de Residencia-->
                            <div class="form-row ">
                                <div class="form-group col-md-8 offset-md-2">
                                    <label>Departamento</label>
                                    <select name="DEPARTAMENTO" id="DEPARTAMENTO" class="custom-select required"
                                        onblur="validaSelect(this);" style="font-size: 1rem;" required>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-8 offset-md-2">
                                    <label>Direcci&oacute;n</label>
                                    <textarea name="DIRECCION" id="DIRECCION" rows="5" cols="50"
                                        class="form-control required" required></textarea>
                                </div>
                            </div>

                            <!--Aquí termina la Información de Residencia-->
                        </div>
                    </div>
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary pull-left btn-sm" onclick="limpiar()"
                        id="cancelBtnId" data-dismiss="modal">Cerrar</button>
                    <button type="submit" id="addAlumno" class="btn btn-success btn-sm toggle-disabled" disabled>Guardar</button>
                     <button type="submit" id="editAlumno" class="btn btn-primary btn-sm " style="display: none;" >Actualizar</button>
                </div>
            </div>
        </div>
    </div>

</form>

<!--Aquí termina el modal de Alumno -->