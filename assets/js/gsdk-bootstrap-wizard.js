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

    // var pass1 = $('[name=PASSWORD]');
    // var pass2 = $('[name=RePASSWORD]');
    // var confirmacion = "Las contrase\u00f1as coinciden";
    // var segura = "Contrase\u00f1a segura";
    // var insegura = "Contrase\u00f1a insegura";
    // var negacion = "Las contrase\361as no coinciden";

    // //oculto por defecto el elemento span
    // var span1 = $('<span></span>').insertAfter(pass1);
    // var span2 = $('<span></span>').insertAfter(pass2);
    // span1.hide();
    // span2.hide();

    // // FUNCION QUE COMPARA LAS CONTRASEÑAS 
    // function coincidePassword() {
    //     var valor1 = pass1.val();
    //     var valor2 = pass2.val();

    //     //muestro el span
    //     span2.show().removeClass();

    //     //condiciones dentro de la funcion
    //     if (valor1 != valor2) {
    //         span2.text(negacion).addClass('text-danger');
    //         $('input[name=finish]').attr('disabled', 'disabled');
    //         $('input[name=finish]').css({ 'cursor': 'no-drop' });
    //     } else if (valor1.length != 0 && valor1 == valor2) {
    //         span2.text(confirmacion).removeClass('text-danger').addClass('text-success');
    //         $('input[name=finish]').removeAttr('disabled');
    //         $('input[name=finish]').css({ 'cursor': 'pointer' });
    //     }
    //     if (valor2 == "") {
    //         span2.hide();
    //     }
    // }

    // // FUNCION PARA MENSAJE DE CONTRASEÑA SEGURA
    // pass1.keyup(function() {

    //     var valor1 = pass1.val(); // VARIABLE QUE TOMA EL VALOR DE PASSWORD

    //     // MOSTRAR MENSAJE
    //     span1.show().removeClass();

    //     // CONDICIONES PARA ASIGNAR MENSAJE
    //     if (valor1.length > 10) {
    //         span1.text(segura).addClass('text-success');
    //     } else if (valor1.length <= 10) {
    //         span1.text(insegura).addClass('text-danger');
    //     }
    //     if (valor1 == "") {
    //         span1.hide();
    //     }
    // });

    // // FUNCION PARA CONTRASEÑA
    // pass2.keyup(function() {
    //     coincidePassword();
    // });

    /*  Activate the tooltips      */
    $('[rel="tooltip"]').tooltip();

    // VALIDACION DE CAMPOS
    $.extend(jQuery.validator.messages, {
        email: "Ingrese un Correo V\u00e1lido."
    });

    var $validator = $('.wizard-card form').validate({
        rules: {
            PRIMER_NOMBRE_PERSONA: { required: true, lettersonly: true, minlength: 3, maxlength: 25 },
            SEGUNDO_NOMBRE_PERSONA: { required: true, lettersonly: true, minlength: 3, maxlength: 25 },
            PRIMER_APELLIDO_PERSONA: { required: true, lettersonly: true, minlength: 3, maxlength: 25 },
            SEGUNDO_APELLIDO_PERSONA: { required: true, lettersonly: true, minlength: 3, maxlength: 25 },
            FECHA_NACIMIENTO: { required: true },
            SEXO: { required: true },
            DUI: { required: true },
            NIT: { required: true },
            TELEFONO_FIJO: { required: true },
            TELEFONO_MOVIL: { required: true },
            DEPARTAMENTO: { required: true },
            DIRECCION: { required: true },
            CORREO_INSTITUCIONAL: { required: true },
            PROFESION: { required: true },
            COORDINACION: { required: true },
            COORDINADOR: { required: true },
            CODIGO_ASIGNATURA: { required: true },
            NOMBRE_ASIGNATURA: { required: true },
            ID_ASIGNATURA: { required: true },
            ID_DOCENTE: { required: true },
            OLD_PASSWORD: { required: true },
            PASSWORD: { required: true },
            RE_PASSWORD: { required: true }
        },
        messages: {
            PRIMER_NOMBRE_PERSONA: { required: "Nombre Requerido.", lettersonly: 'S\u00f3lo letras.', minlength: 'El m\u00ednimo permitido son 3 caracteres', maxlength: 'El m\u00e1ximo permitido son 25 caracteres.' },
            SEGUNDO_NOMBRE_PERSONA: { required: "Nombre Requerido.", lettersonly: 'S\u00f3lo letras.', minlength: 'El m\u00ednimo permitido son 3 caracteres', maxlength: 'El m\u00e1ximo permitido son 25 caracteres.' },
            PRIMER_APELLIDO_PERSONA: { required: "Apellido Requerido.", lettersonly: 'S\u00f3lo letras.', minlength: 'El m\u00ednimo permitido son 3 caracteres', maxlength: 'El m\u00e1ximo permitido son 25 caracteres.' },
            SEGUNDO_APELLIDO_PERSONA: { required: "Apellido Requerido.", lettersonly: 'S\u00f3lo letras.', minlength: 'El m\u00ednimo permitido son 3 caracteres', maxlength: 'El m\u00e1ximo permitido son 25 caracteres.' },
            FECHA_NACIMIENTO: { required: "Fecha de Nacimiento Requerida." },
            SEXO: { required: "Sexo Requerido." },
            DUI: { required: "DUI Requerido." },
            NIT: { required: "NIT Requerido." },
            TELEFONO_FIJO: { required: "Tel\u00f3fono Fijo Requerido." },
            TELEFONO_MOVIL: { required: "Tel\u00f3fono M\u00f3vil Requerido." },
            DEPARTAMENTO: { required: "Departamento Requerido." },
            DIRECCION: { required: "Direcci\u00f3n Requerida." },
            CORREO_INSTITUCIONAL: { required: "Correo Institucional Requerido." },
            PROFESION: { required: "Profesi\u00f3n Requerida." },
            COORDINACION: { required: "Coordinaci\u00f3n Requerida." },
            COORDINADOR: { required: "Coordinador Requerido." },
            CODIGO_ASIGNATURA: { required: "C\u00f3digo Requerido." },
            NOMBRE_ASIGNATURA: { required: "Nombre Requerido." },
            ID_ASIGNATURA: { required: "Asignatura Requerida." },
            ID_DOCENTE: { required: "Docente Requerido." },
            OLD_PASSWORD: { required: "Contrase\u00f1a Antigua Requerida." },
            PASSWORD: { required: "Nueva Contrase\u00f1a Requerida." },
            RE_PASSWORD: { required: "Confirme la Nueva Contrase\u00f1a." }
        }
    });

    // Wizard Initialization
    $('.wizard-card').bootstrapWizard({
        'tabClass': 'nav nav-pills',
        'nextSelector': '.btn-next',
        'previousSelector': '.btn-previous',

        onNext: function(tab, navigation, index) {
            var $valid = $('.wizard-card form').valid();
            if (!$valid || $('span').hasClass('text-danger')) {
                $validator.focusInvalid();
                $('#CreateCoordinador').addClass('was-validated');
                $('#CreateDocente').addClass('was-validated');
                return false;
            }
            $('#CreateCoordinador').removeClass('was-validated');
            $('#CreateDocente').removeClass('was-validated');
        },

        onInit: function(tab, navigation, index) {

            //check number of tabs and fill the entire row
            var $total = navigation.find('li').length;
            $width = 100 / $total;
            var $wizard = navigation.closest('.wizard-card');

            $display_width = $(document).width();

            // if ($display_width < 600 && $total > 3) {
            //     $width = 50;
            // }

            navigation.find('li').css('width', $width + '%');
            $first_li = navigation.find('li:first-child a').html();
            $moving_div = $('<div class="moving-tab">' + $first_li + '</div>');
            $('.wizard-card .wizard-navigation').append($moving_div);
            refreshAnimation($wizard, index);
            $('.moving-tab').css('transition', 'transform 0s');
        },

        onTabClick: function(tab, navigation, index) {

            var $valid = $('.wizard-card form').valid();

            if (!$valid || $('span').hasClass('text-danger')) {
                $validator.focusInvalid();
                $('#CreateCoordinador').addClass('was-validated');
                $('#CreateDocente').addClass('was-validated');
                return false;
            } else {
                $('#CreateCoordinador').removeClass('was-validated');
                $('#CreateDocente').removeClass('was-validated');
                return true;
            }
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