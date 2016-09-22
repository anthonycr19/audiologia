function inicio() {
    $.ajax({
        url: 'gui/view/VistaInicio.php',
        type: 'post',
        data: {}
    }).done(function (msg) {
        $("#principal").html(msg);
    });
}

function buscarPaciente() {
    $.ajax({
        url: 'gui/view/VistaBuscarPaciente.php',
        type: 'post',
        data: {}
    }).done(function (msg) {
        $("#principal").html(msg);
    });
}

function buscarPacientesFiltro() {

    var empresa = $("#empresa").val();
    var fechaInicio = $("#fechaInicio").val();
    var fechaFin = $("#fechaFin").val();
    var dni = $("#dni").val();
    var nombres = $("#nombres").val();
    var apellidos = $("#apellidos").val();
    var confirma = $("#confirma").val();

    if (empresa == 0) {
        alert("Seleccione una empresa!");
    } else {
        if ((Date.parse(fechaInicio) > Date.parse(fechaFin)) || fechaInicio == '' || fechaFin == '') {
            alert("Elija un rango de fechas correcto!");
        } else {
            $.ajax({
                url: 'gui/view/VistaBuscarPaciente.php',
                type: 'post',
                data: {
                    empresa: empresa,
                    fechaInicio: fechaInicio,
                    fechaFin: fechaFin,
                    dni: dni,
                    nombres: nombres,
                    apellidos: apellidos,
                    confirma: confirma
                }
            }).done(function (msg) {
                $("#principal").html(msg);
            });
        }
    }
}

// function eliminarArchivo(idArchivo){
//     $.ajax({
//         url:'gui/view/VistaBuscarEmpresa.php',
//         type:'post',
//         data:{
//             idArchivo: idArchivo
//         }
//     }).done(function(msg){
//         $("#principal").html(msg);
//     });
// }

function eliminarPaciente(idPacienteEliminar) {
    var empresa = $("#empresa").val();
    var fechaInicio = $("#fechaInicio").val();
    var fechaFin = $("#fechaFin").val();
    var dni = $("#dni").val();
    var nombres = $("#nombres").val();
    var apellidos = $("#apellidos").val();
    var confirma = $("#confirma").val();

    var r = confirm("¿Desea eliminar al Paciente?");
    if (r == true) {
        $.ajax({
            url: 'gui/view/VistaBuscarPaciente.php',
            type: 'post',
            data: {
                idPacienteEliminar: idPacienteEliminar,
                empresa: empresa,
                fechaInicio: fechaInicio,
                fechaFin: fechaFin,
                dni: dni,
                nombres: nombres,
                apellidos: apellidos,
                confirma: confirma
            }
        }).done(function (msg) {
            $("#principal").html(msg);
        });
    }
}

// function eliminar_archivo(idArchivo) {
//
//     // alert(idArchivo);
//
//
//     $.ajax({
//         //url:'dal/DALArchivo.php',
//         url:'gui/view/VistaBuscarEmpresa.php',
//         type:'post',
//         data:{
//             idArchivo: idArchivo
//         }
//     }).done(function(msg){
//         $("#principal").html(msg);
//     });
// }

function eliminar (param) {
    //console.log('callback',e);
    //console.log($(e).attr("data-id"));
    var idArchivo = $(param).attr("data-id");


    console.log('dato para ajax en el modal', idArchivo);
    $.ajax({
        //url:'dal/DALArchivo.php',
        url:'gui/view/VistaBuscarEmpresa.php',
        type:'post',
        data:{
            idArchivo: idArchivo
        }
    }).done(function(msg){
        // $("#principal").html(msg);
        console.log(msg);
        // $("#principal").html(msg);
        window.location = 'http://localhost/audiologia/inicio.php#';
    });

}

$("a.generarmodal").click(function(e){
    var id = $(this).attr( "id" );
    //console.log('id selected', id);
    $("#modales").modal('show');
    $("#modales a.eliminar").attr("data-id",id);
});

// $("a.btn").click(function(e){
//     var id = $(this).attr( "id" );
//     //console.log('id selected', id);
//     $("#modales").modal('show');
//     $("#modales a.generar").attr("data-id",id);
//
//
// });




// function capturar() {
//     // var porId = document.getElementById("id").value;
//     var id = $("a").attr("id");
//     console.log('id',id);
//     alert(id);
// }

// $(document).on("click", ".data-id", function () {
//     // var myBookId = $(this).data('idArch');
//     var porId=document.getElementById('id').value;
//     alert(porId);
//
//     $("#idArch").val(porId);
//
// });

// function id_archivo(idArchivo) {
//     alert(idArchivo);
//     $.ajax({
//         //url:'dal/DALArchivo.php',
//         url:'gui/view/VistaBuscarEmpresa.php',
//         type:'post',
//         data:{
//             idArchivo: idArchivo
//         }
//     }).done(function(msg){
//         // $("#principal").html(msg);
//         $(".modal").html(msg);
//     });
// }



// $ (document) .ready (function () {
//     $("#archivo").click(function(){
//
//         var ID_modal = $(this).attr("data-id");
//
//         alert (ID_modal);
//
//         $.ajax({
//             url:'gui/view/VistaBuscarEmpresa.php',
//             type: 'POST',
//             data: {
//                 ID_modal: ID_modal
//             },
//             success: function(msg){
//                 $("#principal").html(msg);
//             }
//         })
//     });
// });


