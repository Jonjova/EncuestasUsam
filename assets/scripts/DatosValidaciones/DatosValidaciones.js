/****************************************************************************
                            CARGAR METODOS
****************************************************************************/
$(document).ready(function() {
    // DROPDOWNS
    llenarDropdowns();
    mascarasYformatos();

    if (window.location.href != url) {
        if (window.location.href != (url + 'Accesos/')) {
            if (cod_coordinador != 0) {
                asignatura();
            }
            if (cod_docente != 0) {
                asignaturaAsignada();
            }
        }
    }
});

/****************************************************************************
                            CARGAR DROPDOWNS
****************************************************************************/
function llenarDropdowns() {
    sexo();
    departamento();
    profesion();
    rol();
    coordinacion();
    coordinador();
    tipoInvestigacion();
    disenioInvestigacion();
    ciclo();
    carrera();

    $("#CrearProyecto [name='ID_ASIGNATURA']").change(function() {
        grupoAlumno($(this).val());
        alumnos($(this).val());
    });
    $('#ID_COORDINADOR').change(function() {
        $('#Docentes').dataTable().fnDestroy();
        llenarTablaDocente($(this).val());
    });
    $('#ASIGNATURA_PROY').change(function() {
        $('#Proyecto').dataTable().fnDestroy();
        llenarTablaProyecto($(this).val(), $('#CICLO_PROY').val(), cod_coordinador, 0);
    });
    $('#CICLO_PROY').change(function() {
        $('#Proyecto').dataTable().fnDestroy();
        llenarTablaProyecto($('#ASIGNATURA_PROY').val(), $(this).val(), cod_coordinador, 0);
    });
    $('#asignaturaR').change(function() {
        $('#Proyecto').dataTable().fnDestroy();
        llenarTablaProyecto($(this).val(), $('#cicloR').val(), cod_coordinador, 0);
    });
    $('#cicloR').change(function() {
        $('#Proyecto').dataTable().fnDestroy();
        llenarTablaProyecto($('#asignaturaR').val(), $(this).val(), cod_coordinador, 0);
    });
    $('#coordinadorR').change(function() {
        $('#Proyecto').dataTable().fnDestroy();
        llenarTablaProyecto(0, 0, $(this).val(), 0);
    });
    $('#facultadR').change(function() {
        $('#Proyecto').dataTable().fnDestroy();
        llenarTablaProyecto(0, 0, cod_coordinador, $(this).val());
    });
    $('#ID_DOCENTE').html("<option selected disabled value=''>Seleccione...</option>");
    $('#ID_DOCENTE').select2();
    $('.select2-container--default').addClass('custom-select');
    $('.select2-container--default .select2-selection').css('border', 'none');
    $('.select2-container--default .select2-selection__arrow').css('display', 'none');
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
            $('#SEXO').html(respuesta);
            $('#SEXO_UPDATE').html(respuesta);
        }
    })
}

// LLENAR SELECT DEPARTAMENTO
function departamento() {
    $.ajax({
        url: url + 'DatosComunes/dropDepartamento',
        type: 'POST',
        success: function(respuesta) {
            $('#DEPARTAMENTO').html(respuesta);
            $('#DEPARTAMENTO_UPDATE').html(respuesta);
        }
    })
}

// LLENAR SELECT PROFESION
function profesion() {
    $.ajax({
        url: url + 'DatosComunes/dropProfesion',
        type: 'POST',
        success: function(respuesta) {
            $('#PROFESION').html(respuesta);
            $('#PROFESION_UPDATE').html(respuesta);
        }
    })
}

// LLENAR SELECT ROL
function rol() {
    $.ajax({
        url: url + 'DatosComunes/dropRol',
        type: 'POST',
        success: function(respuesta) {
            $('#ID_TIPO_USUARIO').html(respuesta);
            $('#ID_TIPO_USUARIO_UPDATE').html(respuesta);
        }
    })
}

