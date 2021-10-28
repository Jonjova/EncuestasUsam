/****************************************************************************
                            CARGAR METODOS
****************************************************************************/
$(document).ready(function() {

    // MASCARAS DE CAMPOS
    $("[name='CARNET']").mask('999999');
    $("[name='DUI']").mask('99999999-9');
    $("[name='NIT']").mask('9999-999999-999-9');
    $("[name='TELEFONO_FIJO']").mask('9999-9999');
    $("[name='TELEFONO_MOVIL']").mask('9999-9999');

    // DROPDOWNS
    llenarDropdowns();
});

/****************************************************************************
                            CARGAR DROPDOWNS
****************************************************************************/
function llenarDropdowns() {
    // nomCiclo();
    sexo();
    departamento();
    profesion();
    rol();
    coordinacion();
    coordinador();
    asignatura();
    // docente();

    obtTipoInvestiga();
    obtDiseInvestiga();
    obtCicl();
    obtCarrera();
    obtGrupoAlumn();
}

function validaSelect(select) {
    if (select.value < 1) {
        select.classList.remove('is-valid');
        select.classList.add('is-invalid');
    } else {
        select.classList.remove('is-invalid');
        select.classList.add('is-valid');
    }
}

/****************************************************************************
                            LLENAR DROPDOWNS
****************************************************************************/
// LLENAR SELECT SEXO
function sexo() {
    $.ajax({
        url: url + 'DatosComunes/dropSexo',
        type: 'POST',
        success: function(respuesta) {
            $("[name='SEXO']").html(respuesta);
        }
    })
}

// LLENAR SELECT DEPARTAMENTO
function departamento() {
    $.ajax({
        url: url + 'DatosComunes/dropDepartamento',
        type: 'POST',
        success: function(respuesta) {
            $("[name='DEPARTAMENTO']").html(respuesta);
        }
    })
}

// LLENAR SELECT PROFESION
function profesion() {
    $.ajax({
        url: url + 'DatosComunes/dropProfesion',
        type: 'POST',
        success: function(respuesta) {
            $("[name='PROFESION']").html(respuesta);
        }
    })
}

// LLENAR SELECT ROL
function rol() {
    $.ajax({
        url: url + 'DatosComunes/dropRol',
        type: 'POST',
        success: function(respuesta) {
            $("[name='ID_TIPO_USUARIO']").html(respuesta);
        }
    })
}

// LLENAR SELECT COORDINACIÓN
function coordinacion() {
    $.ajax({
        url: url + 'DatosComunes/dropCoordinacion',
        type: 'POST',
        success: function(respuesta) {
            $("[name='COORDINACION']").html(respuesta);
        }
    })
}

// LLENAR SELECT COORDINADOR
function coordinador() {
    $.ajax({
        url: url + 'DatosComunes/dropCoordinador',
        type: 'POST',
        success: function(respuesta) {
            $("[name='COORDINADOR']").html(respuesta);
        }
    })
}

// LLENAR SELECT ASIGNATURA
function asignatura() {
    $.ajax({
        url: url + 'DatosComunes/dropAsignatura',
        type: 'POST',
        success: function(respuesta) {
            $("[name='ID_ASIGNATURA']").html(respuesta);
        }
    })
}

function valDocenteAsignatura(valor) {
    console.log(valor)
}

// LLENAR SELECT DOCENTE
function docente(asignatura) {
    $.ajax({
        url: url + 'DatosComunes/dropDocente/' + asignatura,
        type: 'POST',
        success: function(respuesta) {
            $("[name='ID_DOCENTE']").html(respuesta);
        }
    })
}

// LLENAR SELECT TIPO INVESTIGACION
function obtTipoInvestiga() {
    $.ajax({
        url: url + "DatosComunes/obtTipoInvestigacion",
        type: 'post',
        success: function(respuesta) {
            $("[name='ID_TIPO_INVESTIGACION']").html(respuesta);
        }
    })
}

// LLENAR SELECT DISENIO INVESTIGACION
function obtDiseInvestiga() {
    $.ajax({
        url: url + "DatosComunes/obtDisenioInvestigacion",
        type: 'post',
        success: function(respuesta) {
            $('#ID_DISENIO_INVESTIGACION').html(respuesta);
        }
    })
}

// LLENAR SELECT CICLO
function obtCicl() {
    $.ajax({
        url: url + "DatosComunes/obtCiclo",
        type: 'post',
        success: function(respuesta) {
            $('#CICLO').html(respuesta);
        }
    })
}

// LLENAR SELECT Carrera 
function obtCarrera() {
    $.ajax({
        url: url + "DatosComunes/Carrera",
        type: 'post',
        success: function(data) {
            $('#CARRERA').html(data);
        }
    });
}

