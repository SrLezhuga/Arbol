    //Main loader
    $(document).ready(function() {
        loadSelectGarantias();
        desactivarGarantias();
        loadMarcasGarantias();
    });

    function loadMarcasGarantias() {
        $.ajax({
            type: "POST",
            url: "controller/garantias/getMarca.php",
            success: function(data) {
                $('#marca_garantia').empty();
                $("#marca_garantia").append(data);
            }
        });
    }

    function loadSelectGarantias() {
        $.ajax({
            type: "POST",
            url: "controller/garantias/getSelect.php",
            success: function(data) {
                $('#formGarantias').empty();
                $("#formGarantias").append(data);
            }
        });
    }

    function getGarantias() {
        var Garantia = $("#formGarantias").val();
        $.ajax({
            url: "controller/garantias/getGarantias.php",
            type: "post",
            data: {
                Gar: Garantia
            },
            success: function(data) {
                var obj = JSON.parse(data);
                if (obj.status == "ok") {
                    $("#nombre_pdf").val(obj.nombre_pdf);
                    $("#id_garantia").val(obj.id_garantia);
                    $("#PDF_Garantia").val(obj.archivo);
                    $("#marca_garantia").val(obj.marca_garantia).attr('selected', true);
                    if (obj.active == 'Y') {
                        $("#CheckBoxGarantias").prop("checked", true);
                    } else {
                        $("#CheckBoxGarantias").prop("checked", false);
                    }
                    activeGarantias();
                } else {
                    Swal.fire("Mensaje de aviso", "Error: Vuelve a intentarlo mas tarde", "error");
                }
            }
        });
    }

    function cleanGarantias() {
        $("input:checkbox[name=CheckBoxGarantias]").attr("checked", false);
        $("#formGarantias").val('').attr('selected', 'selected');
        $("#nombre_pdf").val('');
        $("#id_garantia").val('');
        $("#PDF_Garantia").val('');
        $("#marca_garantia").val('').attr('selected', 'selected');
        desactivarGarantias();
        Swal.fire("Mensaje de aviso", "Se limpio el formulario", "success");
    }

    function resetGarantias() {
        $("input:checkbox[name=CheckBoxGarantias]").attr("checked", false);
        $("#formGarantias").val('').attr('selected', 'selected');
        $("#nombre_pdf").val('');
        $("#id_garantia").val('');
        $("#PDF_Garantia").val('');
        $("#marca_garantia").val('').attr('selected', 'selected');
        desactivarGarantias();
    }

    function desactivarGarantias() {
        $("input:checkbox[name=CheckBoxGarantias]").attr("checked", false);
        $("#nombre_pdf").prop("disabled", true);
        $("#id_garantia").prop("disabled", true);
        $("#PDF_Garantia").prop("disabled", true);
        $("#marca_garantia").prop("disabled", true);
        $("#File_PDF_Garantia").prop("disabled", true);
    }

    function activeGarantias() {
        $("#nombre_pdf").prop("disabled", false);
        $("#id_garantia").prop("disabled", false);
        $("#PDF_Garantia").prop("disabled", false);
        $("#marca_garantia").prop("disabled", false);
        $("#File_PDF_Garantia").prop("disabled", false);
    }

    function nuevoGarantias() {
        $("input:checkbox[name=CheckBoxGarantias]").attr("checked", false);
        $("#formGarantias").val('').attr('selected', 'selected');
        $("#nombre_pdf").val('');
        $("#id_garantia").val('null');
        $("#PDF_Garantia").val('');
        $("#marca_garantia").val('').attr('selected', 'selected');
        $("#File_PDF_Garantia").val('');
        activeGarantias();
        Swal.fire("Mensaje de aviso", "Se activo el formulario", "success");
    }

    function guardarGarantias() {
        var formData = new FormData();

        var titulo = $("#nombre_pdf").val();
        if (titulo.length == 0) {
            Swal.fire("Mensaje de confirmación", "Campo titulo sin llenar", "error");
            return;
        }
        var informacion = $("#marca_garantia").val();
        if (informacion.length == 0) {
            Swal.fire("Mensaje de confirmación", "Campo información sin llenar", "error");
            return;
        }
        var garantia = $("#id_garantia").val();
        if (garantia.length == 0) {
            Swal.fire("Mensaje de confirmación", "Campo garantia sin llenar", "error");
            return;
        }
        var PDF_Garantia = $("#PDF_Garantia").val();
        if (garantia == 'null' && (PDF_Garantia.length == 0 || PDF_Garantia == 'Selecciona PDF')) {
            Swal.fire("Mensaje de confirmación", "No seleccionaste una imagen", "error");
            return;
        }
        var condiciones = $("#CheckBoxGarantias").is(":checked");
        if (!condiciones) {
            var activo = "N";
        } else {
            var activo = "Y";
        }
        var File_PDF_Garantia = $("#File_PDF_Garantia")[0].files.length;
        if (File_PDF_Garantia != 0) {
            var File_PDF_Garantia = $("#File_PDF_Garantia")[0].files[0];
        }

        formData.append("titulo", titulo);
        formData.append("informacion", informacion);
        formData.append("garantia", garantia);
        formData.append("PDF_Garantia", PDF_Garantia);
        formData.append("activo", activo);
        formData.append("File_PDF_Garantia", File_PDF_Garantia);


        $.ajax({
            url: "controller/garantias/upGarantias.php",
            type: "post",
            data: formData,
            contentType: false,
            processData: false,
            success: function(data) {
                var obj = JSON.parse(data);
                if (obj.status == "ok") {
                    Swal.fire("Mensaje de confirmación", obj.msj, "success");
                    resetGarantias();
                    loadSelectGarantias();
                } else {
                    Swal.fire("Mensaje de confirmación", obj.msj, "error");
                }
            }
        });

    }

    //Input
    $('#File_PDF_Garantia').change(function() {
        var input = this;
        var url = $(this).val();
        var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
        var prefile = url.substring(url.lastIndexOf('\\') + 1);
        if (input.files && input.files[0] && (ext == "pdf")) {
            $('#PDF_Garantia').val(prefile);
        } else {
            Swal.fire(
                "Mensaje de aviso",
                "Error: Solo se permiten archivos PDF",
                "error"
            );
            $('#PDF_Garantia').val('Selecciona Archivo PDF');
            $('#File_PDF_Garantia').val('');
        }
    });