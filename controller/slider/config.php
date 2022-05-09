<fieldset class="border p-2 bg-white shadow-lg">
    <legend class="w-auto"><b>Slider:</b></legend>

    <hr>
    <div class="row d-flex justify-content-between align-items-start">
        <div class="col-6">
            <div class="row">
                <div class="col-12">
                    <div class="form-floating mb-1">
                        <select id="id_slider1" name="id_slider1" class="form-select form-select-lg" aria-label="Default select example"></select>
                        <label for="id_slider1"><i class="fas fa-bookmark"></i> Nombre Marca</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="file-field">
                        <div class="form-floating mb-1">
                            <input type="text" class="form-control form-reset" id="img_file_slider1" placeholder="Imagen" autocomplete="off">
                            <label for="img_file_slider1"><i class="fas fa-bookmark"></i> Imagen</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="file-field mb-1">
                <img class="mx-auto d-block img-thumbnail figure-img" src="assets/media/img/loader/PlaceholderWeb.png" onerror="this.src='assets/media/img/loader/PlaceholderWeb.png';" style="width: auto; height: 115px;">
            </div>
        </div>
        <div class="col-3">
            <div class="d-grid gap-2 mb-1">
                <br>
                <button class="btn btn-secondary" id="btn-ver-marcas" onclick="guardarSliders()" type="button" disabled>Vista Previa <i class="fas fa-eye"></i></button>
                <br>
            </div>
        </div>
    </div>
</fieldset>


<script>
    //Main loader
    $(document).ready(function() {
        loadMarcasSliders();
        loadSlider();
    });

    function loadSlider() {
        $.ajax({
            type: "POST",
            url: "controller/marcas/getSelect.php",
            success: function(data) {
                $('#formSliders').empty();
                $("#formSliders").append(data);
            }
        });
    }

    function loadMarcasSliders() {
    $.ajax({
        type: "POST",
        url: "controller/garantias/getMarca.php",
        success: function(data) {
            $('#marca_garantia').empty();
            $("#marca_garantia").append(data);
        }
    });
}

    function guardarSliders() {
        var formData = new FormData();
        var marcas = $('#id_marcas').val();

        var informacion = $("#info_marcas").val();
        if (informacion.length == 0) {
            Swal.fire("Mensaje de confirmación", "Campo información sin llenar", "error");
            return;
        }
        var titulo = $("#id_slider1").val();
        if (titulo.length == 0) {
            Swal.fire("Mensaje de confirmación", "Campo nombre sin llenar", "error");
            return;
        }
        var img = $("#img_file_slider1").val();
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
        var imgSlider1 = $("#imgSlider1")[0].files.length;
        if (imgSlider1 != 0) {
            var imgSlider1 = $("#imgSlider1")[0].files[0];
        }
        formData.append("marcas", marcas);
        formData.append("informacion", informacion);
        formData.append("titulo", titulo);
        formData.append("activo", activo);
        formData.append("img", img);
        formData.append("imgSlider1", imgSlider1);
        $.ajax({
            url: "controller/marcas/upMarcas.php",
            type: "post",
            data: formData,
            contentType: false,
            processData: false,
            success: function(data) {
                var obj = JSON.parse(data);
                if (obj.status == "ok") {
                    Swal.fire("Mensaje de confirmación", obj.msj, "success");
                    resetMarcas();
                    loadSlider1();
                } else {
                    Swal.fire("Mensaje de confirmación", obj.msj, "error");
                }
            }
        });
    }
</script>