// LLENAR SELECT GRUPO ALUMNO
function obtGrupoAlumn() {
    $.ajax({
        url: url + "DatosComunes/obtGrupoAlumno",
        type: 'post',
        dataType: 'json',
        cache: false,
        success: function(data) {
            var options = "<option selected disabled value='0'>Seleccionar... </option>";

            $.each(data, function(index, object) {
                options += '<option value="' + object.ID_GRUPO_ALUMNO + '">' + object.NOMBRE_GRUPO + '</option>';
            });
            // $('.bootstrap-select').selectpicker('refresh');
            $('#ID_GRUPO_ALUMNO').html(options);

            console.log(data);
        }
    })

}

/****************************************************************************
                        VALIDAR CAMPOS PARA INSERTAR
****************************************************************************/
// VALIDAR DUI
$('#DUI').change(function() {
    $.ajax({
        type: 'POST',
        url: url + 'ValidarCampos/validarDUI',
        data: { 'DUI': $(this).val() },
        success: function(msg) {
            if (msg == 1) {
                Swal.fire({
                    icon: 'error',
                    title: 'Este DUI ya Existe!'
                })
                $('#DUI').val('');
                $('#DUI').removeClass('is-valid');
            }
        }
    });
});

// VALIDAR NIT
$('#NIT').change(function() {
    $.ajax({
        type: 'POST',
        url: url + 'ValidarCampos/validarNIT',
        data: { 'NIT': $(this).val() },
        success: function(msg) {
            if (msg == 1) {
                Swal.fire({
                    icon: 'error',
                    title: 'Este NIT ya Existe!'
                })
                $('#NIT').val('');
                $('#NIT').removeClass('is-valid');
            }
        }
    });
});

// VALIDAR TELEFONO FIJO
$('#TELEFONO_FIJO').change(function() {
    $.ajax({
        type: 'POST',
        url: url + 'ValidarCampos/validarTelFijo',
        data: { 'TELEFONO_FIJO': $(this).val() },
        success: function(msg) {
            if (msg == 1) {
                Swal.fire({
                    icon: 'error',
                    title: 'Este Tel\u00e9fono ya Existe!'
                })
                $('#TELEFONO_FIJO').val('');
                $('#TELEFONO_FIJO').removeClass('is-valid');
            }
        }
    });
});

// VALIDAR TELEFONO MOVIL
$('#TELEFONO_MOVIL').change(function() {
    $.ajax({
        type: 'POST',
        url: url + 'ValidarCampos/validarTelMovil',
        data: { 'TELEFONO_MOVIL': $(this).val() },
        success: function(msg) {
            if (msg == 1) {
                Swal.fire({
                    icon: 'error',
                    title: 'Este Tel\u00e9fono ya Existe!'
                })
                $('#TELEFONO_MOVIL').val('');
                $('#TELEFONO_MOVIL').removeClass('is-valid');
            }
        }
    });
});

// VALIDAR CORREO PERSONAL
$('#CORREO_PERSONAL').change(function() {
    $.ajax({
        type: 'POST',
        url: url + 'ValidarCampos/validarEmail',
        data: { 'CORREO_PERSONAL': $(this).val() },
        success: function(msg) {
            if (msg == 1) {
                Swal.fire({
                    icon: 'error',
                    title: 'Este Correo ya Existe!'
                })
                $('#CORREO_PERSONAL').val('');
                $('#CORREO_PERSONAL').removeClass('is-valid');
            }
        }
    });
});

// VALIDAR CORREO INSTITUCIONAL
$('#CORREO_INSTITUCIONAL').change(function() {
    $.ajax({
        type: 'POST',
        url: url + 'ValidarCampos/validarEmailUSAM',
        data: { 'CORREO_INSTITUCIONAL': $(this).val() },
        success: function(msg) {
            if (msg == 1) {
                Swal.fire({
                    icon: 'error',
                    title: 'Este Correo ya Existe!'
                })
                $('#CORREO_INSTITUCIONAL').val('');
                $('#CORREO_INSTITUCIONAL').removeClass('is-valid');
            }
        }
    });
});

// VALIDAR CODIGO ASIGNATURA
$('#CODIGO_ASIGNATURA').change(function() {
    $.ajax({
        type: 'POST',
        url: url + 'ValidarCampos/validarCodAsignatura',
        data: { 'CODIGO_ASIGNATURA': $(this).val() },
        success: function(msg) {
            if (msg == 1) {
                Swal.fire({
                    icon: 'error',
                    title: 'Este C\u00f3digo ya Existe!'
                })
                $('#CODIGO_ASIGNATURA').val('');
                $('#CODIGO_ASIGNATURA').removeClass('is-valid');
            }
        }
    });
});

// VALIDAR CARNET
$('#CARNET').change(function() {
    $.ajax({
        type: 'POST',
        url: url + 'ValidarCampos/validarCarnet',
        data: { 'CARNET': $(this).val() },
        success: function(msg) {
            if (msg == 1) {
                Swal.fire({
                    icon: 'error',
                    title: 'Este Carnet ya Existe!'
                })
                $('#CARNET').val('');
                $('#CARNET').removeClass('is-valid');
            }
        }
    });
});

