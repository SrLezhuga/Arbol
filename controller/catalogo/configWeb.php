<fieldset class="border p-2 bg-white shadow-lg">
    <legend class="w-auto"><b>Catálogo Web:</b></legend>

    <div class="row">
        <div class="col-8">
            <div class="input-group mb-1">
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-book-open"></i></span>
                <select id="formCatalogoWeb" name="formCatalogoWeb" class="form-select form-select-lg" aria-label="Default select example" onchange="getCatalogoWeb();"></select>
            </div>
        </div>
        <div class="col-2">
            <div class="d-grid gap-2">
                <button class="btn btn-lg btn-secondary" id="btn-crear-catalogo" type="button" onclick="nuevoCatalogoWeb()">Nuevo <i class="fas fa-plus-square"></i></button>
            </div>
        </div>
        <div class="col-2">
            <div class="d-grid gap-2">
                <button class="btn btn-lg btn-danger" id="btn-guardar-catalogoWeb" type="button" onclick="guardarCatalogoWeb()">Guardar <i class="fas fa-save"></i></button>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-8">
            <div class="row">
                <div class="col-12">
                    <div class="form-floating mb-1">
                        <input type="hidden" class="form-control form-reset" id="id_catalogo_web" placeholder="Marca" autocomplete="off">
                        <label for="id_catalogo_web"><i class="fas fa-bookmark"></i> Id</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-floating mb-1">
                        <input type="text" class="form-control form-reset" id="nombre_catalogo_web" placeholder="Fecha Catálogo" autocomplete="off">
                        <label for="nombre_catalogo_web"><i class="fas fa-bookmark"></i> Nombre Catálogo</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-floating mb-1">
                        <input type="text" class="form-control form-reset" id="info_catalogo_web" placeholder="Marca" autocomplete="off">
                        <label for="info_catalogo_web"><i class="fas fa-bookmark"></i> Información</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-floating mb-1">
                        <input type="text" class="form-control form-reset" id="url_catalogo_web" placeholder="Titulo" autocomplete="off">
                        <label for="url_catalogo_web"><i class="fas fa-bookmark"></i> Url</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="file-field">
                        <div class="form-floating mb-1">
                            <input type="text" class="form-control form-reset" id="img_file_catalogo_web" placeholder="Imagen" autocomplete="off">
                            <label for="img_file_catalogo_web"><i class="fas fa-bookmark"></i> Imagen</label>
                        </div>
                        <input id="imgCatalogoWeb" type="file">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="file-field mb-1" style="top: 50%; transform: translateY(-50%);">
                <figure class="figure">
                    <img class="img_catalogo_web mx-auto d-block img-thumbnail figure-img" src="assets/media/img/loader/PlaceholderWeb.png" onerror="this.src='assets/media/img/loader/PlaceholderWeb.png';" style="width: 310px; height: 160px;">
                    <figcaption class="figure-caption">Tamaño: 300 x 160 pixeles</figcaption>
                </figure>
            </div>
        </div>
        <hr>
        <div class="col-12">
            <div class="row">
                <div class="col-3">
                    <div class="d-grid gap-2 mb-1">
                        <button class="btn btn-secondary" id="btn-ver-catalogoWeb" onclick="verCatalogoWeb()" type="button" data-bs-toggle="modal" data-bs-target="#modalCatalogoWeb">Vista Previa <i class="fas fa-eye"></i></button>
                    </div>
                </div>
                <div class="col-3">
                    <div class="d-grid gap-2 mb-1">
                        <button class="btn btn-danger" type="button" onclick="limpiarCatalogoWeb()">Limpiar Formulario <i class="fas fa-eraser"></i></button>
                    </div>
                </div>
                <div class="col-6" style="font-size: 1.5rem;">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="CheckBoxCatalogoWeb" name="CheckBoxCatalogoWeb" value="Y">
                        <label class="form-check-label" for="CheckBoxCatalogoWeb">Visible</label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalCatalogoWeb" tabindex="-1" aria-labelledby="modalLabelCatalogoWeb" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabelCatalogoWeb">Vista Prevía</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="justify-content-center align-items-center">
                        <div class="col-12 mb-3">
                            <div class="card h-100 overflow-hidden rounded shadow-lg">
                                <img src='' class="card-img-top imagen" id="modalImgCatalogoWeb" alt="">
                                <div class="card_body h-100 card_catalogos">
                                    <div class="card_center">
                                        <h6 class="card_title mitr text-center" id="modalNombreCatalogoWeb"></h6>
                                        <p class="card-text text_small text-center" id="modalInfoCatalogoWeb"></p>
                                        <a style="width: 100%;" class="btn btn-sm btn-danger small" id="modalUrlCatalogoWeb" href="" target="_blank" role="button"><i class="fas fa-link"></i> Ver Online</a>
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
    $(document).ready(function() {
        loadSelectCatalogoWeb();
        desactivarCatalogoWeb();
    });

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
</script>