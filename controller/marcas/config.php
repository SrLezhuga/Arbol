<fieldset class="border p-2 bg-white shadow-lg">
    <legend class="w-auto"><b>Marca:</b></legend>

    <div class="row">
        <div class="col-8">
            <div class="input-group mb-1">
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-book-open"></i></span>
                <select id="formMarcas" name="formMarcas" class="form-select form-select-lg" aria-label="Default select example" onchange="getMarcas();"></select>
            </div>
        </div>
        <div class="col-2">
            <div class="d-grid gap-2">
                <button class="btn btn-lg btn-secondary" id="btn-crear-catalogo" type="button" onclick="nuevoMarcas()">Nuevo <i class="fas fa-plus-square"></i></button>
            </div>
        </div>
        <div class="col-2">
            <div class="d-grid gap-2">
                <button class="btn btn-lg btn-danger" id="btn-guardar-catalogoWeb" type="button" onclick="guardarMarcas()">Guardar <i class="fas fa-save"></i></button>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-8">
            <div class="row">
                <div class="col-12">
                    <div class="form-floating mb-1">
                        <input type="hidden" class="form-control form-reset" id="id_marcas" placeholder="Marca" autocomplete="off">
                        <label for="id_marcas"><i class="fas fa-bookmark"></i> Id</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-floating mb-1">
                        <input type="text" class="form-control form-reset" id="nombre_marcas" placeholder="Fecha Catálogo" autocomplete="off">
                        <label for="nombre_marcas"><i class="fas fa-bookmark"></i> Nombre Marca</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="file-field">
                        <div class="form-floating mb-1">
                            <input type="text" class="form-control form-reset" id="img_file_marcas" placeholder="Imagen" autocomplete="off">
                            <label for="img_file_marcas"><i class="fas fa-bookmark"></i> Imagen</label>
                        </div>
                        <input id="imgMarcas" type="file">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-floating mb-1">
                        <textarea class="form-control form-reset" placeholder="Información de la marca" id="info_marcas" autocomplete="off" style="height: 100px"></textarea>
                        <label for="info_marcas"><i class="fas fa-bookmark"></i> Información de la marca</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="file-field mb-1" style="top: 50%; transform: translateY(-50%);">
                <figure class="figure">
                    <img class="img_marcas mx-auto d-block img-thumbnail figure-img" src="assets/media/img/loader/PlaceholderWeb.png" onerror="this.src='assets/media/img/loader/PlaceholderWeb.png';" style="width: 310px; height: 160px;">
                    <figcaption class="figure-caption">Tamaño: 300 x 160 pixeles</figcaption>
                </figure>
            </div>
        </div>
        <hr>
        <div class="col-12">
            <div class="row">
                <div class="col-3">
                    <div class="d-grid gap-2 mb-1">
                        <button class="btn btn-secondary" id="btn-ver-marcas" onclick="verModalMarcas()" type="button" data-bs-toggle="modal" data-bs-target="#modalMarcas">Vista Previa <i class="fas fa-eye"></i></button>
                    </div>
                </div>
                <div class="col-3">
                    <div class="d-grid gap-2 mb-1">
                        <button class="btn btn-danger" type="button" onclick="limpiarMarcas()">Limpiar Formulario <i class="fas fa-eraser"></i></button>
                    </div>
                </div>
                <div class="col-6" style="font-size: 1.5rem;">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="CheckBoxMarcas" name="CheckBoxMarcas" value="Y">
                        <label class="form-check-label" for="CheckBoxMarcas">Visible</label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalMarcas" tabindex="-1" aria-labelledby="modalLabelMarcas" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabelMarcas">Vista Prevía</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h4 class="mitr" id="modalNombreMarcas">Refaccionaria Arboledas</h4>
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-lg-12 mb-2">
                                    <img class="mx-auto d-block img-thumbnail" id="modalImgMarcas" src="assets/media/img/loader/PlaceholderWeb.png" onerror="this.src='assets/media/img/loader/PlaceholderWeb.png';" style="width: 310px; height: 160px;">
                                </div>
                                <div class="col-lg-12 mb-2 text-justify">
                                    <p id="modalInfoMarcas">Refaccionaria Arboledas</p>
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
        loadSelectMarcas();
        desactivarMarcas();
    });

    //Catalogo Web
    function verModalMarcas() {
        $('#modalNombreMarcas').html($("#nombre_marcas").val());
        $('#modalInfoMarcas').html($("#info_marcas").val());
        $('#modalImgMarcas').attr('src', $('.img_marcas').attr('src'));
        $('#modalMarcas').modal({
            show: true
        });
    }

    function loadSelectMarcas() {
        $.ajax({
            type: "POST",
            url: "controller/marcas/getSelect.php",
            success: function(data) {
                $('#formMarcas').empty();
                $("#formMarcas").append(data);
            }
        });
    }

    function activeMarcas() {
        $("#info_marcas").prop("disabled", false);
        $("#nombre_marcas").prop("disabled", false);
        $("#imgMarcas").prop("disabled", false);
        $("#img_file_marcas").prop("disabled", false);
        $("#btn-guardar-catalogoWeb").prop("disabled", false);
        $("#btn-ver-marcas").prop("disabled", false);
    }

    function desactivarMarcas() {
        $("input:checkbox[name=CheckBoxMarcas]").attr("checked", false);
        $(".img_marcas").attr("src", "assets/media/img/loader/PlaceholderWeb.png");
        $("#info_marcas").prop("disabled", true);
        $("#nombre_marcas").prop("disabled", true);
        $("#InputFileArchivo").prop("disabled", true);
        $("#imgMarcas").prop("disabled", true);
        $("#img_file_marcas").prop("disabled", true);
        $("#btn-guardar-catalogoWeb").prop("disabled", true);
        $("#btn-ver-marcas").prop("disabled", true);
    }

    function limpiarMarcas() {
        $("#formMarcas").val('').attr('selected', 'selected');
        $("#info_marcas").val('');
        $("#nombre_marcas").val('');
        $("#InputFileArchivo").val('');
        $("#imgMarcas").val('');
        $("#img_file_marcas").val('');
        desactivarMarcas();
        Swal.fire("Mensaje de aviso", "Se limpio el formulario", "success");
    }

    function resetMarcas() {
        $("#formMarcas").val('').attr('selected', 'selected');
        $("#info_marcas").val('');
        $("#nombre_marcas").val('');
        $("#InputFileArchivo").val('');
        $("#imgMarcas").val('');
        $("#img_file_marcas").val('');
        desactivarMarcas();
    }

    function nuevoMarcas() {
        $("#formMarcas").val('').attr('selected', 'selected');
        $("#id_marcas").val('null');
        $("#info_marcas").val('');
        $("#nombre_marcas").val('');
        $("#InputFileArchivo").val('');
        $("#imgMarcas").val('');
        $("#img_file_marcas").val('');
        $("input:checkbox[name=CheckBoxMarcas]").attr("checked", true);
        $(".img_marcas").attr("src", "assets/media/img/loader/PlaceholderWeb.png");
        activeMarcas();
        Swal.fire("Mensaje de aviso", "Se activo el formulario", "success");
    }

    function getMarcas() {
        var Marca = $("#formMarcas").val();
        $.ajax({
            url: "controller/marcas/getMarcas.php",
            type: "post",
            data: {
                Mar: Marca
            },
            success: function(data) {
                console.log(data);

                var obj = JSON.parse(data);
                if (obj.status == "ok") {
                    $(".img_marcas").attr("src", "assets/media/img/marcas/" + obj.img_marcas);
                    $("#img_file_marcas").val(obj.img_marcas);
                    $("#id_marcas").val(obj.id_marcas);
                    $("#info_marcas").val(obj.info_marcas);
                    $("#nombre_marcas").val(obj.nombre_marcas);
                    if (obj.active == 'Y') {
                        var condiciones = $("#CheckBoxMarcas").is(":checked");
                        $("#CheckBoxMarcas").prop("checked", true);
                    } else {
                        $("#CheckBoxMarcas").prop("checked", false);
                    }
                    activeMarcas();
                } else {
                    Swal.fire("Mensaje de aviso", "Error: Vuelve a intentarlo mas tarde", "error");
                }
            }
        });
    }

    function guardarMarcas() {
        var formData = new FormData();
        var marcas = $('#id_marcas').val();

        var informacion = $("#info_marcas").val();
        if (informacion.length == 0) {
            Swal.fire("Mensaje de confirmación", "Campo información sin llenar", "error");
            return;
        }
        var titulo = $("#nombre_marcas").val();
        if (titulo.length == 0) {
            Swal.fire("Mensaje de confirmación", "Campo nombre sin llenar", "error");
            return;
        }
        var img = $("#img_file_marcas").val();
        if (marcas == 'null' && (img.length == 0 || img == 'Selecciona Archivo de Imagen')) {
            Swal.fire("Mensaje de confirmación", "No seleccionaste una imagen", "error");
            return;
        }
        var condiciones = $("#CheckBoxMarcas").is(":checked");
        if (!condiciones) {
            var activo = "N";
        } else {
            var activo = "Y";
        }
        var imgMarcas = $("#imgMarcas")[0].files.length;
        if (imgMarcas != 0) {
            var imgMarcas = $("#imgMarcas")[0].files[0];
        }
        formData.append("marcas", marcas);
        formData.append("informacion", informacion);
        formData.append("titulo", titulo);
        formData.append("activo", activo);
        formData.append("img", img);
        formData.append("imgMarcas", imgMarcas);
        $.ajax({
            url: "controller/marcas/upMarcas.php",
            type: "post",
            data: formData,
            contentType: false,
            processData: false,
            success: function(data) {
                console.log(data)
                var obj = JSON.parse(data);
                if (obj.status == "ok") {
                    Swal.fire("Mensaje de confirmación", obj.msj, "success");
                    resetMarcas();
                    loadSelectMarcas();
                } else {
                    Swal.fire("Mensaje de confirmación", obj.msj, "error");
                }
            }
        });
    }
    $(function() {
        //Catalogo 
        $('#imgMarcas').change(function() {
            var input = this;
            var url = $(this).val();
            var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
            var dir = url.substring(url.lastIndexOf('/') + 1);
            var img = dir.substring(dir.lastIndexOf('\\') + 1);
            if (input.files && input.files[0] && (ext == "webp" || ext == "png" || ext == "jpeg" || ext == "jpg")) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('.img_marcas').attr('src', e.target.result);
                    $("#img_file_marcas").val(img);
                }
                reader.readAsDataURL(input.files[0]);
            } else {
                $('.img_marcas').attr('src', 'assets/media/img/loader/PlaceholderWeb.png');
                $('#imgMarcas').val('');
                $("#img_file_marcas").val('Selecciona Archivo de Imagen');
                Swal.fire("Mensaje de aviso", "Error: Solo se permiten imagenes", "error");
            }
        });
    });
</script>