//Versión datatable y ajax.
$(document).ready(function() {
    //Mostrar campos de la tabla Permisos.
    $('#Permisos').DataTable({
        "ajax": url + "Permisos/MostrarPermisos",
        "order": [],
        "language": idioma_espanol,
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
    
    /*$.ajax({
        url: url + "Permisos/MostrarPermisos",
        type: 'post',
        success: function(d) {
            console.log(d);//comprobando
        }
    });*/

});

//llenado de todos los select
$(document).ready(function($) {
    obtR();
    obtM();
    
});
//llenar select Rol. 
function obtR() {
    $.ajax({
        url: url + "Permisos/obtRoles",
        type: 'post',
        success: function(respuesta) {
            //Insertar
            $('#ROL_ID').html(respuesta);
            //Actualizar
            //$('#ROL_ID').html(respuesta);
        }
    })
}

function obtM() {
    $.ajax({
        url: url + "Permisos/obtModulos",
        type: 'post',
        success: function(respuesta) {
            //Insertar
            $('#MODULO_ID').html(respuesta);
            //Actualizar
            //$('#MODULO_ID').html(respuesta);
        }
    })
}

// Acción de Insertar Permisos.
$(function() {
    $("#CrearPermiso").submit(function(event) {
        $.ajax({
            url: url + 'Permisos/Guardar',
            data: $("#CrearPermiso").serialize(),
            type: "post", 
            dataType: 'json',
            success: function(data) {

                if (data !== '') {

                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Datos guardados correctamente',
                        showConfirmButton: false,
                        timer: 1500
                    })

                    $('#CrearPermiso')[0].reset();


                } else {
                    alert('ingrese datos');
                }
            },
            error: function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Algunos campos son requeridos!'
                })
            }
        });
        event.preventDefault();
    });

});