// LLENAR SELECT COORDINADOR
function coordinador() {
    $.ajax({
        url: url + 'DatosComunes/dropCoordinadores',
        type: 'POST',
        success: function(respuesta) {
            $('#ID_COORDINADOR').html(respuesta);
        }
    });
    $.ajax({
        url: url + 'DatosComunes/dropCoordinador',
        type: 'POST',
        success: function(respuesta) {
            $('#COORDINADOR').html(respuesta);
            $('#COORDINADOR_UPDATE').html(respuesta);
        }
    });
}

// LLENAR SELECT COORDINACIÓN
function coordinacion() {
    $.ajax({
        url: url + 'DatosComunes/dropCoordinacion',
        type: 'POST',
        success: function(respuesta) {
            $('#COORDINACION').html(respuesta);
            $('#COORDINACION_UPDATE').html(respuesta);
        }
    })
}

// LLENAR SELECT ASIGNATURA
function asignatura() {
    $.ajax({
        url: url + 'DatosComunes/dropAsignatura',
        type: 'POST',
        success: function(respuesta) {
            $('#ID_ASIGNATURA').html(respuesta);


        }
    });
    $.ajax({
        url: url + 'DatosComunes/dropAsignaturaProy',
        type: 'POST',
        success: function(respuesta) {
            $('#ASIGNATURA_PROY').html(respuesta);
        }
    });
}

// LLENAR SELECT ASIGNATURA ASIGNADA (PARA CREAR PROYECTO)
function asignaturaAsignada() {
    $.ajax({
        url: url + 'DatosComunes/dropAsignaturaAsignada',
        type: 'POST',
        success: function(respuesta) {
            $('#CrearProyecto #ID_ASIGNATURA').html(respuesta);
            $('#ID_ASIGNATURA_UPDATE').html(respuesta);
        }
    });
    $.ajax({
        url: url + 'DatosComunes/dropAsignaturaAsignadaProy',
        type: 'POST',
        success: function(respuesta) {
            $('#ASIGNATURA_PROY').html(respuesta);
        }
    });
}

// LLENAR SELECT DOCENTE
function docente(asignatura) {
    $.ajax({
        url: url + 'DatosComunes/dropDocente/' + asignatura,
        type: 'POST',
        success: function(respuesta) {
            $('#ID_DOCENTE').html(respuesta);
            $('#ID_DOCENTE_UPDATE').html(respuesta);
        }
    })
}

// LLENAR SELECT TIPO INVESTIGACION
function tipoInvestigacion() {
    $.ajax({
        url: url + "DatosComunes/dropTipoInvestigacion",
        type: 'post',
        success: function(respuesta) {
            $('#ID_TIPO_INVESTIGACION').html(respuesta);
            $('#ID_TIPO_INVESTIGACION_UPDATE').html(respuesta);
        }
    })
}

// LLENAR SELECT DISENIO INVESTIGACION
function disenioInvestigacion() {
    $.ajax({
        url: url + "DatosComunes/dropDisenioInvestigacion",
        type: 'post',
        success: function(respuesta) {
            $('#ID_DISENIO_INVESTIGACION').html(respuesta);
            $('#ID_DISENIO_INVESTIGACION_UPDATE').html(respuesta);
        }
    })
}

// LLENAR SELECT CICLO
function ciclo() {
    $.ajax({
        url: url + "DatosComunes/dropCiclo",
        type: 'post',
        success: function(respuesta) {
            $('#CICLO').html(respuesta);
        }
    });
    $.ajax({
        url: url + "DatosComunes/cicloProy",
        type: 'post',
        success: function(respuesta) {
            $('#CICLO_PROY').html(respuesta);
        }
    });
}

// LLENAR SELECT CARRERA
function carrera() {
    $.ajax({
        url: url + "DatosComunes/dropCarrera",
        type: 'post',
        success: function(data) {
            $('#CARRERA').html(data);
            $('#CARRERA_UPDATE').html(data);
        }
    });
}

