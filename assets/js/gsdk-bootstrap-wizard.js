/*!

 =========================================================
 * Bootstrap Wizard - v1.1.1
 =========================================================
 
 * Product Page: https://www.creative-tim.com/product/bootstrap-wizard
 * Copyright 2017 Creative Tim (http://www.creative-tim.com)
 * Licensed under MIT (https://github.com/creativetimofficial/bootstrap-wizard/blob/master/LICENSE.md)
 
 =========================================================
 
 * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
 */

// Get Shit Done Kit Bootstrap Wizard Functions

/* UNICODE
\u00e1 = á
\u00e9 = é
\u00ed = í
\u00f3 = ó
\u00fa = ú
\u00c1 = Á
\u00c9 = É
\u00cd = Í
\u00d3 = Ó
\u00da = Ú
\u00f1 = ñ
\u00d1 = Ñ
*/

searchVisible = 0;
transparent = true;

$(document).ready(function() {

    /*  Activate the tooltips      */
    $('[rel="tooltip"]').tooltip();

    var $validator = $('.wizard-card form').validate({
        rules: {
            // INSERTAR
            NOMBRE_PROFESION: { required: true, alfaYespacio: true, minlength: 3, maxlength: 100, inProf: true },
            PRIMER_NOMBRE_PERSONA: { required: true, alfaOespacio: true, minlength: 3, maxlength: 15 },
            PRIMER_APELLIDO_PERSONA: { required: true, alfaOespacio: true, minlength: 3, maxlength: 15 },
            SEGUNDO_NOMBRE_PERSONA: { alfaOespacio: true, minlength: 3, maxlength: 15 },
            SEGUNDO_APELLIDO_PERSONA: { alfaOespacio: true, minlength: 3, maxlength: 15 },
            FECHA_NACIMIENTO: { required: true, min: false, max: false, minEdad: true, maxEdad: true },
            SEXO: { required: true },
            DUI: { required: true, isDUI: true, inDUI: true },
            NIT: { isNIT: true, inNIT: true },
            TELEFONO_FIJO: { required: true, telF: true, inTelF: true },
            TELEFONO_MOVIL: { required: true, telM: true, inTelM: true },
            DEPARTAMENTO: { required: true },
            DIRECCION: { required: true },
            CORREO_PERSONAL: { correo: true, correoP: true, inMailPer: true },
            CORREO_INSTITUCIONAL: { required: true, correo: true, correoU: true, inMailIns: true },
            PROFESION: { required: true },
            COORDINACION: { required: true },
            COORDINADOR: { required: true },
            CODIGO_ASIGNATURA: { required: true, codAsignatura: true, inCodAsig: true },
            NOMBRE_ASIGNATURA: { required: true, alfaYespacio: true },
            ID_ASIGNATURA: { required: true },
            ID_DOCENTE: { required: true },
            OLD_PASSWORD: { required: true },
            PASSWORD: { required: true },
            RE_PASSWORD: { required: true },
            COD_CICLO: { required: true, inCiclo: true },
            FECHA_INICIO: { required: true },
            FECHA_FIN: { required: true },
            // PROYECTO
            NOMBRE_PROYECTO: { required: true, minlength: 6, maxlength: 255 },
            DESCRIPCION: { required: true, minlength: 6, maxlength: 255 },
            ID_TIPO_INVESTIGACION: { required: true },
            ID_ASIGNATURA: { required: true },
            ID_DISENIO_INVESTIGACION: { required: true },
            FECHA_ASIGNACION: { required: true },
            ID_GRUPO_ALUMNO: { required: true },
            CICLO: { required: true },
            // ACTUALIZAR
            NOMBRE_PROFESION_UPDATE: { required: true, alfaYespacio: true, minlength: 3, maxlength: 100, upProf: true },
            PRIMER_NOMBRE_PERSONA_UPDATE: { required: true, alfaOespacio: true, minlength: 3, maxlength: 25 },
            PRIMER_APELLIDO_PERSONA_UPDATE: { required: true, alfaOespacio: true, minlength: 3, maxlength: 25 },
            SEGUNDO_NOMBRE_PERSONA_UPDATE: { alfaOespacio: true, minlength: 3, maxlength: 25 },
            SEGUNDO_APELLIDO_PERSONA_UPDATE: { alfaOespacio: true, minlength: 3, maxlength: 25 },
            FECHA_NACIMIENTO_UPDATE: { required: true, min: false, max: false, minEdad: true, maxEdad: true },
            SEXO_UPDATE: { required: true },
            DUI_UPDATE: { required: true, isDUI: true, upDUI: true },
            NIT_UPDATE: { isNIT: true, upNIT: true },
            TELEFONO_FIJO_UPDATE: { required: true, telF: true, upTelF: true },
            TELEFONO_MOVIL_UPDATE: { required: true, telM: true, upTelM: true },
            DEPARTAMENTO_UPDATE: { required: true },
            DIRECCION_UPDATE: { required: true },
            CORREO_PERSONAL_UPDATE: { correo: true, correoP: true, upMailPer: true },
            CORREO_INSTITUCIONAL_UPDATE: { required: true, correo: true, correoU: true, upMailIns: true },
            PROFESION_UPDATE: { required: true },
            COORDINACION_UPDATE: { required: true }
        },
        messages: {
            // INSERTAR
            NOMBRE_PROFESION: {
                required: "Nombre requerido.",
                alfaYespacio: "S\u00f3lo letras.",
                minlength: 'M\u00ednimo 3 caracteres',
                maxlength: 'M\u00e1ximo 100 caracteres.',
                inProf: 'Profesi\u00f3n ya existe!'
            },
            PRIMER_NOMBRE_PERSONA: {
                required: "Nombre requerido.",
                alfaOespacio: "S\u00f3lo letras.",
                minlength: 'M\u00ednimo 3 caracteres',
                maxlength: 'M\u00e1ximo 15 caracteres.'
            },
            PRIMER_APELLIDO_PERSONA: {
                required: "Apellido requerido.",
                alfaOespacio: 'S\u00f3lo letras.',
                minlength: 'M\u00ednimo 3 caracteres',
                maxlength: 'M\u00e1ximo 15 caracteres.'
            },
            SEGUNDO_NOMBRE_PERSONA: {
                alfaOespacio: 'S\u00f3lo letras.',
                minlength: 'M\u00ednimo 3 caracteres',
                maxlength: 'M\u00e1ximo 15 caracteres.'
            },
            SEGUNDO_APELLIDO_PERSONA: {
                alfaOespacio: 'S\u00f3lo letras.',
                minlength: 'M\u00ednimo 3 caracteres',
                maxlength: 'M\u00e1ximo 15 caracteres.'
            },
            FECHA_NACIMIENTO: {
                required: "Fecha de nacimiento requerida.",
                minEdad: 'Edad m\u00e1xima 60 a\u00f1os',
                maxEdad: 'Edad m\u00ednima 18 a\u00f1os'
            },
            SEXO: { required: "Sexo requerido." },
            DUI: {
                required: "DUI requerido.",
                isDUI: "DUI inv\u00e1lido.",
                inDUI: "Este DUI ya existe!"
            },
            NIT: {
                isNIT: "NIT inv\u00e1lido.",
                inNIT: "Este NIT ya existe!"
            },
            TELEFONO_FIJO: {
                required: "Tel\u00f3fono fijo requerido.",
                telF: "Ingrese un tel\u00e9fono fijo",
                inTelF: "Este tel\u00e9fono ya existe!"
            },
            TELEFONO_MOVIL: {
                required: "Tel\u00f3fono m\u00f3vil requerido.",
                telM: "Ingrese un tel\u00e9fono m\u00f3vil",
                inTelM: "Este tel\u00e9fono ya existe!"
            },
            DEPARTAMENTO: { required: "Departamento requerido." },
            DIRECCION: { required: "Direcci\u00f3n requerida." },
            CORREO_PERSONAL: {
                correo: "Ingrese un correo v\u00e1lido.",
                correoP: "Ingrese un correo personal.",
                inMailPer: "Este correo ya existe!"
            },
            CORREO_INSTITUCIONAL: {
                required: "Correo institucional requerido.",
                correo: "Ingrese un correo v\u00e1lido.",
                correoU: "Ingrese un correo institucional.",
                inMailIns: "Este correo ya existe!"
            },
            PROFESION: { required: "Profesi\u00f3n requerida." },
            COORDINACION: { required: "Coordinaci\u00f3n requerida." },
            COORDINADOR: { required: "Coordinador requerido." },
            CODIGO_ASIGNATURA: {
                required: "C\u00f3digo requerido.",
                codAsignatura: "S\u00f3lo letras sin tilde, números o espacios.",
                inCodAsig: "Este c\u00f3digo ya existe"
            },
            NOMBRE_ASIGNATURA: {
                required: "Nombre requerido.",
                alfaYespacio: "S\u00f3lo letras o espacios."
            },
            ID_ASIGNATURA: { required: "Asignatura requerida." },
            ID_DOCENTE: { required: "Docente requerido." },
            OLD_PASSWORD: { required: "Contrase\u00f1a antigua requerida." },
            PASSWORD: { required: "Nueva contrase\u00f1a requerida." },
            RE_PASSWORD: { required: "Confirme la nueva contrase\u00f1a." },
            COD_CICLO: {
                required: "Nombre ciclo requerido.",
                inCiclo: "Ciclo ya existe!"
            },
            FECHA_INICIO: { required: "Fecha inicio requerida." },
            FECHA_FIN: { required: "Fecha fin requerida." },
            // PROYECTO
            NOMBRE_PROYECTO: {
                required: 'Nombre de Proyecto requerido.',
                minlength: 'El mínimo permitido son 6 caracteres.',
                maxlength: 'El máximo permitido son 255 caracteres.'
            },
            DESCRIPCION: {
                required: 'Descripción es requerido.',
                minlength: 'El mínimo permitido son 6 caracteres',
                maxlength: 'El máximo permitido son 255 caracteres.'
            },
            ID_TIPO_INVESTIGACION: { required: 'Tipo de investigación requerido.' },
            ID_ASIGNATURA: { required: 'Asignatura es requerida.' },
            ID_DISENIO_INVESTIGACION: { required: 'Diseño de investigación requerido.' },
            FECHA_ASIGNACION: { required: 'Fecha requerida.' },
            ID_GRUPO_ALUMNO: { required: 'Grupo de alumno requerido.' },
            CICLO: { required: 'Ciclo requerido.' },
            // ACTUALIZAR
            NOMBRE_PROFESION_UPDATE: {
                required: "Nombre requerido.",
                alfaYespacio: "S\u00f3lo letras.",
                minlength: 'M\u00ednimo 3 caracteres',
                maxlength: 'M\u00e1ximo 100 caracteres.',
                upProf: 'Profesi\u00f3n ya existe!'
            },
            PRIMER_NOMBRE_PERSONA_UPDATE: {
                required: "Nombre requerido.",
                alfaOespacio: "S\u00f3lo letras.",
                minlength: 'M\u00ednimo 3 caracteres',
                maxlength: 'M\u00e1ximo 25 caracteres.'
            },
            PRIMER_APELLIDO_PERSONA_UPDATE: {
                required: "Apellido requerido.",
                alfaOespacio: 'S\u00f3lo letras.',
                minlength: 'M\u00ednimo 3 caracteres',
                maxlength: 'M\u00e1ximo 25 caracteres.'
            },
            SEGUNDO_NOMBRE_PERSONA_UPDATE: {
                alfaOespacio: 'S\u00f3lo letras.',
                minlength: 'M\u00ednimo 3 caracteres',
                maxlength: 'M\u00e1ximo 25 caracteres.'
            },
            SEGUNDO_APELLIDO_PERSONA_UPDATE: {
                alfaOespacio: 'S\u00f3lo letras.',
                minlength: 'M\u00ednimo 3 caracteres',
                maxlength: 'M\u00e1ximo 25 caracteres.'
            },
            FECHA_NACIMIENTO_UPDATE: {
                required: "Fecha de nacimiento requerida.",
                minEdad: 'Edad m\u00e1xima 60 a\u00f1os',
                maxEdad: 'Edad m\u00ednima 18 a\u00f1os'
            },
            SEXO_UPDATE: { required: "Sexo requerido." },
            DUI_UPDATE: {
                required: "DUI requerido.",
                isDUI: "DUI inv\u00e1lido.",
                upDUI: "Este DUI ya existe!"
            },
            NIT_UPDATE: {
                isNIT: "NIT inv\u00e1lido.",
                upNIT: "Este NIT ya existe!"
            },
            TELEFONO_FIJO_UPDATE: {
                required: "Tel\u00f3fono fijo requerido.",
                telF: "Ingrese un tel\u00e9fono fijo",
                upTelF: "Este tel\u00e9fono ya existe!"
            },
            TELEFONO_MOVIL_UPDATE: {
                required: "Tel\u00f3fono m\u00f3vil requerido.",
                telM: "Ingrese un tel\u00e9fono m\u00f3vil",
                upTelM: "Este tel\u00e9fono ya existe!"
            },
            DEPARTAMENTO_UPDATE: { required: "Departamento requerido." },
            DIRECCION_UPDATE: { required: "Direcci\u00f3n requerida." },
            CORREO_PERSONAL_UPDATE: {
                correo: "Ingrese un correo v\u00e1lido.",
                correoP: "Ingrese un correo personal.",
                upMailPer: "Este correo ya existe!"
            },
            CORREO_INSTITUCIONAL_UPDATE: {
                required: "Correo institucional requerido.",
                correo: "Ingrese un correo v\u00e1lido.",
                correoU: "Ingrese un correo institucional.",
                upMailIns: "Este correo ya existe!"
            },
            PROFESION_UPDATE: { required: "Profesi\u00f3n requerida." },
            COORDINACION_UPDATE: { required: "Coordinaci\u00f3n requerida." }
        }
    });

    // Wizard Initialization
    $('.wizard-card').bootstrapWizard({
        'tabClass': 'nav nav-pills',
        'nextSelector': '.btn-next',
        'previousSelector': '.btn-previous',

        onNext: function(tab, navigation, index) {
            var $valid = $('.wizard-card form').valid();
            if (!$valid) {
                $validator.focusInvalid();
                return false;
            }
        },

        onInit: function(tab, navigation, index) {
            var $total = navigation.find('li').length;
            $width = 100 / $total;
            var $wizard = navigation.closest('.wizard-card');

            $display_width = $(document).width();
            navigation.find('li').css('width', $width + '%');
            $first_li = navigation.find('li:first-child a').html();
            $moving_div = $('<div class="moving-tab">' + $first_li + '</div>');
            $('.wizard-card .wizard-navigation').append($moving_div);
            refreshAnimation($wizard, index);
            $('.moving-tab').css('transition', 'transform 0s');
        },

        onTabClick: function(tab, navigation, index) {
            var $valid = $('.wizard-card form').valid();
            if (!$valid) {
                $validator.focusInvalid();
                return false;
            } else {
                return true;
            }
            // return false;
        },

        onTabShow: function(tab, navigation, index) {
            var $total = navigation.find('li').length;
            var $current = index + 1;

            var $wizard = navigation.closest('.wizard-card');

            if ($current >= $total) {
                $($wizard).find('.btn-next').hide();
                $($wizard).find('.btn-finish').show();
            } else {
                $($wizard).find('.btn-next').show();
                $($wizard).find('.btn-finish').hide();
            }

            button_text = navigation.find('li:nth-child(' + $current + ') a').html();

            setTimeout(function() {
                $('.moving-tab').text(button_text);
            }, 150);

            refreshAnimation($wizard, index);
        }
    });

    if ($(document).width() <= 992) {
        $('#UpdateCoordinador .moving-tab').css('width', '100%');
        $('#UpdateDocente .moving-tab').css('width', '100%');
    } else {
        $('#UpdateCoordinador .moving-tab').css('width', '25%');
        $('#UpdateDocente .moving-tab').css('width', '25%');
    }

});