function buscarEmpresa() {
    $.ajax({
        url: 'gui/view/VistaBuscarEmpresa.php',
        type: 'post',
        data: {}
    }).done(function (msg) {
        $("#principal").html(msg);
    });
}

function buscarEmpresaFiltro() {

    var empresa = $("#empresa").val();
    var fechaInicio = $("#fechaInicio").val();
    var fechaFin = $("#fechaFin").val();
    var confirma = $("#confirma").val();

    if (empresa == 0) {
        alert("Seleccione una empresa!");
    } else {
        if ((Date.parse(fechaInicio) > Date.parse(fechaFin)) || fechaInicio == '' || fechaFin == '') {
            alert("Elija un rango de fechas correcto!");
        } else {
            $.ajax({
                url: 'gui/view/VistaBuscarEmpresa.php',
                type: 'post',
                data: {
                    empresa: empresa,
                    fechaInicio: fechaInicio,
                    fechaFin: fechaFin,
                    confirma: confirma
                }
            }).done(function (msg) {
                $("#principal").html(msg);
            });
        }
    }
}

function nuevoUsuario() {
    $.ajax({
        url: 'gui/view/VistaNuevoUsuario.php',
        type: 'post',
        data: {}
    }).done(function (msg) {
        $("#principal").html(msg);
    });
}

function agregarUsuario() {

    if ($("#nombre").val() == '') {
        alert("Ingrese Nombres y Apellidos");
    } else {
        if ($("#usuario").val() == '') {
            alert("Ingrese Usuario");
        } else {
            if ($("#contrasenia").val() == '') {
                alert("Ingrese Contraseña");
            } else {
                if ($("#rol").val() == 0) {
                    alert("Seleccione Rol");
                } else {
                    if ($("#estado").val() == -1) {
                        alert("Seleccione Estado");
                    } else {
                        var id = $("#id").val();
                        if (id != '' && id != null) {
                            id = id
                        } else {
                            id = -1
                        }
                        ;
                        var nombre = $("#nombre").val();
                        var usuario = $("#usuario").val();
                        var contrasenia = $("#contrasenia").val();
                        var estado = $("#estado").val();
                        var rol = $("#rol").val();

                        $.ajax({
                            url: 'gui/view/VistaNuevoUsuario.php',
                            type: 'post',
                            data: {
                                id: id,
                                nombre: nombre,
                                usuario: usuario,
                                contrasenia: contrasenia,
                                estado: estado,
                                rol: rol
                            }
                        }).done(function (msg) {
                            $("#principal").html(msg);
                        });
                    }
                }
            }
        }
    }
}

function editarUsuario(idUsuarioEditar) {
    $.ajax({
        url: 'gui/view/VistaNuevoUsuario.php',
        type: 'post',
        data: {
            idUsuarioEditar: idUsuarioEditar
        }
    }).done(function (msg) {
        $("#principal").html(msg);
    });
}

function eliminarUsuario(idUsuarioEliminar) {

    var r = confirm("¿Desea deshabilitar al Usuario?");
    if (r == true) {
        $.ajax({
            url: 'gui/view/VistaNuevoUsuario.php',
            type: 'post',
            data: {
                idUsuarioEliminar: idUsuarioEliminar
            }
        }).done(function (msg) {
            $("#principal").html(msg);
        });
    }
    ;
}

function nuevoRol() {
    $.ajax({
        url: 'gui/view/VistaNuevoRol.php',
        type: 'post',
        data: {}
    }).done(function (msg) {
        $("#principal").html(msg);
    });
}

function agregarRol() {

    if ($("#nombreRol").val() == '') {
        alert("Ingrese Nombre del Rol");
    } else {
        if ($("#estado").val() == -1) {
            alert("Seleccione Estado");
        } else {
            var id = $("#id").val();
            if (id != '' && id != null) {
                id = id
            } else {
                id = -1
            }
            ;
            var nombreRol = $("#nombreRol").val();
            var estado = $("#estado").val();

            $.ajax({
                url: 'gui/view/VistaNuevoRol.php',
                type: 'post',
                data: {
                    id: id,
                    nombreRol: nombreRol,
                    estado: estado
                }
            }).done(function (msg) {
                $("#principal").html(msg);
            });
        }
    }
}

function editarRol(idRolEditar) {
    $.ajax({
        url: 'gui/view/VistaNuevoRol.php',
        type: 'post',
        data: {
            idRolEditar: idRolEditar
        }
    }).done(function (msg) {
        $("#principal").html(msg);
    });
}

function eliminarRol(idRolEliminar) {

    var r = confirm("¿Desea deshabilitar el Rol?");
    if (r == true) {
        $.ajax({
            url: 'gui/view/VistaNuevoRol.php',
            type: 'post',
            data: {
                idRolEliminar: idRolEliminar
            }
        }).done(function (msg) {
            $("#principal").html(msg);
        });
    }
    ;
}

function cargarExcel() {
    $.ajax({
        url: 'gui/view/VistaCargarExcel.php',
        type: 'post',
        data: {}
    }).done(function (msg) {
        $("#principal").html(msg);
    });
}

function reportes() {
    $.ajax({
        url: 'gui/view/VistaReportes.php',
        type: 'post',
        data: {}
    }).done(function (msg) {
        $("#principal").html(msg);
    });
}

function gestionarPermisos() {
    $.ajax({
        url: 'gui/view/VistaGestionarPermisos.php',
        type: 'post',
        data: {}
    }).done(function (msg) {
        $("#principal").html(msg);
    });
}