// LLENAR SELECT ALUMNOS
function alumnos(asignatura) {
    $('#ID_ALUMNO_GA').html('');
    $.ajax({
        url: url + "DatosComunes/dropAlumnos/" + asignatura,
        type: 'post',
        dataType: 'json',
        cache: false,
        success: function(data) {
            console.log(data);
            var options;
            if(data.length>0){
                $.each(data, function(index, object) {
                    options += '<option value="' + object.ID_ALUMNO + '">' + object.CARNET + " " + object.PRIMER_NOMBRE_PERSONA + " " + object.PRIMER_APELLIDO_PERSONA + '</option>';
                });
            }else{
                options = '<option value="0" disabled>No hay alumnos</option>';
            }
           
            $('#ID_ALUMNO_GA').html(options);
            $('.bootstrap-select').selectpicker('refresh');
        }
    });
}

// LLENAR SELECT GRUPO ALUMNO
function grupoAlumno(asignatura) {
    var options='<option disabled selected value="0">Seleccione..</option>' ;
    $.ajax({
        url: url + "DatosComunes/dropGrupoAlumno/" + asignatura,
        type: 'post',
        dataType: 'json',
        cache: false,
        success: function(data) {
           if (data.length>0) {
            $.each(data, function(index, object) {
                options += '<option value="' + object.ID_GRUPO_ALUMNO + '">' + object.NOMBRE_GRUPO + '</option>';
            });
           }else{
            options = '<option disabled selected value="0">Seleccione..</option><option disabled value="1">No hay grupos</option>';
           }
           $('#ID_GRUPO_ALUMNO').html(options);
        }
    })
}

/****************************************************************************
                        EFECTO DE LOS INPUTS VALIDADOS
****************************************************************************/
jQuery.validator.setDefaults({
    debug: true,
    success: "valid",
    onfocusout: function(e) {
        this.element(e);
    },
    onkeyup: false,

    highlight: function(element) {
        jQuery(element).closest('.form-control').addClass('is-invalid');
        jQuery(element).closest('.custom-select').addClass('is-invalid');
    },
    unhighlight: function(element) {
        jQuery(element).closest('.form-control').removeClass('is-invalid');
        jQuery(element).closest('.form-control').addClass('is-valid');
        jQuery(element).closest('.custom-select').removeClass('is-invalid');
        jQuery(element).closest('.custom-select').addClass('is-valid');
    },

    errorElement: 'div',
    errorClass: 'invalid-feedback',
    errorPlacement: function(error, element) {
        if (element.parent('.input-group-prepend').length) {
            $(element).siblings(".invalid-feedback").append(error);
        } else {
            error.insertAfter(element);
        }
    }
});

/****************************************************************************
                        VALIDAR CAMPOS PARA GRUPO
****************************************************************************/
$('#CreateGrupo').validate({
    rules: {
        // INSERTAR
        NOMBRE_GRUPO: { required: true },
        ID_ALUMNO_GA: { required: true }
    },
    messages: {
        NOMBRE_GRUPO: { required: 'Nombre requerido.' },
        ID_ALUMNO_GA: { required: 'Alumnos requeridos.' }
    }
});

/****************************************************************************
                VALIDAR CAMPOS PARA ACTUALIZAR PROYECTO
****************************************************************************/
$('#UpdateProyecto').validate({
    rules: {
        // INSERTAR
        NOMBRE_PROYECTO_UPDATE: { required: true, minlength: 6, maxlength: 255 },
        DESCRIPCION_UPDATE: { required: true, minlength: 6, maxlength: 255 },
        ID_TIPO_INVESTIGACION_UPDATE: { required: true },
        ID_DISENIO_INVESTIGACION_UPDATE: { required: true },
        ID_ASIGNATURA_UPDATE: { required: true },
    },
    messages: {
        NOMBRE_PROYECTO_UPDATE: {
            required: 'Tema requerido.',
            minlength: 'M\u00ednimo 6 caracteres.',
            maxlength: 'M\u00e1ximo 255 caracteres.'
        },
        DESCRIPCION_UPDATE: {
            required: 'Descripci\u00f3n requerida.',
            minlength: 'El m\u00ednimo 6 caracteres',
            maxlength: 'El m\u00e1ximo 255 caracteres.'
        },
        ID_TIPO_INVESTIGACION_UPDATE: { required: 'Tipo de investigaci\u00f3n requerida.' },
        ID_DISENIO_INVESTIGACION_UPDATE: { required: 'Dise\u00f1o de investigaci\u00f3n requerida.' },
        ID_ASIGNATURA_UPDATE: { required: "Asignatura requerida." },
    }
});

