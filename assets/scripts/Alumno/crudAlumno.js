// RESETEAR MODAL
$('#modalAlumno').on('hidden.bs.modal', function() {
    $(this).find('.nav-pills a:first').tab('show');
    if ($(document).width() <= 992) {
        $('#createUpdateAlumno .moving-tab').css('width', '100%');
    } else {
        $('#createUpdateAlumno .moving-tab').css('width', '25%');
    }
});

/****************************************************************************
                        WIZARD INSERTAR ALUMNO
****************************************************************************/
var wizardCreateAlumno =
    `
        <div class="tab-pane active" id="datosPersonales">
            <div class="row" style="display: block;">
                <h4 class="info-text"> Informaci&oacute;n b&aacute;sica</h4>
                <div class="col-sm-4 col-sm-offset-1" id="logo_USAM" style="margin-top: 30px;">
                    <div class="picture-container">
                        <img src="` + url + `assets/img/logo_USAM.png"
                            class="picture-src" title="" />
                    </div>
                </div>

                <br>

                <div class="col-sm-6" id="col_persona">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Carnet:</label>
                            <input name="CARNET" id="CARNET" onchange="datosCarnet(this.value);"
                                class="form-control" type="text"
                                placeholder="Ingrese Carnet" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Primer Nombre:</label>
                            <input name="PRIMER_NOMBRE_PERSONA"
                                id="PRIMER_NOMBRE_PERSONA" type="text"
                                class="form-control" placeholder="1er Nombre"
                                required>
                        </div>

                        <div class="form-group">
                            <label>Segundo Nombre:</label>
                            <input name="SEGUNDO_NOMBRE_PERSONA"
                                id="SEGUNDO_NOMBRE_PERSONA" type="text"
                                class="form-control" placeholder="2do Nombre">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Primer Apellido:</label>
                            <input name="PRIMER_APELLIDO_PERSONA"
                                id="PRIMER_APELLIDO_PERSONA" type="text"
                                class="form-control" placeholder="1er Apellido"
                                required>
                        </div>
                        <div class="form-group">
                            <label>Segundo Apellido:</label>
                            <input name="SEGUNDO_APELLIDO_PERSONA"
                                id="SEGUNDO_APELLIDO_PERSONA" type="text"
                                class="form-control" placeholder="2do Apellido">
                        </div>
                    </div>
                </div>

                <div class="col-sm-10 col-sm-offset-1">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Fecha de Nacimiento:</label>
                            <input name="FECHA_NACIMIENTO" id="FECHA_NACIMIENTO"
                                type="date" class="form-control" required>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Sexo:</label>
                            <select name="SEXO" id="SEXO" class="custom-select"
                                style="font-size: 1rem;"
                                onblur="validaSelect(this);" required>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-pane" id="contacto">

            <div class="row">
                <div class="col-sm-12">
                    <h4 class="info-text"> Informaci&oacute;n de Contacto </h4>
                </div>

                <br>
                <br>
                <br>
                <br>

                <div class="col-sm-7 col-sm-offset-1">
                    <div class="form-group">
                        <div class="form-group">
                            <label>Correo Personal(No Obligatorio):</label>
                            <input name="CORREO_PERSONAL" id="CORREO_PERSONAL"
                                type="text" class="form-control"
                                placeholder="personal@mail.com">
                        </div>
                    </div>
                </div>

                <div class="col-sm-5 col-sm-offset-1">
                    <div class="form-group">
                        <label>N&uacute;mero de Tel&eacute;fono Fijo:</label>
                        <input name="TELEFONO_FIJO" id="TELEFONO_FIJO"
                            type="tel" class="form-control"
                            placeholder="0000-0000" required>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="form-group">
                        <label>N&uacute;mero de Tel&eacute;fono
                            M&oacute;vil:</label>
                        <input name="TELEFONO_MOVIL" id="TELEFONO_MOVIL"
                            type="tel" class="form-control"
                            placeholder="0000-0000" required>
                    </div>
                </div>
            </div>

        </div>

        <div class="tab-pane" id="direccion">
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="info-text"> Informaci&oacute;n de la
                        direcci&oacute;n
                    </h4>
                </div>

                <br>
                <br>
                <br>
                <br>

                <div class="col-sm-7 col-sm-offset-2">
                    <div class="form-group">
                        <label>Departamento:</label>
                        <select name="DEPARTAMENTO" id="DEPARTAMENTO"
                            class="custom-select" style="font-size: 1rem;"
                            onblur="validaSelect(this);" required>
                        </select>
                    </div>
                </div>
                <div class="col-sm-7 col-sm-offset-2">
                    <div class="form-group">
                        <label>Direcci&oacute;n:</label>
                        <textarea name="DIRECCION" id="DIRECCION" rows="5"
                            cols="50" class="form-control" required></textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-pane" id="institucional">
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="info-text"> Informaci&oacute;n institucional
                    </h4>
                </div>

                <br>
                <br>
                <br>
                <br>

                <div class="col-sm-7 col-sm-offset-1">
                    <div class="form-group">
                        <label>Carrera:</label>
                        <select name="CARRERA" id="CARRERA"
                            class="custom-select required"
                            onblur="validaSelect(this);"
                            style="font-size: 1rem;" required>
                        </select>
                    </div>
                </div>
                <div class="col-sm-7 col-sm-offset-1">
                    <div class="form-group">
                        <label>Correo Institucional:</label>
                        <input name="CORREO_INSTITUCIONAL"
                            id="CORREO_INSTITUCIONAL" type="text"
                            class="form-control"
                            placeholder="docente@liveusam.edu.sv" required>
                    </div>
                </div>
            </div>
        </div>
    `,
    btnCreateAlumno =
    `
        <input type="submit" class="btn btn-finish btn-fill btn-form btn-wd btn-sm" 
            name="finish" value="guardar" id="btnCreateAlumno" />
    `;

