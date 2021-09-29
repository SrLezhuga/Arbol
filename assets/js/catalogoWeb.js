//Main loader
$(document).ready(function() {
    loadSelectCatalogoWeb();
    desactivarCatalogoWeb();
});

//Catalogo Web
function verCatalogoWeb() {
    $('#modalNombreCatalogoWeb').html($("#nombre_catalogo_web").val());
    $('#modalInfoCatalogoWeb').html($("#info_catalogo_web").val());
    $('#modalUrlCatalogoWeb').attr('href', $("#url_catalogo_web").val());
    $('#modalImgCatalogoWeb').attr('src', $('.img_catalogo_web').attr('src'));
    $('#modalCatalogoWeb').modal({
        show: true
    });
}

function loadSelectCatalogoWeb() {
    $.ajax({
        type: "POST",
        url: "controller/catalogo/getSelectWeb.php",
        success: function(data) {
            $('#formCatalogoWeb').empty();
            $("#formCatalogoWeb").append(data);
        }
    });
}

function activeCatalogoWeb() {
    $("#info_catalogo_web").prop("disabled", false);
    $("#url_catalogo_web").prop("disabled", false);
    $("#nombre_catalogo_web").prop("disabled", false);
    $("#imgCatalogoWeb").prop("disabled", false);
    $("#img_file_catalogo_web").prop("disabled", false);
    $("#btn-guardar-catalogoWeb").prop("disabled", false);
    $("#btn-ver-catalogoWeb").prop("disabled", false);
}

function desactivarCatalogoWeb() {
    $("input:checkbox[name=CheckBoxCatalogoWeb]").attr("checked", false);
    $(".img_catalogo_web").attr("src", "assets/media/img/loader/PlaceholderWeb.png");
    $("#info_catalogo_web").prop("disabled", true);
    $("#url_catalogo_web").prop("disabled", true);
    $("#nombre_catalogo_web").prop("disabled", true);
    $("#InputFileArchivo").prop("disabled", true);
    $("#imgCatalogoWeb").prop("disabled", true);
    $("#img_file_catalogo_web").prop("disabled", true);
    $("#btn-guardar-catalogoWeb").prop("disabled", true);
    $("#btn-ver-catalogoWeb").prop("disabled", true);
}

function limpiarCatalogoWeb() {
    $("#formCatalogoWeb").val('').attr('selected', 'selected');
    $("#info_catalogo_web").val('');
    $("#url_catalogo_web").val('');
    $("#nombre_catalogo_web").val('');
    $("#InputFileArchivo").val('');
    $("#imgCatalogoWeb").val('');
    $("#img_file_catalogo_web").val('');
    desactivarCatalogoWeb();
    Swal.fire("Mensaje de aviso", "Se limpio el formulario", "success");
}

function resetCatalogoWeb() {
    $("#formCatalogoWeb").val('').attr('selected', 'selected');
    $("#info_catalogo_web").val('');
    $("#url_catalogo_web").val('');
    $("#nombre_catalogo_web").val('');
    $("#InputFileArchivo").val('');
    $("#imgCatalogoWeb").val('');
    $("#img_file_catalogo_web").val('');
    desactivarCatalogoWeb();
}

function nuevoCatalogoWeb() {
    $("#formCatalogoWeb").val('').attr('selected', 'selected');
    $("#id_catalogo_web").val('null');
    $("#info_catalogo_web").val('');
    $("#url_catalogo_web").val('');
    $("#nombre_catalogo_web").val('');
    $("#InputFileArchivo").val('');
    $("#imgCatalogoWeb").val('');
    $("#img_file_catalogo_web").val('');
    $("input:checkbox[name=CheckBoxCatalogoWeb]").attr("checked", true);
    $(".img_catalogo_web").attr("src", "assets/media/img/loader/PlaceholderWeb.png");
    activeCatalogoWeb();
    Swal.fire("Mensaje de aviso", "Se activo el formulario", "success");
}

