<fieldset class="border p-2 bg-white shadow-lg">
    <legend class="w-auto"><b>Pregunta:</b></legend>

    <div class="row">
        <div class="col-8">
            <div class="input-group mb-1">
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-book-open"></i></span>
                <select id="formPreguntas" name="formPreguntas" class="form-select form-select-lg" aria-label="Default select example" onchange="getPreguntas();"></select>
            </div>
        </div>
        <div class="col-2">
            <div class="d-grid gap-2">
                <button class="btn btn-lg btn-secondary" id="btn-crear-catalogo" type="button" onclick="nuevoMarcas()">Nuevo <i class="fas fa-plus-square"></i></button>
            </div>
        </div>
        <div class="col-2">
            <div class="d-grid gap-2">
                <button class="btn btn-lg btn-danger" id="btn-guardar-preguntas" type="button" onclick="guardarPreguntas()">Guardar <i class="fas fa-save"></i></button>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-12">
                    <div class="form-floating mb-1">
                        <input type="hidden" class="form-control form-reset" id="id_preguntas" placeholder="Marca" autocomplete="off">
                        <label for="id_preguntas"><i class="fas fa-bookmark"></i> Id</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-floating mb-1">
                        <input type="text" class="form-control form-reset" id="txt_pregunta" placeholder="Fecha Catálogo" autocomplete="off">
                        <label for="txt_pregunta"><i class="fas fa-bookmark"></i> Pregunta</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-floating mb-1">
                        <textarea class="form-control form-reset" placeholder="Información de la marca" id="txt_respuesta" autocomplete="off" style="height: 100px"></textarea>
                        <label for="txt_respuesta"><i class="fas fa-bookmark"></i> Respuesta</label>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="col-12">
            <div class="row">
                <div class="col-3">
                    <div class="d-grid gap-2 mb-1">
                        <button class="btn btn-secondary" id="btn-ver-preguntas" onclick="verModalPreguntas()" type="button" data-bs-toggle="modal" data-bs-target="#modalMarcas">Vista Previa <i class="fas fa-eye"></i></button>
                    </div>
                </div>
                <div class="col-3">
                    <div class="d-grid gap-2 mb-1">
                        <button class="btn btn-danger" type="button" onclick="limpiarPreguntas()">Limpiar Formulario <i class="fas fa-eraser"></i></button>
                    </div>
                </div>
                <div class="col-6" style="font-size: 1.5rem;">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="CheckBoxPreguntas" name="CheckBoxPreguntas" value="Y">
                        <label class="form-check-label" for="CheckBoxPreguntas">Visible</label>
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
        loadSelectPreguntas();
        desactivarPreguntas();
    });

    //Catalogo Web
    function verModalPreguntas() {
        $('#modalNombreMarcas').html($("#txt_pregunta").val());
        $('#modalInfoMarcas').html($("#txt_respuesta").val());
        $('#modalMarcas').modal({
            show: true
        });
    }

    function loadSelectPreguntas() {
        $.ajax({
            type: "POST",
            url: "controller/preguntas/getSelect.php",
            success: function(data) {
                $('#formPreguntas').empty();
                $("#formPreguntas").append(data);
            }
        });
    }

    function activePreguntas() {
        $("#txt_respuesta").prop("disabled", false);
        $("#txt_pregunta").prop("disabled", false);
        $("#btn-guardar-preguntas").prop("disabled", false);
        $("#btn-ver-preguntas").prop("disabled", false);
    }

    function desactivarPreguntas() {
        $("input:checkbox[name=CheckBoxPreguntas]").attr("checked", false);
        $("#txt_respuesta").prop("disabled", true);
        $("#txt_pregunta").prop("disabled", true);
        $("#btn-guardar-preguntas").prop("disabled", true);
        $("#btn-ver-preguntas").prop("disabled", true);
    }

    function limpiarPreguntas() {
        $("#formPreguntas").val('').attr('selected', 'selected');
        $("#txt_respuesta").val('');
        $("#txt_pregunta").val('');
        desactivarPreguntas();
        Swal.fire("Mensaje de aviso", "Se limpio el formulario", "success");
    }

    function resetPreguntas() {
        $("#formPreguntas").val('').attr('selected', 'selected');
        $("#txt_respuesta").val('');
        $("#txt_pregunta").val('');
        desactivarPreguntas();
    }

    function nuevoMarcas() {
        $("#formPreguntas").val('').attr('selected', 'selected');
        $("#id_preguntas").val('null');
        $("#txt_respuesta").val('');
        $("#txt_pregunta").val('');
        $("input:checkbox[name=CheckBoxPreguntas]").attr("checked", true);
        activePreguntas();
        Swal.fire("Mensaje de aviso", "Se activo el formulario", "success");
    }

    function getPreguntas() {
        var Pregunta = $("#formPreguntas").val();
        $.ajax({
            url: "controller/preguntas/getPreguntas.php",
            type: "post",
            data: {
                Pre: Pregunta
            },
            success: function(data) {
                console.log(data);

                var obj = JSON.parse(data);
                if (obj.status == "ok") {
                    $("#id_preguntas").val(obj.id_pregunta);
                    $("#txt_respuesta").val(obj.respuesta);
                    $("#txt_pregunta").val(obj.pregunta);
                    if (obj.active == 'Y') {
                        var condiciones = $("#CheckBoxPreguntas").is(":checked");
                        $("#CheckBoxPreguntas").prop("checked", true);
                    } else {
                        $("#CheckBoxPreguntas").prop("checked", false);
                    }
                    activePreguntas();
                } else {
                    Swal.fire("Mensaje de aviso", "Error: Vuelve a intentarlo mas tarde", "error");
                }
            }
        });
    }

    function guardarPreguntas() {
        var formData = new FormData();
        var preguntas = $('#id_preguntas').val();

        var respuesta = $("#txt_respuesta").val();
        if (respuesta.length == 0) {
            Swal.fire("Mensaje de confirmación", "Campo información sin llenar", "error");
            return;
        }
        var pregunta = $("#txt_pregunta").val();
        if (pregunta.length == 0) {
            Swal.fire("Mensaje de confirmación", "Campo nombre sin llenar", "error");
            return;
        }
        var condiciones = $("#CheckBoxPreguntas").is(":checked");
        if (!condiciones) {
            var activo = "N";
        } else {
            var activo = "Y";
        }

        formData.append("preguntas", preguntas);
        formData.append("respuesta", respuesta);
        formData.append("pregunta", pregunta);
        formData.append("activo", activo);
        $.ajax({
            url: "controller/preguntas/upPreguntas.php",
            type: "post",
            data: formData,
            contentType: false,
            processData: false,
            success: function(data) {
                var obj = JSON.parse(data);
                if (obj.status == "ok") {
                    Swal.fire("Mensaje de confirmación", obj.msj, "success");
                    resetPreguntas();
                    loadSelectPreguntas();
                } else {
                    Swal.fire("Mensaje de confirmación", obj.msj, "error");
                }
            }
        });
    }
</script>