/****************************************************************************
                        WIZARD ACTUALIZAR ALUMNO
****************************************************************************/
var wizardUpdateAlumno =
    `
        <div class="tab-pane active" id="datosPersonales">
            <div class="row" style="display: block;">
                <h4 class="info-text"> Informaci&oacute;n b&aacute;sica</h4>
                <div class="col-sm-4 col-sm-offset-1" id="logo_USAM" style="margin-top: 30px;">
                    <div class="picture-container">
                        <img src="` + url + `assets/img/logo_USAM.png"
                            class="picture-src" title="" />
                    </div>
                </div>

                <br>

                <div class="col-sm-6" id="col_persona">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Carnet:</label>
                            <input type="text" name="CARNET_UPDATE"
                                id="CARNET_UPDATE" class="form-control"
                                placeholder="Ingrese Carnet" required>

                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Primer Nombre:</label>
                            <input name="PRIMER_NOMBRE_PERSONA"
                                id="PRIMER_NOMBRE_PERSONA_UPDATE" type="text"
                                class="form-control" placeholder="1er Nombre"
                                required>
                        </div>

                        <div class="form-group">
                            <label>Segundo Nombre:</label>
                            <input name="SEGUNDO_NOMBRE_PERSONA"
                                id="SEGUNDO_NOMBRE_PERSONA_UPDATE" type="text"
                                class="form-control" placeholder="2do Nombre">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Primer Apellido:</label>
                            <input name="PRIMER_APELLIDO_PERSONA"
                                id="PRIMER_APELLIDO_PERSONA_UPDATE" type="text"
                                class="form-control" placeholder="1er Apellido"
                                required>
                        </div>
                        <div class="form-group">
                            <label>Segundo Apellido:</label>
                            <input name="SEGUNDO_APELLIDO_PERSONA"
                                id="SEGUNDO_APELLIDO_PERSONA_UPDATE" type="text"
                                class="form-control" placeholder="2do Apellido">
                        </div>
                    </div>
                </div>

                <div class="col-sm-10 col-sm-offset-1">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Fecha de Nacimiento:</label>
                            <input name="FECHA_NACIMIENTO"
                                id="FECHA_NACIMIENTO_UPDATE" type="date"
                                class="form-control" required>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Sexo:</label>
                            <select name="SEXO" id="SEXO_UPDATE"
                                class="custom-select" style="font-size: 1rem;"
                                onblur="validaSelect(this);" required>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-pane" id="contacto">

            <div class="row">
                <div class="col-sm-12">
                    <h4 class="info-text"> Informaci&oacute;n de Contacto </h4>
                </div>

                <br>
                <br>
                <br>
                <br>

                <div class="col-sm-7 col-sm-offset-1">
                    <div class="form-group">
                        <div class="form-group">
                            <label>Correo Personal(No Obligatorio):</label>
                            <input name="CORREO_PERSONAL_UPDATE"
                                id="CORREO_PERSONAL_UPDATE" type="text"
                                class="form-control"
                                placeholder="personal@mail.com">
                        </div>
                    </div>
                </div>

                <div class="col-sm-5 col-sm-offset-1">
                    <div class="form-group">
                        <label>N&uacute;mero de Tel&eacute;fono Fijo:</label>
                        <input name="TELEFONO_FIJO_UPDATE" id="TELEFONO_FIJO_UPDATE"
                            type="tel" class="form-control"
                            placeholder="0000-0000" required>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="form-group">
                        <label>N&uacute;mero de Tel&eacute;fono
                            M&oacute;vil:</label>
                        <input name="TELEFONO_MOVIL_UPDATE" id="TELEFONO_MOVIL_UPDATE"
                            type="tel" class="form-control"
                            placeholder="0000-0000" required>
                    </div>
                </div>
            </div>

        </div>

        <div class="tab-pane" id="direccion">
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="info-text"> Informaci&oacute;n de la
                        direcci&oacute;n
                    </h4>
                </div>

                <br>
                <br>
                <br>
                <br>

                <div class="col-sm-7 col-sm-offset-2">
                    <div class="form-group">
                        <label>Departamento:</label>
                        <select name="DEPARTAMENTO" id="DEPARTAMENTO_UPDATE"
                            class="custom-select" style="font-size: 1rem;"
                            onblur="validaSelect(this);" required>
                        </select>
                    </div>
                </div>
                <div class="col-sm-7 col-sm-offset-2">
                    <div class="form-group">
                        <label>Direcci&oacute;n:</label>
                        <textarea name="DIRECCION" id="DIRECCION_UPDATE"
                            rows="5" cols="50" class="form-control"
                            required></textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-pane" id="institucional">
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="info-text"> Informaci&oacute;n institucional
                    </h4>
                </div>

                <br>
                <br>
                <br>
                <br>

                <div class="col-sm-7 col-sm-offset-1">
                    <div class="form-group">
                        <label>Carrera:</label>
                        <select name="CARRERA" id="CARRERA_UPDATE"
                            class="custom-select required"
                            onblur="validaSelect(this);"
                            style="font-size: 1rem;" required>
                        </select>
                    </div>
                </div>
                <div class="col-sm-7 col-sm-offset-1">
                    <div class="form-group">
                        <label>Correo Institucional:</label>
                        <input name="CORREO_INSTITUCIONAL_UPDATE"
                            id="CORREO_INSTITUCIONAL_UPDATE" type="text"
                            class="form-control"
                            placeholder="docente@liveusam.edu.sv" required>
                    </div>
                </div>
            </div>
        </div>
    `,
    btnUpdateAlumno =
    `
        <input type="submit" class="btn btn-finish btn-fill btn-form btn-wd btn-sm" 
            name="finish" value="actualizar" id="btnUpdateAlumno" />
    `;

