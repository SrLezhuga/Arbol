$(document).ready(function() {
    showSistemas();
});

function getBusqueda() {
    var busqueda = $("#txtBuscar").val();

    $.ajax({
        url: "controller/sistemas/busqueda.php",
        type: "post",
        data: {
            Rs: busqueda
        },
        beforeSend: function() {
            //imagen de carga
            $("#item_sistemas").html("<div class='col-6'><img class='mx-auto d-block' src='assets/media/img/loader/spinning.gif'></div>");
        },
        error: function() {
            alert("error petición ajax");
        },
        success: function(data) {
            setTimeout(function() {
                $("#item_sistemas").empty();
                $("#item_sistemas").append(data);
                if (!busqueda) {
                    $("#txt_sistema").html("TODOS LOS SISTEMAS");
                } else {
                    $("#txt_sistema").html("Resultado de " + busqueda);
                }
            }, 250);
        }
    });
}

$('.btn_sistema').on('click', function() {
    var id_button = $(this).val();
    getSistema(id_button);
});

function getSistema(busqueda) {

    $.ajax({
        url: "controller/sistemas/busqueda.php",
        type: "post",
        data: {
            Rs: busqueda
        },
        beforeSend: function() {
            //imagen de carga
            $("#item_sistemas").html("<div class='col-6'><img class='mx-auto d-block' src='assets/media/img/loader/spinning.gif'></div>");
        },
        error: function() {
            alert("error petición ajax");
        },
        success: function(data) {
            setTimeout(function() {
                $("#item_sistemas").empty();
                $("#item_sistemas").append(data);
                if (!busqueda) {
                    $("#txt_sistema").html("TODOS LOS SISTEMAS");
                } else {
                    $("#txt_sistema").html("Sistema de " + busqueda);
                }
                $("#txtBuscar").val('');
            }, 250);
        }
    });
}

function showSistemas() {

    $.ajax({
        url: "controller/sistemas/precarga.php",
        type: "post",
        beforeSend: function() {
            //imagen de carga
            $("#item_sistemas").html("<div class='col-6'><img class='mx-auto d-block' src='assets/media/img/loader/spinning.gif'></div>");
        },
        error: function() {
            alert("error petición ajax");
        },
        success: function(data) {
            setTimeout(function() {
                $("#item_sistemas").empty();
                $("#item_sistemas").append(data);
            }, 250);
        }
    });
}