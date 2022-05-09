    //Main loader
    $(document).ready(function() {
        loadSelectProductos();
        desactivarProductos();
        loadSelectSistemasProductos();
        loadSelectMarcasProductos();
    });

    //Productos
    function verModalProductos() {
        $('#modalNombreMarcas').html($("#marca_linea").val());
        $('#modalInfoMarcas').html($("#info_productos").val());
        $('#modalImgProductos').attr('src', $('.img_productos').attr('src'));
        $('#modalMarcas').modal({
            show: true
        });
    }

    //Sistemas
    function loadSelectSistemasProductos() {
        $.ajax({
            type: "POST",
            url: "controller/productos/getSistema.php",
            success: function(data) {
                $('#sistema_linea').empty();
                $("#sistema_linea").append(data);
            }
        });
    }


    //Marcas
    function loadSelectMarcasProductos() {
        $.ajax({
            type: "POST",
            url: "controller/catalogo/getMarca.php",
            success: function(data) {
                $('#marca_linea').empty();
                $("#marca_linea").append(data);
            }
        });
    }

    function loadSelectProductos() {
        $.ajax({
            type: "POST",
            url: "controller/productos/getSelect.php",
            success: function(data) {
                $('#formProductos').empty();
                $("#formProductos").append(data);
            }
        });
    }

    function activaProductos() {
        $('#sistema_linea').prop("disabled", false);
        $('#marca_linea').prop("disabled", false);
        $("#info_productos").prop("disabled", false);
        $("#imgProductos").prop("disabled", false);
        $("#img_file_productos").prop("disabled", false);
        $("#btn-guardar-marcas").prop("disabled", false);
        $("#btn-ver-marcas").prop("disabled", false);
    }

    function desactivarProductos() {
        $('#sistema_linea').prop("disabled", true);
        $('#marca_linea').prop("disabled", true);
        $("input:checkbox[name=CheckBoxProductos]").attr("checked", false);
        $(".img_productos").attr("src", "assets/media/img/loader/PlaceholderWeb.png");
        $("#info_productos").prop("disabled", true);
        $("#imgProductos").prop("disabled", true);
        $("#img_file_productos").prop("disabled", true);
        $("#btn-guardar-marcas").prop("disabled", true);
        $("#btn-ver-marcas").prop("disabled", true);
    }

    function limpiarProductos() {
        $("#sistema_linea").val('').attr('selected', 'selected');
        $("#marca_linea").val('').attr('selected', 'selected');
        $("#formProductos").val('').attr('selected', 'selected');
        $("#info_productos").val('');
        $("#imgProductos").val('');
        $("#img_file_productos").val('');
        desactivarProductos();
        Swal.fire("Mensaje de aviso", "Se limpio el formulario", "success");
    }

    function resetProductos() {
        $("#sistema_linea").val('').attr('selected', 'selected');
        $("#marca_linea").val('').attr('selected', 'selected');
        $("#formProductos").val('').attr('selected', 'selected');
        $("#info_productos").val('');
        $("#imgProductos").val('');
        $("#img_file_productos").val('');
        desactivarProductos();
    }

    function nuevoProducto() {
        $("#sistema_linea").val('').attr('selected', 'selected');
        $("#marca_linea").val('').attr('selected', 'selected');
        $("#formProductos").val('').attr('selected', 'selected');
        $("#id_productos").val('null');
        $("#info_productos").val('');
        $("#imgProductos").val('');
        $("#img_file_productos").val('');
        $("input:checkbox[name=CheckBoxProductos]").attr("checked", true);
        $(".img_productos").attr("src", "assets/media/img/loader/PlaceholderWeb.png");
        activaProductos();
        Swal.fire("Mensaje de aviso", "Se activo el formulario", "success");
    }

    function getProductos() {
        var Producto = $("#formProductos").val();
        $.ajax({
            url: "controller/productos/getProductos.php",
            type: "post",
            data: {
                Pro: Producto
            },
            success: function(data) {
                var obj = JSON.parse(data);
                if (obj.status == "ok") {
                    $(".img_productos").attr("src", "assets/media/img/marcas/" + obj.img_item);
                    $("#img_file_productos").val(obj.img_item);
                    $("#id_productos").val(obj.id_sistema);
                    $("#sistema_linea").val(obj.sistema).attr('selected', true);
                    $("#info_productos").val(obj.descripcion_item);
                    $("#marca_linea").val(obj.marca).attr('selected', true);
                    if (obj.active == 'Y') {
                        $("#CheckBoxProductos").prop("checked", true);
                    } else {
                        $("#CheckBoxProductos").prop("checked", false);
                    }
                    activaProductos();
                } else {
                    Swal.fire("Mensaje de aviso", "Error: Vuelve a intentarlo mas tarde", "error");
                }
            }
        });
    }

    function guardarProductos() {
        var formData = new FormData();
        var marcas = $('#id_productos').val();

        var informacion = $("#info_productos").val();
        if (informacion.length == 0) {
            Swal.fire("Mensaje de confirmación", "Campo información sin llenar", "error");
            return;
        }
        var titulo = $("#marca_linea").val();
        if (titulo.length == 0) {
            Swal.fire("Mensaje de confirmación", "Campo nombre sin llenar", "error");
            return;
        }
        var img = $("#img_file_productos").val();
        if (marcas == 'null' && (img.length == 0 || img == 'Selecciona Archivo de Imagen')) {
            Swal.fire("Mensaje de confirmación", "No seleccionaste una imagen", "error");
            return;
        }
        var condiciones = $("#CheckBoxProductos").is(":checked");
        if (!condiciones) {
            var activo = "N";
        } else {
            var activo = "Y";
        }
        var imgProductos = $("#imgProductos")[0].files.length;
        if (imgProductos != 0) {
            var imgProductos = $("#imgProductos")[0].files[0];
        }
        formData.append("marcas", marcas);
        formData.append("informacion", informacion);
        formData.append("titulo", titulo);
        formData.append("activo", activo);
        formData.append("img", img);
        formData.append("imgProductos", imgProductos);
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
                    resetProductos();
                    loadSelectProductos();
                } else {
                    Swal.fire("Mensaje de confirmación", obj.msj, "error");
                }
            }
        });
    }
    $(function() {
        //Catalogo 
        $('#imgProductos').change(function() {
            var input = this;
            var url = $(this).val();
            var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
            var dir = url.substring(url.lastIndexOf('/') + 1);
            var img = dir.substring(dir.lastIndexOf('\\') + 1);
            if (input.files && input.files[0] && (ext == "webp" || ext == "png" || ext == "jpeg" || ext == "jpg")) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('.img_productos').attr('src', e.target.result);
                    $("#img_file_productos").val(img);
                }
                reader.readAsDataURL(input.files[0]);
            } else {
                $('.img_productos').attr('src', 'assets/media/img/loader/PlaceholderWeb.png');
                $('#imgProductos').val('');
                $("#img_file_productos").val('Selecciona Archivo de Imagen');
                Swal.fire("Mensaje de aviso", "Error: Solo se permiten imagenes", "error");
            }
        });
    });