/****************************************************************************
                        VALIDAR CAMPOS PARA INSERTAR
****************************************************************************/

// FECHA DE NACIMIENTO VALIDA
function f_MinEdad(value) {
    var now = new Date(),
        fecha = new Date(now.setFullYear(now.getFullYear() - 60)),
        anio = fecha.getFullYear(),
        mes = fecha.getMonth() + 1,
        dia = fecha.getDate();

    if (mes < 10)
        mes = '0' + mes.toString();
    if (dia < 10)
        dia = '0' + dia.toString();

    if (value == 1) {
        return anio + '-' + mes + '-' + dia;
    } else {
        return dia + '-' + mes + '-' + anio;
    }
}

function f_MaxEdad(value) {
    var now = new Date(),
        fecha = new Date(now.setFullYear(now.getFullYear() - 18)),
        anio = fecha.getFullYear(),
        mes = fecha.getMonth() + 1,
        dia = fecha.getDate();

    if (mes < 10)
        mes = '0' + mes.toString();
    if (dia < 10)
        dia = '0' + dia.toString();

    if (value == 1) {
        return anio + '-' + mes + '-' + dia;
    } else {
        return dia + '-' + mes + '-' + anio;
    }
}

function mascarasYformatos() {
    // MASCARAS DE CAMPOS
    $('#CARNET').mask('999999');
    $('#CARNET_UPDATE').mask('999999');
    $('#DUI').mask('99999999-9');
    $('#NIT').mask('9999-999999-999-9');
    $('#TELEFONO_FIJO').mask('9999-9999');
    $('#TELEFONO_MOVIL').mask('9999-9999');
    $('#DUI_UPDATE').mask('99999999-9');
    $('#NIT_UPDATE').mask('9999-999999-999-9');
    $('#TELEFONO_FIJO_UPDATE').mask('9999-9999');
    $('#TELEFONO_MOVIL_UPDATE').mask('9999-9999');

    // FECHA EDAD
    $('#FECHA_NACIMIENTO').prop('min', f_MinEdad(1));
    $('#FECHA_NACIMIENTO').prop('max', f_MaxEdad(1));
    $('#FECHA_NACIMIENTO_UPDATE').prop('min', f_MinEdad(1));
    $('#FECHA_NACIMIENTO_UPDATE').prop('max', f_MaxEdad(1));

    // FORMATO DE NOMBRES, APELLIDOS Y CODIGO DE ASIGNATURA
    $('#PRIMER_NOMBRE_PERSONA').keyup(function() {
        $(this).val($(this).val().slice(0, 1).toUpperCase() + $(this).val().slice(1).toLowerCase());
    });

    $('#PRIMER_APELLIDO_PERSONA').keyup(function() {
        $(this).val($(this).val().slice(0, 1).toUpperCase() + $(this).val().slice(1).toLowerCase());
    });

    $('#SEGUNDO_NOMBRE_PERSONA').keyup(function() {
        $(this).val($(this).val().slice(0, 1).toUpperCase() + $(this).val().slice(1).toLowerCase());
    });

    $('#SEGUNDO_APELLIDO_PERSONA').keyup(function() {
        $(this).val($(this).val().slice(0, 1).toUpperCase() + $(this).val().slice(1).toLowerCase());
    });

    $('#CODIGO_ASIGNATURA').keyup(function() {
        $(this).val($(this).val().toUpperCase());
    });

    // FORMATO DE NOMBRES, APELLIDOS Y CODIGO DE ASIGNATURA
    $('#PRIMER_NOMBRE_PERSONA_UPDATE').keyup(function() {
        $(this).val($(this).val().slice(0, 1).toUpperCase() + $(this).val().slice(1).toLowerCase());
    });

    $('#PRIMER_APELLIDO_PERSONA_UPDATE').keyup(function() {
        $(this).val($(this).val().slice(0, 1).toUpperCase() + $(this).val().slice(1).toLowerCase());
    });

    $('#SEGUNDO_NOMBRE_PERSONA_UPDATE').keyup(function() {
        $(this).val($(this).val().slice(0, 1).toUpperCase() + $(this).val().slice(1).toLowerCase());
    });

    $('#SEGUNDO_APELLIDO_PERSONA_UPDATE').keyup(function() {
        $(this).val($(this).val().slice(0, 1).toUpperCase() + $(this).val().slice(1).toLowerCase());
    });
}

