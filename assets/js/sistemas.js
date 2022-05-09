    //Main loader
    $(document).ready(function() {
        loadSelectSistemas();
        desactivarSistemas();
    });

    //Catalogo Sistema
    function verModalSistemas() {
        $('#modalNombreSistemas').html($("#nombre_sistema").val());
        $('#modalInfoSistemas').html($("#info_sistema").val());
        $('#modalImgSistema').attr('src', $('.img_Sistema').attr('src'));
        $('#modalSistemas').modal({
            show: true
        });
    }

    function loadSelectSistemas() {
        $.ajax({
            type: "POST",
            url: "controller/sistemas/getSelect.php",
            success: function(data) {
                $('#formSistemas').empty();
                $("#formSistemas").append(data);
            }
        });
    }

    function activeSistemas() {
        $("#info_sistema").prop("disabled", false);
        $("#nombre_sistema").prop("disabled", false);
        $("#imgSistema").prop("disabled", false);
        $("#img_file_sistema").prop("disabled", false);
        $("#btn-guardar-sistemas").prop("disabled", false);
        $("#btn-ver-sistemas").prop("disabled", false);
    }

    function desactivarSistemas() {
        $("input:checkbox[name=CheckBoxSistema]").attr("checked", false);
        $(".img_Sistema").attr("src", "assets/media/img/loader/PlaceholderWeb.png");
        $("#info_sistema").prop("disabled", true);
        $("#nombre_sistema").prop("disabled", true);
        $("#imgSistema").prop("disabled", true);
        $("#img_file_sistema").prop("disabled", true);
        $("#btn-guardar-sistemas").prop("disabled", true);
        $("#btn-ver-sistemas").prop("disabled", true);
    }

    function limpiarSistemas() {
        $("#formSistemas").val('').attr('selected', 'selected');
        $("#info_sistema").val('');
        $("#nombre_sistema").val('');
        $("#imgSistema").val('');
        $("#img_file_sistema").val('');
        desactivarSistemas();
        Swal.fire("Mensaje de aviso", "Se limpio el formulario", "success");
    }

    function resetSistemas() {
        $("#formSistemas").val('').attr('selected', 'selected');
        $("#info_sistema").val('');
        $("#nombre_sistema").val('');
        $("#imgSistema").val('');
        $("#img_file_sistema").val('');
        desactivarSistemas();
    }

    function nuevoSistemas() {
        $("#formSistemas").val('').attr('selected', 'selected');
        $("#id_sistema").val('null');
        $("#info_sistema").val('');
        $("#nombre_sistema").val('');
        $("#imgSistema").val('');
        $("#img_file_sistema").val('');
        $("input:checkbox[name=CheckBoxSistema]").attr("checked", true);
        $(".img_Sistema").attr("src", "assets/media/img/loader/PlaceholderWeb.png");
        activeSistemas();
        Swal.fire("Mensaje de aviso", "Se activo el formulario", "success");
    }

    function getSistemas() {
        var Sistema = $("#formSistemas").val();
        $.ajax({
            url: "controller/sistemas/getSistemas.php",
            type: "post",
            data: {
                Sis: Sistema
            },
            success: function(data) {

                var obj = JSON.parse(data);
                if (obj.status == "ok") {
                    $(".img_Sistema").attr("src", "assets/media/img/iconos/" + obj.img_linea);
                    $("#img_file_sistema").val(obj.img_linea);
                    $("#id_sistema").val(obj.id_linea);
                    $("#info_sistema").val(obj.info_linea);
                    $("#nombre_sistema").val(obj.nombre_linea);
                    if (obj.active == 'Y') {
                        $("#CheckBoxSistema").prop("checked", true);
                    } else {
                        $("#CheckBoxSistema").prop("checked", false);
                    }
                    activeSistemas();
                } else {
                    Swal.fire("Mensaje de aviso", "Error: Vuelve a intentarlo mas tarde", "error");
                }
            }
        });
    }

    function guardarSistemas() {
        var formData = new FormData();
        var sistemas = $('#id_sistema').val();

        var informacion = $("#info_sistema").val();
        if (informacion.length == 0) {
            Swal.fire("Mensaje de confirmación", "Campo información sin llenar", "error");
            return;
        }
        var titulo = $("#nombre_sistema").val();
        if (titulo.length == 0) {
            Swal.fire("Mensaje de confirmación", "Campo nombre sin llenar", "error");
            return;
        }
        var img = $("#img_file_sistema").val();
        if (sistemas == 'null' && (img.length == 0 || img == 'Selecciona Archivo de Imagen')) {
            Swal.fire("Mensaje de confirmación", "No seleccionaste una imagen", "error");
            return;
        }
        var condiciones = $("#CheckBoxSistema").is(":checked");
        if (!condiciones) {
            var activo = "N";
        } else {
            var activo = "Y";
        }
        var imgSistema = $("#imgSistema")[0].files.length;
        if (imgSistema != 0) {
            var imgSistema = $("#imgSistema")[0].files[0];
        }
        formData.append("sistemas", sistemas);
        formData.append("informacion", informacion);
        formData.append("titulo", titulo);
        formData.append("activo", activo);
        formData.append("img", img);
        formData.append("imgSistema", imgSistema);
        $.ajax({
            url: "controller/sistemas/upSistemas.php",
            type: "post",
            data: formData,
            contentType: false,
            processData: false,
            success: function(data) {
                console.log(data);
                var obj = JSON.parse(data);
                if (obj.status == "ok") {
                    Swal.fire("Mensaje de confirmación", obj.msj, "success");
                    resetSistemas();
                    loadSelectSistemas();
                } else {
                    Swal.fire("Mensaje de confirmación", obj.msj, "error");
                }
            }
        });
    }
    $(function() {
        //Catalogo 
        $('#imgSistema').change(function() {
            var input = this;
            var url = $(this).val();
            var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
            var dir = url.substring(url.lastIndexOf('/') + 1);
            var img = dir.substring(dir.lastIndexOf('\\') + 1);
            if (input.files && input.files[0] && (ext == "webp" || ext == "png" || ext == "jpeg" || ext == "jpg")) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('.img_Sistema').attr('src', e.target.result);
                    $("#img_file_sistema").val(img);
                }
                reader.readAsDataURL(input.files[0]);
            } else {
                $('.img_Sistema').attr('src', 'assets/media/img/loader/PlaceholderCatalogo.png');
                $('#imgSistema').val('');
                $("#img_file_sistema").val('Selecciona Archivo de Imagen');
                Swal.fire("Mensaje de aviso", "Error: Solo se permiten imagenes", "error");
            }
        });
    });