$(window).resize(function() {
    $('.wizard-card').each(function() {
        $wizard = $(this);
        index = $wizard.bootstrapWizard('currentIndex');
        refreshAnimation($wizard, index);

        $('.moving-tab').css({
            'transition': 'transform 0s'
        });
    });
});

function refreshAnimation($wizard, index) {
    total_steps = $wizard.find('li').length;
    width_li = 100 / total_steps;
    move_distanceW = $wizard.width() / total_steps;
    step_width = move_distanceW;
    move_distanceW *= index;

    move_distanceH = $wizard.find('li').height();
    move_distanceH *= index;

    if ($(document).width() <= 992) {
        $wizard.find('.moving-tab').css('width', '100%');
        $('.wizard-card .wizard-navigation ul li').css('width', '100%')
        $('.moving-tab').css({
            'transform': 'translate3d(0, ' + move_distanceH + 'px, 0)',
            'transition': 'all 0.3s ease-out'
        });
    } else {

        $wizard.find('.moving-tab').css('width', step_width);
        $('.wizard-card .wizard-navigation ul li').css('width', width_li + '%');
        $('.moving-tab').css({
            'transform': 'translate3d(' + move_distanceW + 'px, 0, 0)',
            'transition': 'all 0.3s ease-out'
        });
    }

    if ($(document).width() >= 992 && $(document).width() <= 1200) {
        $('#logo_USAM').css('display', 'none');
        $('#col_persona').removeClass('col-sm-6');
        $('#col_persona').addClass('col-sm-8');
        $('#col_persona').addClass('col-sm-offset-1');
    } else {
        $('#logo_USAM').css('display', 'block');
        $('#col_persona').removeClass('col-sm-8');
        $('#col_persona').removeClass('col-sm-offset-1');
        $('#col_persona').addClass('col-sm-6');
    }

    if ($(document).width() >= 1200) {
        $('#logo_USAM').css('margin-top', '20px');
    }
}