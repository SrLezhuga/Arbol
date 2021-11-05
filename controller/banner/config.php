<fieldset class="border p-2 bg-white shadow-lg">
    <legend class="w-auto"><b>Banner:</b></legend>

    <div class="row">
        <div class="col-8">
            <div class="input-group mb-1">
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-book-open"></i></span>
                <select id="formDirectorio" name="formDirectorio" class="form-select form-select-lg" aria-label="Default select example" onchange="getDirectorio();"></select>
            </div>
        </div>
        <div class="col-2">
            <div class="d-grid gap-2">
                <button class="btn btn-lg btn-secondary" id="btn-crear-catalogo" type="button" onclick="nuevoDirectorio()">Nuevo <i class="fas fa-plus-square"></i></button>
            </div>
        </div>
        <div class="col-2">
            <div class="d-grid gap-2">
                <button class="btn btn-lg btn-danger" id="btn-guardar-directorio" type="button" onclick="guardarDirectorio()">Guardar <i class="fas fa-save"></i></button>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-9">
            <div class="row">
                <div class="col-12">
                    <div class="form-floating mb-1">
                        <input type="hidden" class="form-control form-reset" id="id_cedis" placeholder="Id" autocomplete="off">
                        <label for="id_cedis"><i class="fas fa-bookmark"></i> Id</label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="file-field">
                        <div class="form-floating mb-1">
                            <input type="text" class="form-control form-reset" id="img_directorio" placeholder="Imagen" autocomplete="off">
                            <label for="img_directorio"><i class="fas fa-bookmark"></i> Imagen Cedis</label>
                        </div>
                        <input id="imgDirectorio" type="file">
                    </div>
                </div>
                <div class="col-6">
                    <div class="file-field">
                        <div class="form-floating mb-1">
                            <input type="text" class="form-control form-reset" id="img_logo_cedis" placeholder="Imagen" autocomplete="off">
                            <label for="img_logo_cedis"><i class="fas fa-bookmark"></i> Logo Cedis</label>
                        </div>
                        <input id="imgLogoCedis" type="file">
                    </div>
                </div>
                <div class="file-field mb-1">
                    <figure class="figure">
                        <img class="Img-Cedis mx-auto d-block img-thumbnail figure-img" src="assets/media/img/loader/Placeholder.png" onerror="this.src='assets/media/img/loader/Placeholder.png';" style="width: 100%; height: 125px;">
                        <figcaption class="figure-caption">Tamaño: 1250 x 500 pixeles</figcaption>
                    </figure>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="file-field mb-1">
                <figure class="figure">
                    <img class="Img-Logo-Cedis mx-auto d-block img-thumbnail figure-img" src="assets/media/img/loader/PlaceholderWeb.png" onerror="this.src='assets/media/img/loader/PlaceholderWeb.png';" style="width: 100%; height: 200px;">
                    <figcaption class="figure-caption">Tamaño: 530 x 330 pixeles</figcaption>
                </figure>
            </div>
        </div>
        <hr>
        <div class="col-12">
            <div class="row">
                <div class="col-3">
                    <div class="d-grid gap-2 mb-1">
                        <button class="btn btn-secondary" id="btn-ver-directorio" onclick="verCatalogo()" type="button" data-bs-toggle="modal" data-bs-target="#modalCatalogo">Vista Previa <i class="fas fa-eye"></i></button>
                    </div>
                </div>
                <div class="col-3">
                    <div class="d-grid gap-2 mb-1">
                        <button class="btn btn-danger" type="button" onclick="limpiarDirectorio()">Limpiar Formulario <i class="fas fa-eraser"></i></button>
                    </div>
                </div>
                <div class="col-6" style="font-size: 1.5rem;">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="CheckBoxDirectorio" name="CheckBoxDirectorio" value="Y">
                        <label class="form-check-label" for="CheckBoxDirectorio">Visible</label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalCatalogo" tabindex="-1" aria-labelledby="modalLabelCatalogo" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabelCatalogo">Vista Prevía</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="justify-content-center align-items-center">
                        <!--Item card -->
                        <div class='cards rounded border align-items-center text-center align-self-center' style="left: 50%; transform: translate(-50%, 0%);">
                            <img class='rounded' src='' id="modalImgDirectorio">
                            <div class='cards-desc rounded'>
                                <div class='cards-div'>
                                    <h4 class='mitr' id="modaldireccion_cedisCatalogo"></h4>
                                    <h6 class='glacial small' id="modalcol_cedisCatalogo"></h6>
                                    <div class='d-grid gap-2'>
                                        <btn class='btn btn-sm btn-danger small' type='button' disabled><i class='far fa-eye'></i> Ver Online</btn>
                                        <btn class='btn btn-sm btn-danger small' type='button' disabled><i class='fas fa-file-download'></i> Descargar</btn>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</fieldset>