// CONFIG MODAL
$('#btnAlumno').click(function() {
    $('#modalAlumno #tab-content').html(wizardCreateAlumno);
    $('#btnCreateUpdateAlumno').html(btnCreateAlumno);
    $('#titleCreateAlumno').show();
    $('#titleUpdateAlumno').hide();
    $('#confirmUpdate').hide();
    llenarDropdowns();
    mascarasYformatos();
});

// CARGAR DATOS DEL CARNET EXISTENTE
var carnet = null;

function datosCarnet(value) {
    $.ajax({
        type: 'POST',
        url: url + 'ValidarCampos/obtenerInfoAlumno',
        dataType: 'json',
        data: { 'CARNET': value },
        success: function(msg) {
            if (msg != null && value != '') {
                $('#confirmUpdate').fadeIn();
                $('#btnCreateAlumno').attr('disabled', 'true');
                $('#createUpdateAlumno .form-control').attr('disabled', 'true');
                $('#createUpdateAlumno .custom-select').attr('disabled', 'true');
                $('#createUpdateAlumno .form-control').removeClass('is-valid is-invalid');
                $('#createUpdateAlumno .custom-select').removeClass('is-valid is-invalid');
                // VER DATOS
                $('#createUpdateAlumno #PRIMER_NOMBRE_PERSONA').val(msg.PRIMER_NOMBRE_PERSONA);
                $('#createUpdateAlumno #SEGUNDO_NOMBRE_PERSONA').val(msg.SEGUNDO_NOMBRE_PERSONA);
                $('#createUpdateAlumno #PRIMER_APELLIDO_PERSONA').val(msg.PRIMER_APELLIDO_PERSONA);
                $('#createUpdateAlumno #SEGUNDO_APELLIDO_PERSONA').val(msg.SEGUNDO_APELLIDO_PERSONA);
                $('#createUpdateAlumno #FECHA_NACIMIENTO').val(msg.FECHA_NACIMIENTO);
                $('#createUpdateAlumno #SEXO').val(msg.SEXO);
                $('#createUpdateAlumno #CORREO_PERSONAL').val(msg.CORREO_PERSONAL);
                $('#createUpdateAlumno #TELEFONO_FIJO').val(msg.TELEFONO_FIJO);
                $('#createUpdateAlumno #TELEFONO_MOVIL').val(msg.TELEFONO_MOVIL);
                $('#createUpdateAlumno #DEPARTAMENTO').val(msg.DEPARTAMENTO);
                $('#createUpdateAlumno #DIRECCION').val(msg.DIRECCION);
                $('#createUpdateAlumno #CARRERA').val(msg.CARRERA);
                $('#createUpdateAlumno #CORREO_INSTITUCIONAL').val(msg.CORREO_INSTITUCIONAL);
            }
        }
    });
    carnet = $('#CARNET').val();
}