// NOMBRES Y APELLIDOS VALIDOS (LETRAS, LETRAS CON TILDE, SIN ESPACIO)
jQuery.validator.addMethod("alfaOespacio", function(value, element) {
    return this.optional(element) || /^[a-záéíóúüñ]*$/i.test(value);
});

jQuery.validator.addMethod("minEdad", function(value, element) {
    return this.optional(element) || (value >= f_MinEdad(1));
});

jQuery.validator.addMethod("maxEdad", function(value, element) {
    return this.optional(element) || (value <= f_MaxEdad(1));
});

// DUI VALIDO
jQuery.validator.addMethod("isDUI", function(value) {
    var regex = /(^\d{8})-(\d$)/,
        parts = value.match(regex);
    if (parts !== null) {
        var digits = parts[1],
            dig_ve = parseInt(parts[2], 10),
            sum = 0;
        for (var i = 0, l = digits.length; i < l; i++) {
            var d = parseInt(digits[i], 10);
            sum += (9 - i) * d;
        }
        return dig_ve === (10 - (sum % 10)) % 10;
    } else {
        return false;
    }
});

// NIT VALIDO
jQuery.validator.addMethod("isNIT", function(value) {
    var calculo = 0;
    var digitos = parseInt(value.substring(12, 15));
    var resultado;
    if (digitos <= 100) {
        for (var posicion = 0; posicion <= 14; posicion++) {
            if (!(posicion == 4 || posicion == 11)) {
                calculo += ((15 - posicion) * parseInt(value.charAt(posicion)));
            }
        }
        calculo = calculo % 11;
    } else {
        var n = 1;
        for (var posicion = 0; posicion <= 14; posicion++) {
            if (!(posicion == 4 || posicion == 11)) {
                calculo = (calculo + ((parseInt(value.charAt(posicion))) * ((3 + 6 * Math.floor(Math.abs((n + 4) / 6))) - n)));
                n++;
            }
        }
        calculo = calculo % 11;
        if (calculo > 1) {
            calculo = 11 - calculo;
        } else {
            calculo = 0;
        }
    }
    resultado = (calculo == (parseInt(value.charAt(16))));
    if (value == "____-______-___-_" || value == "") {
        resultado = true;
    }
    return resultado;
});

// TELEFONO FIJO VALIDO
jQuery.validator.addMethod("telF", function(value) {
    if (value.slice(0, 1) != '2') {
        return false;
    } else {
        return true;
    }
});

// TELEFONO MOVIL VALIDO
jQuery.validator.addMethod("telM", function(value) {
    if (value.slice(0, 1) != '6' && value.slice(0, 1) != '7') {
        return false;
    } else {
        return true;
    }
});

// CORREOS VALIDO
jQuery.validator.addMethod("correo", function(value, element) {
    return this.optional(element) || /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i.test(value);
});

// CORREO PERSONAL VALIDO
jQuery.validator.addMethod("correoP", function(value) {
    if (value.split('@liveusam')[1] || value.split('@usam')[1]) {
        return false;
    } else {
        return true;
    }
});

// CORREO INSTITUCIONAL VALIDO
jQuery.validator.addMethod("correoU", function(value) {
    if (value.split('@')[1] != 'liveusam.edu.sv' && value.split('@')[1] != 'usam.edu.sv') {
        return false;
    } else {
        return true;
    }
});

