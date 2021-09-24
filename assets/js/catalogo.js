//Main loader
$(document).ready(function() {
    loadSelectCatalogo();
    desactivarCatalogo();
});

//Catalogo
function verCatalogo() {
    $('#modalTituloCatalogo').html($("#titulo_catalogo").val());
    $('#modalSubtituloCatalogo').html($("#subtitulo_catalogo").val() + '<br>' + $("#fecha_catalogo").val());
    $('#modalImgCatalogo').attr('src', $('.Img-Catalogo').attr('src'));
    $('#modalCatalogo').modal({
        show: true
    });
}

function loadSelectCatalogo() {
    $.ajax({
        type: "POST",
        url: "controller/catalogo/getSelect.php",
        success: function(data) {
            $('#formCatalogo').empty();
            $("#formCatalogo").append(data);
        }
    });
}

function activeCatalogo() {
    $("#marca_catalogo").prop("disabled", false);
    $("#titulo_catalogo").prop("disabled", false);
    $("#subtitulo_catalogo").prop("disabled", false);
    $("#fecha_catalogo").prop("disabled", false);
    $("#archivo_catalogo").prop("disabled", false);
    $("#InputFileArchivo").prop("disabled", false);
    $("#imgCatalogo").prop("disabled", false);
    $("#img_catalogo").prop("disabled", false);
    $("#textareaCatalogo").prop("disabled", false);
    $("#btn-guardar-catalogo").prop("disabled", false);
    $("#btn-ver-catalogo").prop("disabled", false);

}

function desactivarCatalogo() {
    $("input:checkbox[name=CheckBoxCatalogo]").attr("checked", false);
    $(".Img-Catalogo").attr("src", "assets/media/img/loader/Placeholder.png");
    $("#marca_catalogo").prop("disabled", true);
    $("#titulo_catalogo").prop("disabled", true);
    $("#subtitulo_catalogo").prop("disabled", true);
    $("#fecha_catalogo").prop("disabled", true);
    $("#archivo_catalogo").prop("disabled", true);
    $("#InputFileArchivo").prop("disabled", true);
    $("#imgCatalogo").prop("disabled", true);
    $("#img_catalogo").prop("disabled", true);
    $("#textareaCatalogo").prop("disabled", true);
    $("#btn-guardar-catalogo").prop("disabled", true);
    $("#btn-ver-catalogo").prop("disabled", true);


}

function limpiarCatalogo() {
    $("#formCatalogo").val('').attr('selected', 'selected');
    $("#marca_catalogo").val('');
    $("#titulo_catalogo").val('');
    $("#subtitulo_catalogo").val('');
    $("#fecha_catalogo").val('');
    $("#archivo_catalogo").val('');
    $("#InputFileArchivo").val('');
    $("#imgCatalogo").val('');
    $("#textareaCatalogo").val('');
    $("#img_catalogo").val('');
    desactivarCatalogo();
    Swal.fire("Mensaje de aviso", "Se limpio el formulario", "success");
}

function resetCatalogo() {
    $("#formCatalogo").val('').attr('selected', 'selected');
    $("#marca_catalogo").val('');
    $("#titulo_catalogo").val('');
    $("#subtitulo_catalogo").val('');
    $("#fecha_catalogo").val('');
    $("#archivo_catalogo").val('');
    $("#InputFileArchivo").val('');
    $("#imgCatalogo").val('');
    $("#textareaCatalogo").val('');
    $("#img_catalogo").val('');
    desactivarCatalogo();
}

function nuevoCatalogo() {
    $("#formCatalogo").val('').attr('selected', 'selected');
    $("#marca_catalogo").val('');
    $("#titulo_catalogo").val('');
    $("#subtitulo_catalogo").val('');
    $("#fecha_catalogo").val('');
    $("#archivo_catalogo").val('');
    $("#InputFileArchivo").val('');
    $("#imgCatalogo").val('');
    $("#textareaCatalogo").val('');
    $("#img_catalogo").val('');
    $("input:checkbox[name=CheckBoxCatalogo]").attr("checked", true);
    $(".Img-Catalogo").attr("src", "assets/media/img/loader/Placeholder.png");
    activeCatalogo();
    Swal.fire("Mensaje de aviso", "Se activo el formulario", "success");
}



function getCatalogo() {
    var Catalogo = $("#formCatalogo").val();
    $.ajax({
        url: "controller/catalogo/getCatalogo.php",
        type: "post",
        data: {
            Cat: Catalogo
        },
        success: function(data) {
            var obj = JSON.parse(data);
            if (obj.status == "ok") {
                $(".Img-Catalogo").attr("src", "files/" + obj.img_catalogo);
                $("#img_catalogo").val(obj.img_catalogo);

                $("#id_catalogo").val(obj.id_catalogo);
                $("#marca_catalogo").val(obj.marca_catalogo);
                $("#titulo_catalogo").val(obj.titulo_catalogo);
                $("#subtitulo_catalogo").val(obj.subtitulo_catalogo);
                $("#fecha_catalogo").val(obj.fecha_catalogo);
                $("#archivo_catalogo").val(obj.archivo_catalogo);
                $("#textareaCatalogo").val(obj.etiquetas);
                if (obj.activo == 'Y') {
                    var condiciones = $("#CheckBoxCatalogo").is(":checked");
                    $("#CheckBoxCatalogo").prop("checked", true);
                } else {
                    $("#CheckBoxCatalogo").prop("checked", false);
                }
                activeCatalogo();
            } else {
                Swal.fire("Mensaje de aviso", "Error: Vuelve a intentarlo mas tarde", "error");
            }
        }
    });
}