<script>
    //Main loader
    $(document).ready(function() {
        loadSelectDirectorio();
        desactivarDirectorio();
    });

    //Catalogo
    function verCatalogo() {
        $('#modaldireccion_cedisCatalogo').html($("#direccion_cedis").val());
        $('#modalcol_cedisCatalogo').html($("#col_cedis").val() + '<br>' + $("#cp_cedis").val());
        $('#modalImgDirectorio').attr('src', $('.Img-Cedis').attr('src'));
        $('#modalCatalogo').modal({
            show: true
        });
    }

    function loadSelectDirectorio() {
        $.ajax({
            type: "POST",
            url: "controller/directorio/getSelect.php",
            success: function(data) {
                $('#formDirectorio').empty();
                $("#formDirectorio").append(data);
            }
        });
    }

    function activeDirectorio() {
        $("#cedis").prop("disabled", false);
        $("#direccion_cedis").prop("disabled", false);
        $("#col_cedis").prop("disabled", false);
        $("#cp_cedis").prop("disabled", false);
        $("#archivo_catalogo").prop("disabled", false);
        $("#InputFileArchivo").prop("disabled", false);
        $("#imgDirectorio").prop("disabled", false);
        $("#img_directorio").prop("disabled", false);
        $("#textareaMap_cedis").prop("disabled", false);
        $("#btn-guardar-directorio").prop("disabled", false);
        $("#btn-ver-directorio").prop("disabled", false);
        $("#mun_cedis").prop("disabled", false);
        $("#est_cedis").prop("disabled", false);
        $("#email_cedis").prop("disabled", false);
        $("#tel_info").prop("disabled", false);
        $("#tel_ventas").prop("disabled", false);
        $("#img_logo_cedis").prop("disabled", false);
        $("#imgLogoCedis").prop("disabled", false);
    }

    function desactivarDirectorio() {
        $("input:checkbox[name=CheckBoxDirectorio]").attr("checked", false);
        $(".Img-Cedis").attr("src", "assets/media/img/loader/Placeholder.png");
        $(".Img-Logo-Cedis").attr("src", "assets/media/img/LogoRojo.png");
        $("#cedis").prop("disabled", true);
        $("#direccion_cedis").prop("disabled", true);
        $("#col_cedis").prop("disabled", true);
        $("#cp_cedis").prop("disabled", true);
        $("#archivo_catalogo").prop("disabled", true);
        $("#InputFileArchivo").prop("disabled", true);
        $("#imgDirectorio").prop("disabled", true);
        $("#img_directorio").prop("disabled", true);
        $("#textareaMap_cedis").prop("disabled", true);
        $("#btn-guardar-directorio").prop("disabled", true);
        $("#btn-ver-directorio").prop("disabled", true);
        $("#mun_cedis").prop("disabled", true);
        $("#est_cedis").prop("disabled", true);
        $("#email_cedis").prop("disabled", true);
        $("#tel_info").prop("disabled", true);
        $("#tel_ventas").prop("disabled", true);
        $("#img_logo_cedis").prop("disabled", true);
        $("#imgLogoCedis").prop("disabled", true);
    }

    function limpiarDirectorio() {
        $("#formDirectorio").val('').attr('selected', 'selected');
        $("#cedis").val('');
        $("#direccion_cedis").val('');
        $("#col_cedis").val('');
        $("#cp_cedis").val('');
        $("#archivo_catalogo").val('');
        $("#InputFileArchivo").val('');
        $("#imgDirectorio").val('');
        $("#textareaMap_cedis").val('');
        $("#img_directorio").val('');
        $("#mun_cedis").val('');
        $("#est_cedis").val('');
        $("#email_cedis").val('');
        $("#tel_info").val('');
        $("#tel_ventas").val('');
        $("#img_logo_cedis").val('');
        $("#imgLogoCedis").val('');
        desactivarDirectorio();
        Swal.fire("Mensaje de aviso", "Se limpio el formulario", "success");
    }

    function resetCatalogo() {
        $("#formDirectorio").val('').attr('selected', 'selected');
        $("#cedis").val('');
        $("#direccion_cedis").val('');
        $("#col_cedis").val('');
        $("#cp_cedis").val('');
        $("#archivo_catalogo").val('');
        $("#InputFileArchivo").val('');
        $("#imgDirectorio").val('');
        $("#textareaMap_cedis").val('');
        $("#img_directorio").val('');
        $("#mun_cedis").val('');
        $("#est_cedis").val('');
        $("#email_cedis").val('');
        $("#tel_info").val('');
        $("#tel_ventas").val('');
        $("#img_logo_cedis").val('');
        $("#imgLogoCedis").val('');
        desactivarDirectorio();
    }

    function nuevoDirectorio() {
        $("#formDirectorio").val('').attr('selected', 'selected');
        $("#id_cedis").val('null');
        $("#cedis").val('');
        $("#direccion_cedis").val('');
        $("#col_cedis").val('');
        $("#cp_cedis").val('');
        $("#archivo_catalogo").val('');
        $("#InputFileArchivo").val('');
        $("#imgDirectorio").val('');
        $("#textareaMap_cedis").val('');
        $("#img_directorio").val('');
        $("#mun_cedis").val('');
        $("#est_cedis").val('');
        $("#email_cedis").val('');
        $("#tel_info").val('');
        $("#tel_ventas").val('');
        $("#img_logo_cedis").val('');
        $("#imgLogoCedis").val('');
        $("input:checkbox[name=CheckBoxDirectorio]").attr("checked", true);
        $(".Img-Cedis").attr("src", "assets/media/img/loader/Placeholder.png");
        activeDirectorio();
        Swal.fire("Mensaje de aviso", "Se activo el formulario", "success");
    }

    function getDirectorio() {
        var Directorio = $("#formDirectorio").val();
        $.ajax({
            url: "controller/directorio/getDirectorio.php",
            type: "post",
            data: {
                Dir: Directorio
            },
            success: function(data) {
                var obj = JSON.parse(data);
                if (obj.status == "ok") {
                    $(".Img-Cedis").attr("src", "assets/media/img/" + obj.img_cedis);
                    $("#img_directorio").val(obj.img_cedis);
                    $(".Img-Logo-Cedis").attr("src", "assets/media/img/iconos/" + obj.logo_cedis);
                    $("#img_logo_cedis").val(obj.logo_cedis);
                    $("#id_cedis").val(obj.id_cedis);
                    $("#cedis").val(obj.cedis);
                    $("#direccion_cedis").val(obj.direccion_cedis);
                    $("#col_cedis").val(obj.col_cedis);
                    $("#cp_cedis").val(obj.cp_cedis);
                    $("#mun_cedis").val(obj.mun_cedis);
                    $("#est_cedis").val(obj.est_cedis);
                    $("#textareaMap_cedis").val(obj.map_cedis);
                    $("#email_cedis").val(obj.email_cedis);
                    $("#tel_info").val(obj.tel_info);
                    $("#tel_ventas").val(obj.tel_ventas);
                    if (obj.activo == 'Y') {
                        $("#CheckBoxDirectorio").prop("checked", true);
                    } else {
                        $("#CheckBoxDirectorio").prop("checked", false);
                    }
                    activeDirectorio();
                } else {
                    Swal.fire("Mensaje de aviso", "Error: Vuelve a intentarlo mas tarde", "error");
                }

            }
        });
    }

    function guardarDirectorio() {
        var formData = new FormData();
        var catalogo = $('#id_cedis').val();
        var cedis = $("#cedis").val();
        if (cedis.length == 0) {
            Swal.fire("Mensaje de confirmación", "Campo cedis sin llenar", "error");
            return;
        }
        var direccion_cedis = $("#direccion_cedis").val();
        if (direccion_cedis.length == 0) {
            Swal.fire("Mensaje de confirmación", "Campo direccion_cedis sin llenar", "error");
            return;
        }
        var col_cedis = $("#col_cedis").val();
        if (col_cedis.length == 0) {
            Swal.fire("Mensaje de confirmación", "Campo col_cedis sin llenar", "error");
            return;
        }
        var cp_cedis = $("#cp_cedis").val();
        if (cp_cedis.length == 0) {
            Swal.fire("Mensaje de confirmación", "Campo cp_cedis sin llenar", "error");
            return;
        }
        var mun_cedis = $("#mun_cedis").val();
        if (mun_cedis.length == 0) {
            Swal.fire("Mensaje de confirmación", "Campo municipio sin llenar", "error");
            return;
        }
        var est_cedis = $("#est_cedis").val();
        if (est_cedis.length == 0) {
            Swal.fire("Mensaje de confirmación", "Campo estado sin llenar", "error");
            return;
        }
        var email_cedis = $("#email_cedis").val();
        if (email_cedis.length == 0) {
            Swal.fire("Mensaje de confirmación", "Campo email sin llenar", "error");
            return;
        }
        var tel_info = $("#tel_info").val();
        if (tel_info.length == 0) {
            Swal.fire("Mensaje de confirmación", "Campo información sin llenar", "error");
            return;
        }
        var tel_ventas = $("#tel_ventas").val();
        if (tel_ventas.length == 0) {
            Swal.fire("Mensaje de confirmación", "Campo teléfono ventas sin llenar", "error");
            return;
        }
        var img_logo_cedis = $("#img_logo_cedis").val();
        if (catalogo == 'null' && (img_logo_cedis.length == 0 || img == 'Selecciona Archivo de Imagen')) {
            Swal.fire("Mensaje de confirmación", "No seleccionaste una imagen", "error");
            return;
        }
        var img_directorio = $("#img_directorio").val();
        if (catalogo == 'null' && (img_directorio.length == 0 || img_directorio == 'Selecciona Archivo de Imagen')) {
            Swal.fire("Mensaje de confirmación", "No seleccionaste una imagen", "error");
            return;
        }
        var textareaMap_cedis = $("#textareaMap_cedis").val();
        if (textareaMap_cedis.length == 0) {
            Swal.fire("Mensaje de confirmación", "Campo Mapa sin llenar", "error");
        }
        var condiciones = $("#CheckBoxDirectorio").is(":checked");
        if (!condiciones) {
            var activo = "N";
        } else {
            var activo = "Y";
        }
        var imgDirectorio = $("#imgDirectorio")[0].files.length;
        if (imgDirectorio != 0) {
            var imgDirectorio = $("#imgDirectorio")[0].files[0];
        }
        var imgLogoCedis = $("#imgLogoCedis")[0].files.length;
        if (imgLogoCedis != 0) {
            var imgLogoCedis = $("#imgLogoCedis")[0].files[0];
        }
        formData.append("id_cedis", catalogo);
        formData.append("cedis", cedis);
        formData.append("direccion_cedis", direccion_cedis);
        formData.append("col_cedis", col_cedis);
        formData.append("cp_cedis", cp_cedis);
        formData.append("mun_cedis", mun_cedis);
        formData.append("est_cedis", est_cedis);
        formData.append("email_cedis", email_cedis);
        formData.append("tel_info", tel_info);
        formData.append("tel_ventas", tel_ventas);
        formData.append("img_logo_cedis", img_logo_cedis);
        formData.append("img_directorio", img_directorio);
        formData.append("textareaMap_cedis", textareaMap_cedis);
        formData.append("imgDirectorio", imgDirectorio);
        formData.append("imgLogoCedis", imgLogoCedis);
        formData.append("activo", activo);
        formData.append("imgDirectorio", imgDirectorio);
        $.ajax({
            url: "controller/directorio/upDirectorio.php",
            type: "post",
            data: formData,
            contentType: false,
            processData: false,
            success: function(data) {
                var obj = JSON.parse(data);
                if (obj.status == "ok") {
                    Swal.fire("Mensaje de confirmación", obj.msj, "success");
                    resetCatalogo();
                    loadSelectDirectorio();
                } else {
                    Swal.fire("Mensaje de confirmación", obj.msj, "error");
                }
            }
        });
    }

    /*$(function() {

        //Catalogo
        $('#imgDirectorio').change(function() {
            var input = this;
            var url = $(this).val();
            var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
            var dir = url.substring(url.lastIndexOf('/') + 1);
            var img = dir.substring(dir.lastIndexOf('\\') + 1);
            if (input.files && input.files[0] && (ext == "webp" || ext == "png" || ext == "jpeg" || ext == "jpg")) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('.Img-Cedis').attr('src', e.target.result);
                    $("#img_directorio").val(img);
                }
                reader.readAsDataURL(input.files[0]);
            } else {
                $('.Img-Cedis').attr('src', 'assets/media/img/loader/Placeholder.png');
                $('#imgDirectorio').val('');
                $("#img_directorio").val('Selecciona Archivo de Imagen');
                Swal.fire(
                    "Mensaje de aviso",
                    "Error: Solo se permiten imagenes",
                    "error"
                );
            }
        });

        //Catalogo
        $('#imgLogoCedis').change(function() {
            var input = this;
            var url = $(this).val();
            var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
            var dir = url.substring(url.lastIndexOf('/') + 1);
            var img = dir.substring(dir.lastIndexOf('\\') + 1);
            if (input.files && input.files[0] && (ext == "webp" || ext == "png" || ext == "jpeg" || ext == "jpg")) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('.Img-Logo-Cedis').attr('src', e.target.result);
                    $("#img_logo_cedis").val(img);
                }
                reader.readAsDataURL(input.files[0]);
            } else {
                $('.Img-Logo-Cedis').attr('src', 'assets/media/img/loader/Placeholder.png');
                $('#imgLogoCedis').val('');
                $("#img_logo_cedis").val('Selecciona Archivo de Imagen');
                Swal.fire(
                    "Mensaje de aviso",
                    "Error: Solo se permiten imagenes",
                    "error"
                );
            }
        });

    });*/
</script>