// CODIGO DE ASIGNATURA VALIDO
jQuery.validator.addMethod("codAsignatura", function(value, element) {
    return this.optional(element) || /^[A-Za-z0-9\s]+$/i.test(value);
});

// NOMBRE ASIGNATURA VALIDO (LETRAS, LETRAS CON TILDE Y ESPACIO)
jQuery.validator.addMethod("alfaYespacio", function(value, element) {
    return this.optional(element) || /^[ a-záéíóúüñ]*$/i.test(value);
});

/****************************************************************************
                    VALIDAR DATOS EXISTENTES PARA INSERTAR
****************************************************************************/

// VALIDAR PROFESION EXISTENTE
jQuery.validator.addMethod("inProf", function(value) {
    var resp = false;
    $.ajax({
        type: 'POST',
        url: url + 'ValidarCampos/validarProf',
        data: { 'NOMBRE_PROFESION': value },
        async: false,
        success: function(msg) {
            if (msg != 0) {
                resp = false;
            } else {
                resp = true;
            }
        }
    });
    return resp;
});

// VALIDAR DUI EXISTENTE
jQuery.validator.addMethod("inDUI", function(value) {
    var resp = false;
    $.ajax({
        type: 'POST',
        url: url + 'ValidarCampos/validarDUI',
        data: { 'DUI': value },
        async: false,
        success: function(msg) {
            if (msg != 0) {
                resp = false;
            } else {
                resp = true;
            }
        }
    });
    return resp;
});

// VALIDAR NIT EXISTENTE
jQuery.validator.addMethod("inNIT", function(value) {
    var resp = false;
    $.ajax({
        type: 'POST',
        url: url + 'ValidarCampos/validarNIT',
        data: { 'NIT': value },
        async: false,
        success: function(msg) {
            if (msg != 0) {
                resp = false;
            } else {
                resp = true;
            }
        }
    });
    return resp;
});

// VALIDAR TELEFONO FIJO EXISTENTE
jQuery.validator.addMethod("inTelF", function(value) {
    var resp = false;
    $.ajax({
        type: 'POST',
        url: url + 'ValidarCampos/validarTelFijo',
        data: { 'TELEFONO_FIJO': value },
        async: false,
        success: function(msg) {
            if (msg != 0) {
                resp = false;
            } else {
                resp = true;
            }
        }
    });
    return resp;
});

// VALIDAR TELEFONO MOVIL EXISTENTE
jQuery.validator.addMethod("inTelM", function(value) {
    var resp = false;
    $.ajax({
        type: 'POST',
        url: url + 'ValidarCampos/validarTelMovil',
        data: { 'TELEFONO_MOVIL': value },
        async: false,
        success: function(msg) {
            if (msg != 0) {
                resp = false;
            } else {
                resp = true;
            }
        }
    });
    return resp;
});

// VALIDAR CORREO PERSONAL EXISTENTE
jQuery.validator.addMethod("inMailPer", function(value) {
    var resp = false;
    if (value == '') {
        resp = true;
    } else {
        $.ajax({
            type: 'POST',
            url: url + 'ValidarCampos/validarEmail',
            data: { 'CORREO_PERSONAL': value },
            async: false,
            success: function(msg) {
                if (msg != 0) {
                    resp = false;
                } else {
                    resp = true;
                }
            }
        });
    }
    return resp;
});

// VALIDAR CORREO INSTITUCIONAL EXISTENTE
jQuery.validator.addMethod("inMailIns", function(value) {
    var resp = false;
    $.ajax({
        type: 'POST',
        url: url + 'ValidarCampos/validarEmailUSAM',
        data: { 'CORREO_INSTITUCIONAL': value },
        async: false,
        success: function(msg) {
            if (msg != 0) {
                resp = false;
            } else {
                resp = true;
            }
        }
    });
    return resp;
});

// VALIDAR CODIGO ASIGNATURA EXISTENTE
jQuery.validator.addMethod("inCodAsig", function(value) {
    var resp = false;
    $.ajax({
        type: 'POST',
        url: url + 'ValidarCampos/validarCodAsignatura',
        data: { 'CODIGO_ASIGNATURA': value },
        async: false,
        success: function(msg) {
            if (msg != 0) {
                resp = false;
            } else {
                resp = true;
            }
        }
    });
    return resp;
});