/****************************************************************************
                            INSERTAR ALUMNO
****************************************************************************/
$('#createUpdateAlumno').delegate('#btnCreateAlumno', 'click', function() {
    if (!$('#createUpdateAlumno').valid()) {
        Swal.fire({
            icon: 'error',
            allowEscapeKey: false,
            allowOutsideClick: false,
            confirmButtonColor: "#343a40",
            text: 'Campos vac\u00edos o inv\u00e1lidos!',
            title: '<p style="color: #343a40; font-size: 1.072em; font-weight: 600; line-height: unset; margin: 0;">Error de inserci\u00f3n</p>'
        });
    } else {
        $.ajax({
            url: url + 'Alumno/Guardar',
            data: $('#createUpdateAlumno').serialize(),
            type: 'POST',
            async: false,
            dataType: 'json',
            success: function() {
                Swal.fire({
                    toast: true,
                    timer: 1500,
                    icon: 'success',
                    position: 'top-end',
                    iconColor: '#3ca230',
                    showConfirmButton: false,
                    title: '<p style="color: #343a40; font-size: 1.49em; font-weight: 600; line-height: unset; margin: 0;">Datos guardados!</p>'
                });
                infoAlumnosLimpiar();
            },
            error: function(response) {
                console.log(response);
            }
        });
    }
});

// LIMPIAR INPUTS
function infoAlumnosLimpiar() {
    $('#confirmUpdate').hide();
    $('#modalAlumno').find('.nav-pills a:first').tab('show');
    $('#createUpdateAlumno .btn-finish').removeAttr('disabled');
    $('#createUpdateAlumno .form-control').removeAttr('disabled');
    $('#createUpdateAlumno .custom-select').removeAttr('disabled');
    $('#createUpdateAlumno .form-control').removeClass('is-valid is-invalid');
    $('#createUpdateAlumno .custom-select').removeClass('is-valid is-invalid');
    $('#createUpdateAlumno')[0].reset();
}

// CANCELAR ACTUALIZAR
$('#btnCancelUpdate').click(function() {
    infoAlumnosLimpiar();
});