// VALIDAR NOMBRE CICLO
$('#COD_CICLO').change(function() {
    $.ajax({
        type: 'POST',
        url: url + 'ValidarCampos/validarCiclo',
        data: { 'COD_CICLO': $(this).val() },
        success: function(msg) {
            console.log(msg);
            if (msg == 1) {
                Swal.fire({
                    icon: 'error',
                    title: 'Ciclo ya Existe!'
                })
                $('#COD_CICLO').val('');
                $('#COD_CICLO').removeClass('is-valid');
            }
        }
    });
});

/****************************************************************************
                        VALIDAR CAMPOS PARA ACTUALIZAR
****************************************************************************/
// VALIDAR CAMBIAR DUI
$('#DUI_UPDATE').change(function() {
    $.ajax({
        type: 'POST',
        url: url + 'ValidarCampos/cambiarDUI',
        data: { 'DUI': $(this).val() },
        success: function(msg) {
            if (msg == 0) {
                Swal.fire({
                    icon: 'error',
                    title: 'Este DUI ya Existe!'
                })
                $('#DUI_UPDATE').val('');
                $('#DUI_UPDATE').removeClass('is-valid');
            }
        }
    });
});

// VALIDAR CAMBIAR NIT
$('#NIT_UPDATE').change(function() {
    $.ajax({
        type: 'POST',
        url: url + 'ValidarCampos/cambiarNIT',
        data: { 'NIT': $(this).val() },
        success: function(msg) {
            if (msg == 0) {
                Swal.fire({
                    icon: 'error',
                    title: 'Este NIT ya Existe!'
                })
                $('#NIT_UPDATE').val('');
                $('#NIT_UPDATE').removeClass('is-valid');
            }
        }
    });
});

// VALIDAR CAMBIAR TELEFONO FIJO
$('#TELEFONO_FIJO_UPDATE').change(function() {
    $.ajax({
        type: 'POST',
        url: url + 'ValidarCampos/cambiarTelFijo',
        data: { 'TELEFONO_FIJO': $(this).val() },
        success: function(msg) {
            if (msg == 0) {
                Swal.fire({
                    icon: 'error',
                    title: 'Este Tel\u00e9fono ya Existe!'
                })
                $('#TELEFONO_FIJO_UPDATE').val('');
                $('#TELEFONO_FIJO_UPDATE').removeClass('is-valid');
            }
        }
    });
});

// VALIDAR CAMBIAR TELEFONO MOVIL
$('#TELEFONO_MOVIL_UPDATE').change(function() {
    $.ajax({
        type: 'POST',
        url: url + 'ValidarCampos/cambiarTelMovil',
        data: { 'TELEFONO_MOVIL': $(this).val() },
        success: function(msg) {
            if (msg == 0) {
                Swal.fire({
                    icon: 'error',
                    title: 'Este Tel\u00e9fono ya Existe!'
                })
                $('#TELEFONO_MOVIL_UPDATE').val('');
                $('#TELEFONO_MOVIL_UPDATE').removeClass('is-valid');
            }
        }
    });
});

// VALIDAR CAMBIAR CORREO PERSONAL
$('#CORREO_PERSONAL_UPDATE').change(function() {
    $.ajax({
        type: 'POST',
        url: url + 'ValidarCampos/cambiarEmail',
        data: { 'CORREO_PERSONAL': $(this).val() },
        success: function(msg) {
            if (msg == 0) {
                Swal.fire({
                    icon: 'error',
                    title: 'Este Correo ya Existe!'
                })
                $('#CORREO_PERSONAL_UPDATE').val('');
                $('#CORREO_PERSONAL_UPDATE').removeClass('is-valid');
            }
        }
    });
});

// VALIDAR CAMBIAR CORREO INSTITUCIONAL
$('#CORREO_INSTITUCIONAL_UPDATE').change(function() {
    $.ajax({
        type: 'POST',
        url: url + 'ValidarCampos/cambiarEmailUSAM',
        data: { 'CORREO_INSTITUCIONAL': $(this).val() },
        success: function(msg) {
            if (msg == 0) {
                Swal.fire({
                    icon: 'error',
                    title: 'Este Correo ya Existe!'
                })
                $('#CORREO_INSTITUCIONAL_UPDATE').val('');
                $('#CORREO_INSTITUCIONAL_UPDATE').removeClass('is-valid');
            }
        }
    });
});

/****************************************************************************
                        CREAR USUARIO Y PASSWORD
****************************************************************************/
function crearUsuarioPass() {
    var correo = $('#CORREO_INSTITUCIONAL').val(),
        usuario = correo.split('@')[0];
    var pass = $('#PRIMER_APELLIDO_PERSONA').val().toLowerCase();

    $('#NOMBRE_USUARIO').val(usuario);
    $('#PASSWORD').val(pass);
}