function getCatalogoWeb() {
    var Catalogo = $("#formCatalogoWeb").val();
    $.ajax({
        url: "controller/catalogo/getCatalogoWeb.php",
        type: "post",
        data: {
            Cat: Catalogo
        },
        success: function(data) {
            var obj = JSON.parse(data);
            if (obj.status == "ok") {
                $(".img_catalogo_web").attr("src", "assets/media/img/marcas/" + obj.img_catalogo_web);
                $("#img_file_catalogo_web").val(obj.img_catalogo_web);
                $("#id_catalogo_web").val(obj.id_catalogo_web);
                $("#info_catalogo_web").val(obj.info_catalogo_web);
                $("#url_catalogo_web").val(obj.url_catalogo_web);
                $("#nombre_catalogo_web").val(obj.nombre_catalogo_web);
                if (obj.active == 'Y') {
                    var condiciones = $("#CheckBoxCatalogoWeb").is(":checked");
                    $("#CheckBoxCatalogoWeb").prop("checked", true);
                } else {
                    $("#CheckBoxCatalogoWeb").prop("checked", false);
                }
                activeCatalogoWeb();
            } else {
                Swal.fire("Mensaje de aviso", "Error: Vuelve a intentarlo mas tarde", "error");
            }
        }
    });
}

function guardarCatalogoWeb() {
    var formData = new FormData();
    var catalogo = $('#id_catalogo_web').val();

    var informacion = $("#info_catalogo_web").val();
    if (informacion.length == 0) {
        Swal.fire("Mensaje de confirmación", "Campo información sin llenar", "error");
        return;
    }
    var url = $("#url_catalogo_web").val();
    if (url.length == 0) {
        Swal.fire("Mensaje de confirmación", "Campo url sin llenar", "error");
        return;
    }
    var titulo = $("#nombre_catalogo_web").val();
    if (titulo.length == 0) {
        Swal.fire("Mensaje de confirmación", "Campo titulo sin llenar", "error");
        return;
    }
    var img = $("#img_file_catalogo_web").val();
    if (catalogo == 'null' && (img.length == 0 || img == 'Selecciona Archivo de Imagen')) {
        Swal.fire("Mensaje de confirmación", "No seleccionaste una imagen", "error");
        return;
    }
    var condiciones = $("#CheckBoxCatalogoWeb").is(":checked");
    if (!condiciones) {
        var activo = "N";
    } else {
        var activo = "Y";
    }
    var imgCatalogoWeb = $("#imgCatalogoWeb")[0].files.length;
    if (imgCatalogoWeb != 0) {
        var imgCatalogoWeb = $("#imgCatalogoWeb")[0].files[0];
    }
    formData.append("catalogo", catalogo);
    formData.append("informacion", informacion);
    formData.append("url", url);
    formData.append("titulo", titulo);
    formData.append("activo", activo);
    formData.append("img", img);
    formData.append("imgCatalogoWeb", imgCatalogoWeb);
    $.ajax({
        url: "controller/catalogo/upCatalogoWeb.php",
        type: "post",
        data: formData,
        contentType: false,
        processData: false,
        success: function(data) {
            var obj = JSON.parse(data);
            if (obj.status == "ok") {
                Swal.fire("Mensaje de confirmación", obj.msj, "success");
                resetCatalogoWeb();
                loadSelectCatalogoWeb();
            } else {
                Swal.fire("Mensaje de confirmación", obj.msj, "error");
            }
        }
    });
}
$(function() {
    //Catalogo 
    $('#imgCatalogoWeb').change(function() {
        var input = this;
        var url = $(this).val();
        var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
        var dir = url.substring(url.lastIndexOf('/') + 1);
        var img = dir.substring(dir.lastIndexOf('\\') + 1);
        if (input.files && input.files[0] && (ext == "webp" || ext == "png" || ext == "jpeg" || ext == "jpg")) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('.img_catalogo_web').attr('src', e.target.result);
                $("#img_file_catalogo_web").val(img);
            }
            reader.readAsDataURL(input.files[0]);
        } else {
            $('.img_catalogo_web').attr('src', 'assets/media/img/loader/PlaceholderWeb.png');
            $('#imgCatalogoWeb').val('');
            $("#img_file_catalogo_web").val('Selecciona Archivo de Imagen');
            Swal.fire("Mensaje de aviso", "Error: Solo se permiten imagenes", "error");
        }
    });
});