// VALIDAR NOMBRE CICLO EXISTENTE
jQuery.validator.addMethod("inCiclo", function(value) {
    var resp = false;
    $.ajax({
        type: 'POST',
        url: url + 'ValidarCampos/validarCiclo',
        data: { 'COD_CICLO': value },
        async: false,
        success: function(msg) {
            if (msg != 0) {
                resp = false;
            } else {
                resp = true;
            }
        }
    });
    return resp;
});

// VALIDAR CARNET EXISTENTE
jQuery.validator.addMethod("inCarnet", function(value) {
    var resp = false;
    $.ajax({
        type: 'POST',
        url: url + 'ValidarCampos/validarCarnet',
        data: { 'CARNET': value },
        async: false,
        success: function(msg) {
            if (msg != 0) {
                resp = false;
            } else {
                resp = true;
            }
        }
    });
    return resp;
});

/****************************************************************************
                VALIDAR CAMPOS EXISTENTES PARA ACTUALIZAR
****************************************************************************/

// VALIDAR PROFESION EXISTENTE
jQuery.validator.addMethod("upProf", function(value) {
    var id = $('#ID_PROFESION_UPDATE').val();
    var resp = false;
    $.ajax({
        type: 'POST',
        url: url + 'ValidarCampos/cambiarProf/' + id,
        data: { 'NOMBRE_PROFESION_UPDATE': value },
        async: false,
        success: function(msg) {
            if (msg != 0) {
                resp = false;
            } else {
                resp = true;
            }
        }
    });
    return resp;
});

// VALIDAR DUI EXISTENTE
jQuery.validator.addMethod("upDUI", function(value) {
    var persona = $('#ID_PERSONA_UPDATE').val();
    var resp = false;
    $.ajax({
        type: 'POST',
        url: url + 'ValidarCampos/cambiarDUI/' + persona,
        data: { 'DUI_UPDATE': value },
        async: false,
        success: function(msg) {
            if (msg != 0) {
                resp = false;
            } else {
                resp = true;
            }
        }
    });
    return resp;
});

// VALIDAR NIT EXISTENTE
jQuery.validator.addMethod("upNIT", function(value) {
    var persona = $('#ID_PERSONA_UPDATE').val();
    var resp = false;
    $.ajax({
        type: 'POST',
        url: url + 'ValidarCampos/cambiarNIT/' + persona,
        data: { 'NIT_UPDATE': value },
        async: false,
        success: function(msg) {
            if (msg != 0) {
                resp = false;
            } else {
                resp = true;
            }
        }
    });
    return resp;
});

// VALIDAR TELEFONO FIJO EXISTENTE
jQuery.validator.addMethod("upTelF", function(value) {
    var persona = $('#ID_PERSONA_UPDATE').val();
    var resp = false;
    $.ajax({
        type: 'POST',
        url: url + 'ValidarCampos/cambiarTelFijo/' + persona,
        data: { 'TELEFONO_FIJO_UPDATE': value },
        async: false,
        success: function(msg) {
            if (msg != 0) {
                resp = false;
            } else {
                resp = true;
            }
        }
    });
    return resp;
});

// VALIDAR TELEFONO MOVIL EXISTENTE
jQuery.validator.addMethod("upTelM", function(value) {
    var persona = $('#ID_PERSONA_UPDATE').val();
    var resp = false;
    $.ajax({
        type: 'POST',
        url: url + 'ValidarCampos/cambiarTelMovil/' + persona,
        data: { 'TELEFONO_MOVIL_UPDATE': value },
        async: false,
        success: function(msg) {
            if (msg != 0) {
                resp = false;
            } else {
                resp = true;
            }
        }
    });
    return resp;
});

