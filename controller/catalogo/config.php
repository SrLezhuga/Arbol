<fieldset class="border p-2 fieldset-bg shadow-lg">
    <legend class="w-auto"><b>Catálogo:</b></legend>

    <div class="row">
        <div class="col-8">
            <div class="input-group mb-1">
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-book-open"></i></span>
                <select id="formCatalogo" name="formCatalogo" class="form-select form-select-lg" aria-label="Default select example" onchange="getCatalogo();">

                    <option value="" selected disabled>Seleccione</option>
                    <?php
                    $query = $con->prepare("SELECT * FROM tab_catalogo");
                    $query->setFetchMode(PDO::FETCH_ASSOC);
                    $query->execute();

                    while ($item = $query->fetch()) {
                        echo '<option value="' . $item["id_catalogo"] . '">' . $item["titulo_catalogo"] . ' - ' . $item["subtitulo_catalogo"] . '</option>';
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="col-2">
            <div class="d-grid gap-2">
                <button class="btn btn-lg btn-secondary" id="btn-crear-catalogo" type="button" onclick="newCatalogo()">Nuevo <i class="fas fa-plus-square"></i></button>
            </div>
        </div>
        <div class="col-2">
            <div class="d-grid gap-2">
                <button class="btn btn-lg btn-danger" id="btn-guardar-catalogo" type="button" disabled>Guardar <i class="fas fa-save"></i></button>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-9">

            <div class="form-floating mb-1">
                <input type="text" class="form-control form-reset" id="marca_catalogo" placeholder="Marca" disabled>
                <label for="marca_catalogo"><i class="fas fa-bookmark"></i> Marca</label>
            </div>
            <div class="form-floating mb-1">
                <input type="text" class="form-control form-reset" id="titulo_catalogo" placeholder="Titulo" disabled>
                <label for="titulo_catalogo"><i class="fas fa-bookmark"></i> Titulo</label>
            </div>
            <div class="form-floating mb-1">
                <input type="text" class="form-control form-reset" id="subtitulo_catalogo" placeholder="Subtitulo" disabled>
                <label for="subtitulo_catalogo"><i class="fas fa-bookmark"></i> Subtitulo</label>
            </div>
            <div class="form-floating mb-1">
                <input type="text" class="form-control form-reset" id="fecha_catalogo" placeholder="Fecha Catálogo" disabled>
                <label for="fecha_catalogo"><i class="fas fa-bookmark"></i> Fecha Catálogo</label>
            </div>
            <div class="file-field">
                <div class="form-floating mb-1">
                    <input type="text" class="form-control form-reset" id="archivo_catalogo" placeholder="Archivo" disabled>
                    <label for="archivo_catalogo"><i class="fas fa-bookmark"></i> Archivo</label>
                </div>
                <input id="InputFileArchivo" type="file" disabled>
            </div>
        </div>
        <div class="col-3">
            <div class="file-field mb-1">
                <img class="Img-Catalogo mx-auto d-block img-thumbnail" src="assets/media/img/loader/Placeholder.png" onerror="this.src='assets/media/img/loader/Placeholder.png';">
                <input type="file" id="imgCatalogo" class="fileo .fileInput3" disabled>
            </div>
        </div>
        <hr>
        <div class="col-12">
            <div class="row">
                <div class="col-3">
                    <div class="d-grid gap-2 mb-1">
                        <button class="btn btn-secondary" id="btn-ver-catalogo" type="button" disabled>Vista Previa <i class="fas fa-eye"></i></button>
                    </div>
                </div>
                <div class="col-3">
                    <div class="d-grid gap-2 mb-1">
                        <button class="btn btn-danger" type="button" onclick="limpiarCatalogo()">Limpiar Formulario <i class="fas fa-eraser"></i></button>
                    </div>
                </div>
                <div class="col-6" style="font-size: 1.5rem;">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="CheckBoxCatalogo" name="CheckBoxCatalogo" value="Y">
                        <label class="form-check-label" for="CheckBoxCatalogo">Visible</label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        function activeCatalogo() {
            document.getElementById('marca_catalogo').disabled = false;
            document.getElementById('titulo_catalogo').disabled = false;
            document.getElementById('subtitulo_catalogo').disabled = false;
            document.getElementById('fecha_catalogo').disabled = false;
            document.getElementById('archivo_catalogo').disabled = false;
            document.getElementById('InputFileArchivo').disabled = false;
            document.getElementById('imgCatalogo').disabled = false;
            document.getElementById('btn-guardar-catalogo').disabled = false;
            document.getElementById('btn-ver-catalogo').disabled = false;
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
            $("input:checkbox[name=CheckBoxCatalogo]").attr("checked", false);
            $(".Img-Catalogo").attr("src", "assets/media/img/loader/Placeholder.png");
            document.getElementById('formCatalogo').disabled = false;
            Swal.fire(
                "Mensaje de aviso",
                "Se limpio el formulario",
                "success"
            );
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
                        $("#marca_catalogo").val(obj.marca_catalogo);
                        $("#titulo_catalogo").val(obj.titulo_catalogo);
                        $("#subtitulo_catalogo").val(obj.subtitulo_catalogo);
                        $("#fecha_catalogo").val(obj.fecha_catalogo);
                        $("#archivo_catalogo").val(obj.archivo_catalogo);
                        $("#btn_guardar_Catalogo").val(obj.id_catalogo);
                        if (obj.activo == 'Y') {
                            $("input:checkbox[name=CheckBoxCatalogo]").attr("checked", true);
                        } else {
                            $("input:checkbox[name=CheckBoxCatalogo]").attr("checked", false);
                        }
                        activeCatalogo();
                    } else {
                        Swal.fire(
                            "Mensaje de aviso",
                            "Error: Vuelve a intentarlo mas tarde",
                            "error"
                        );
                    }

                }
            });
        }

        function newCatalogo() {
            limpiarCatalogo()
            document.getElementById('formCatalogo').disabled = true;
        }

        function guardarCatalogo() {
            var formData = new FormData();


            var catalogo = $("#formCatalogo").val();
            var marca = $("#marca_catalogo").val();
            var titulo = $("#titulo_catalogo").val();
            var subtitulo = $("#subtitulo_catalogo").val();
            var fecha = $("#fecha_catalogo").val();
            var archivo = $("#archivo_catalogo").val();
            


            var visible = $("input:checkbox[name=CheckBoxCatalogo]:checked").val();

            if (visible == "on") {
                visible = "Y";
            } else {
                visible = "N";
            }
            var imgCatalogo = $("#imgCatalogo")[0].files[0];
            var archivoCatalogo = $("#InputFileArchivo")[0].files[0];

            formData.append("catalogo", catalogo);
            formData.append("marca", marca);
            formData.append("visible", visible);
            formData.append("catalogo", catalogo);
            formData.append("link", link);
            formData.append("visible", visible);
            formData.append("visible", visible);


            formData.append("imgCatalogo", imgCatalogo);
            formData.append("archivoCatalogo", archivoCatalogo);

            $.ajax({
                url: "assets/controler/promocion/carga.php",
                type: "post",
                data: formData,
                contentType: false,
                processData: false,
                success: function(data) {
                    if (data == 0) {
                        getPromocion();
                        $("#imgPromocion").val("");
                        Swal.fire(
                            "Mensaje de confirmación",
                            "Se actualizaron los datos",
                            "success"
                        );
                    } else {
                        Swal.fire(
                            "Mensaje de confirmación",
                            "Error al cargar datos",
                            "error"
                        );
                    }
                }
            });
        }
    </script>

    <script type="text/javascript">
        $(function() {

            //Catalogo
            $('#imgCatalogo').change(function() {
                var input = this;
                var url = $(this).val();
                var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
                if (input.files && input.files[0] && (ext == "webp" || ext == "png" || ext == "jpeg" || ext == "jpg")) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('.Img-Catalogo').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                } else {
                    $('.Img-Catalogo').attr('src', 'assets/media/img/loader/Placeholder.png');
                    $('#imgCatalogo').val('');
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
    </script>

    <style>
        .file-field {
            position: relative
        }

        .file-field .file-path-wrapper {
            height: 2.5rem;
            padding-left: 10px;
            overflow: hidden
        }

        .file-field input.file-path {
            width: 100%;
            height: 36px
        }

        .file-field .btn {
            float: left
        }

        .file-field span {
            cursor: pointer
        }

        .file-field input[type="file"] {
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            width: 100%;
            padding: 0;
            margin: 0;
            cursor: pointer;
            filter: alpha(opacity=0);
            opacity: 0
        }

        .file-field input[type="file"]::-webkit-file-upload-button {
            display: none
        }
    </style>










</fieldset>