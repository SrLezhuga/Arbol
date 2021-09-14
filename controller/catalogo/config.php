<fieldset class="border p-2 fieldset-bg shadow-lg">
    <legend class="w-auto"><b>Catálogo:</b></legend>

    <div class="row">
        <div class="col-8">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-book-open"></i></span>
                <select id="formCatalogo" name="formCatalogo" class="form-select" aria-label="Default select example" onchange="getCatalogo();">

                    <option value="" selected disabled>Seleccione</option>
                    <?php
                    $query = $con->prepare("SELECT * FROM tab_catalogo");
                    $query->setFetchMode(PDO::FETCH_ASSOC);
                    $query->execute();

                    while ($item = $query->fetch()) {
                        echo '<option value="' . $item["id_catalogo"] . '">' . $item["marca_catalogo"] . ' - ' . $item["titulo_catalogo"] . '</option>';
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="col-2">
            <div class="d-grid gap-2">
                <button class="btn btn-success" type="button">Crear <i class="fas fa-plus-square"></i></button>
            </div>
        </div>
        <div class="col-2">
            <div class="d-grid gap-2">
                <button class="btn btn-warning" type="button">Guardar <i class="fas fa-save"></i></button>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-9">

            <div class="form-floating mb-3">
                <input type="text" class="form-control form-reset" id="marca_catalogo" placeholder="name@example.com">
                <label for="marca_catalogo"><i class="fas fa-bookmark"></i> Marca</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control form-reset" id="titulo_catalogo" placeholder="name@example.com">
                <label for="titulo_catalogo"><i class="fas fa-bookmark"></i> Titulo</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control form-reset" id="subtitulo_catalogo" placeholder="name@example.com">
                <label for="subtitulo_catalogo"><i class="fas fa-bookmark"></i> Subtitulo</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control form-reset" id="fecha_catalogo" placeholder="name@example.com">
                <label for="fecha_catalogo"><i class="fas fa-bookmark"></i> Fecha Catálogo</label>
            </div>

            <div class="file-field">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control form-reset" id="archivo_catalogo" placeholder="name@example.com">
                    <label for="archivo_catalogo"><i class="fas fa-bookmark"></i> Archivo</label>
                </div>
                <input id="InputFileArchivo" type="file">
            </div>

        </div>
        <div class="col-3">
            <div class="file-field mb-1">
                <img class="Img-Catalogo mx-auto d-block img-thumbnail" src="assets/media/img/loader/Placeholder.png" onerror="this.src='assets/media/img/loader/Placeholder.png';">
                <input type="file" id="imgCatalogo" class="fileo .fileInput3">
            </div>
            <div class="d-grid gap-2 mb-1">
                <button class="btn btn-secondary" type="button">Pre visualizar <i class="far fa-eye"></i></button>
            </div>
            <div class="d-grid gap-2 mb-1">
                <button class="btn btn-danger" type="button">Limpiar <i class="fas fa-eraser"></i></button>
            </div>
        </div>
    </div>

    <script type="text/javascript">
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

                        /*   document.getElementById("btn_guardar_Catalogo").disabled = false;
                           document.getElementById("btn_crear_Catalogo").disabled = true;*/
                    } else {
                        alert("error");
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
                var box = $("#archivo_catalogo").val();
                var input = this;
                var url = $(this).val();
                var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
                var prefile = url.substring(url.lastIndexOf('\\') + 1);
                if (input.files && input.files[0] && (ext == "pdf")) {
                    $('#archivo_catalogo').val(prefile);
                } else {
                    $('#archivo_catalogo').val(box);
                    $('#InputFileArchivo').val('');
                    Swal.fire(
                        "Mensaje de aviso",
                        "Error: Solo se permiten archivos PDF",
                        "error"
                    );
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