// VALIDAR CORREO PERSONAL EXISTENTE
jQuery.validator.addMethod("upMailPer", function(value) {
    var persona = $('#ID_PERSONA_UPDATE').val();
    var resp = false;
    if (value == '') {
        resp = true;
    } else {
        $.ajax({
            type: 'POST',
            url: url + 'ValidarCampos/cambiarEmail/' + persona,
            data: { 'CORREO_PERSONAL_UPDATE': value },
            async: false,
            success: function(msg) {
                if (msg != 0) {
                    resp = false;
                } else {
                    resp = true;
                }
            }
        });
    }
    return resp;
});

// VALIDAR CORREO INSTITUCIONAL EXISTENTE
jQuery.validator.addMethod("upMailIns", function(value) {
    var persona = $('#ID_PERSONA_UPDATE').val();
    var resp = false;
    $.ajax({
        type: 'POST',
        url: url + 'ValidarCampos/cambiarEmailUSAM/' + persona,
        data: { 'CORREO_INSTITUCIONAL_UPDATE': value },
        async: false,
        success: function(msg) {
            if (msg != 0) {
                resp = false;
            } else {
                resp = true;
            }
        }
    });
    return resp;
});

// VALIDAR CODIGO ASIGNATURA EXISTENTE
jQuery.validator.addMethod("upCodAsig", function(value) {
    var id = $('#ID_ASIGNATURA_UPDATE').val();
    var resp = false;
    $.ajax({
        type: 'POST',
        url: url + 'ValidarCampos/cambiarCodAsignatura/' + id,
        data: { 'CODIGO_ASIGNATURA_UPDATE': value },
        async: false,
        success: function(msg) {
            if (msg != 0) {
                resp = false;
            } else {
                resp = true;
            }
        }
    });
    return resp;
});

// VALIDAR CARNET EXISTENTE
jQuery.validator.addMethod("upCarnet", function(value) {
    var id = $('#ID_ALUMNO_UPDATE').val();
    var resp = false;
    $.ajax({
        type: 'POST',
        url: url + 'ValidarCampos/cambiarCarnet/' + id,
        data: { 'CARNET_UPDATE': value },
        async: false,
        success: function(msg) {
            if (msg != 0) {
                resp = false;
            } else {
                resp = true;
            }
        }
    });
    return resp;
});

/****************************************************************************
                        VALIDAR CAMBIAR CONTRASEÑA
****************************************************************************/
// VALIDAR CONTRASEÑA ACTUAL
jQuery.validator.addMethod("existPass", function(value) {
    var resp = false;
    $.ajax({
        type: 'POST',
        url: url + 'Cuenta/validarPassword',
        data: { 'PASSWORD': value },
        async: false,
        success: function(msg) {
            if (msg != 0) {
                resp = false;
            } else {
                resp = true;
            }
        }
    });
    return resp;
});

// COMPARAR NUEVA CONTRASEÑA CON REPETIR CONTRASEÑA
var password = $('#PASSWORD');
var rePassword = $('#RE_PASSWORD');
$('#PASSWORD').change(function() {
    if (password.val() != rePassword.val() && rePassword.val() != '') {
        Swal.fire({
            icon: 'error',
            allowEscapeKey: false,
            allowOutsideClick: false,
            confirmButtonColor: "#343a40",
            title: '<p style="color: #343a40; font-size: 1.072em; font-weight: 600; line-height: unset; margin: 0;">Las contrase\u00f1as no coinciden!</p>'
        });
        $('#RE_PASSWORD').val('');
        $('#RE_PASSWORD').removeClass('is-valid');
    }
});

// COMPARAR CON NUEVA CONTRASEÑA CONTRASEÑA ACTUAL
$('#RE_PASSWORD').change(function() {
    if (password.val() != rePassword.val()) {
        Swal.fire({
            icon: 'error',
            allowEscapeKey: false,
            allowOutsideClick: false,
            confirmButtonColor: "#343a40",
            title: '<p style="color: #343a40; font-size: 1.072em; font-weight: 600; line-height: unset; margin: 0;">Las contrase\u00f1as no coinciden!</p>'
        });
        $('#RE_PASSWORD').val('');
        $('#RE_PASSWORD').removeClass('is-valid');
    }
});