function guardarCatalogo() {
    var formData = new FormData();

    var catalogo = $('#id_catalogo').val();
    if (catalogo.length == 0) {
        var catalogo = 'nuevo';
    }

    var marca = $("#marca_catalogo").val();
    if (marca.length == 0) {
        Swal.fire("Mensaje de confirmación", "Campo marca sin llenar", "error");
        return;
    }
    var titulo = $("#titulo_catalogo").val();
    if (titulo.length == 0) {
        Swal.fire("Mensaje de confirmación", "Campo titulo sin llenar", "error");
        return;
    }
    var subtitulo = $("#subtitulo_catalogo").val();
    if (subtitulo.length == 0) {
        Swal.fire("Mensaje de confirmación", "Campo subtitulo sin llenar", "error");
        return;
    }
    var fecha = $("#fecha_catalogo").val();
    if (fecha.length == 0) {
        Swal.fire("Mensaje de confirmación", "Campo fecha sin llenar", "error");
        return;
    }
    var archivo = $("#archivo_catalogo").val();
    if (catalogo == 'nuevo' && (archivo.length == 0 || archivo == 'Selecciona Archivo PDF')) {
        Swal.fire("Mensaje de confirmación", "No seleccionaste un PDF", "error");
        return;
    }
    var img = $("#img_catalogo").val();
    if (catalogo == 'nuevo' && (img.length == 0 || img == 'Selecciona Archivo de Imagen')) {
        Swal.fire("Mensaje de confirmación", "No seleccionaste una imagen", "error");
        return;
    }
    var txt = $("#textareaCatalogo").val();
    if (txt.length == 0) {
        txt = 'Sin Etiquetas';
    }

    var condiciones = $("#CheckBoxCatalogo").is(":checked");
    if (!condiciones) {
        var activo = "N";
    } else {
        var activo = "Y";
    }

    var imgCatalogo = $("#imgCatalogo")[0].files.length;
    if (imgCatalogo != 0) {
        var imgCatalogo = $("#imgCatalogo")[0].files[0];
    }

    var archivoCatalogo = $("#InputFileArchivo")[0].files.length;
    if (archivoCatalogo != 0) {
        var archivoCatalogo = $("#InputFileArchivo")[0].files[0];
    }

    formData.append("catalogo", catalogo);
    formData.append("marca", marca);
    formData.append("titulo", titulo);
    formData.append("subtitulo", subtitulo);
    formData.append("fecha", fecha);
    formData.append("activo", activo);
    formData.append("archivo", archivo);
    formData.append("img", img);
    formData.append("txt", txt);
    formData.append("imgCatalogo", imgCatalogo);
    formData.append("archivoCatalogo", archivoCatalogo);

    $.ajax({
        url: "controller/catalogo/upCatalogo.php",
        type: "post",
        data: formData,
        contentType: false,
        processData: false,
        success: function(data) {
            var obj = JSON.parse(data);
            if (obj.status == "ok") {
                Swal.fire("Mensaje de confirmación", obj.msj, "success");
                resetCatalogo();
                loadSelectCatalogo();
            } else {
                Swal.fire("Mensaje de confirmación", obj.msj, "error");
            }
        }
    });
}

$(function() {

    //Catalogo
    $('#imgCatalogo').change(function() {
        var input = this;
        var url = $(this).val();
        var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
        var dir = url.substring(url.lastIndexOf('/') + 1);
        var img = dir.substring(dir.lastIndexOf('\\') + 1);
        if (input.files && input.files[0] && (ext == "webp" || ext == "png" || ext == "jpeg" || ext == "jpg")) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('.Img-Catalogo').attr('src', e.target.result);
                $("#img_catalogo").val(img);
            }
            reader.readAsDataURL(input.files[0]);
        } else {
            $('.Img-Catalogo').attr('src', 'assets/media/img/loader/Placeholder.png');
            $('#imgCatalogo').val('');
            $("#img_catalogo").val('Selecciona Archivo de Imagen');
            Swal.fire(
                "Mensaje de aviso",
                "Error: Solo se permiten imagenes",
                "error"
            );
        }
    });

    //Input
    $('#InputFileArchivo').change(function() {
        var input = this;
        var url = $(this).val();
        var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
        var prefile = url.substring(url.lastIndexOf('\\') + 1);
        if (input.files && input.files[0] && (ext == "pdf")) {
            $('#archivo_catalogo').val(prefile);
        } else {
            Swal.fire(
                "Mensaje de aviso",
                "Error: Solo se permiten archivos PDF",
                "error"
            );
            $('#archivo_catalogo').val('Selecciona Archivo PDF');
            $('#InputFileArchivo').val('');
        }
    });

});