// CARGAR DATOS DEL CARNET EXISTENTE PARA ACTUALIZAR
function obtenerAlumno() {
    $.ajax({
        type: 'POST',
        url: url + 'ValidarCampos/obtenerInfoAlumno',
        dataType: 'json',
        data: { 'CARNET': carnet },
        success: function(msg) {
            // ACTUALIZAR DATOS
            $('#createUpdateAlumno #ID_PERSONA_UPDATE').val(msg.ID_PERSONA);
            $('#createUpdateAlumno #ID_ALUMNO_UPDATE').val(msg.ID_ALUMNO);
            $('#createUpdateAlumno #CARNET_UPDATE').val(msg.CARNET);
            $('#createUpdateAlumno #PRIMER_NOMBRE_PERSONA_UPDATE').val(msg.PRIMER_NOMBRE_PERSONA);
            $('#createUpdateAlumno #SEGUNDO_NOMBRE_PERSONA_UPDATE').val(msg.SEGUNDO_NOMBRE_PERSONA);
            $('#createUpdateAlumno #PRIMER_APELLIDO_PERSONA_UPDATE').val(msg.PRIMER_APELLIDO_PERSONA);
            $('#createUpdateAlumno #SEGUNDO_APELLIDO_PERSONA_UPDATE').val(msg.SEGUNDO_APELLIDO_PERSONA);
            $('#createUpdateAlumno #FECHA_NACIMIENTO_UPDATE').val(msg.FECHA_NACIMIENTO);
            $('#createUpdateAlumno #SEXO_UPDATE').val(msg.SEXO);
            $('#createUpdateAlumno #CORREO_PERSONAL_UPDATE').val(msg.CORREO_PERSONAL);
            $('#createUpdateAlumno #TELEFONO_FIJO_UPDATE').val(msg.TELEFONO_FIJO);
            $('#createUpdateAlumno #TELEFONO_MOVIL_UPDATE').val(msg.TELEFONO_MOVIL);
            $('#createUpdateAlumno #DEPARTAMENTO_UPDATE').val(msg.DEPARTAMENTO);
            $('#createUpdateAlumno #DIRECCION_UPDATE').val(msg.DIRECCION);
            $('#createUpdateAlumno #CARRERA_UPDATE').val(2);
            console.log(msg.CARRERA);
            $('#createUpdateAlumno #CORREO_INSTITUCIONAL_UPDATE').val(msg.CORREO_INSTITUCIONAL);
        }
    });
}

// ACEPTAR ACTUALIZAR
$('#btnAceptUpdate').click(function() {
    $('#modalAlumno').find('.nav-pills a:first').tab('show');
    $('#modalAlumno #tab-content').html(wizardUpdateAlumno);
    $('#btnCreateUpdateAlumno').html(btnUpdateAlumno);
    $('#titleUpdateAlumno').show();
    $('#titleCreateAlumno').hide();
    $('#confirmUpdate').hide();
    llenarDropdowns();
    mascarasYformatos();
    obtenerAlumno();
});

/****************************************************************************
                            ACTUALIZAR ALUMNO
****************************************************************************/
$('#createUpdateAlumno').delegate('#btnUpdateAlumno', 'click', function() {
    if (!$($('#createUpdateAlumno')).valid()) {
        Swal.fire({
            icon: 'error',
            allowEscapeKey: false,
            allowOutsideClick: false,
            confirmButtonColor: "#343a40",
            text: 'Campos vac\u00edos o inv\u00e1lidos!',
            title: '<p style="color: #343a40; font-size: 1.072em; font-weight: 600; line-height: unset; margin: 0;">Error de inserci\u00f3n</p>'
        });
    } else {
        $.ajax({
            url: url + 'Alumno/Actualizar',
            data: $($('#createUpdateAlumno')).serialize(),
            type: 'POST',
            async: false,
            dataType: 'json',
            success: function() {
                $('#modalAlumno').modal('hide');
                Swal.fire({
                    toast: true,
                    timer: 1500,
                    icon: 'success',
                    position: 'top-end',
                    iconColor: '#3ca230',
                    showConfirmButton: false,
                    title: '<p style="color: #343a40; font-size: 1.3526em; font-weight: 600; line-height: unset; margin: 0;">Datos actualizados!</p>'
                });
            },
            error: function(response) {
                console.log(response);
            }
        });
    }
});