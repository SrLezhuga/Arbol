    //Main loader
    $(document).ready(function() {
        loadSelectNosotros();
        desactivarNosotros();
    });

    //Catalogo Web
    function verModalNosotros() {
        $('#modalNombreMarcas').html($("#campo_nosotros").val());
        $('#modalInfoMarcas').html($("#txt_valor").val());
        $('#modalMarcas').modal({
            show: true
        });
    }

    function loadSelectNosotros() {
        $.ajax({
            type: "POST",
            url: "controller/nosotros/getSelect.php",
            success: function(data) {
                $('#formNosotros').empty();
                $("#formNosotros").append(data);
            }
        });
    }

    function activeNosotros() {
        $("#txt_valor").prop("disabled", false);
        $("#campo_nosotros").prop("disabled", false);
        $("#btn-guardar-nosotros").prop("disabled", false);
    }

    function desactivarNosotros() {
        $("input:checkbox[name=CheckBoxNosotros]").attr("checked", false);
        $("#txt_valor").prop("disabled", true);
        $("#campo_nosotros").prop("disabled", true);
        $("#btn-guardar-nosotros").prop("disabled", true);
        $("#btn-ver-nosotros").prop("disabled", true);
        $("#btn-crear-nosotros").prop("disabled", true);
    }

    function limpiarNosotros() {
        $("#formNosotros").val('').attr('selected', 'selected');
        $("#txt_valor").val('');
        $("#campo_nosotros").val('');
        desactivarNosotros();
        Swal.fire("Mensaje de aviso", "Se limpio el formulario", "success");
    }

    function resetNosotros() {
        $("#formNosotros").val('').attr('selected', 'selected');
        $("#txt_valor").val('');
        $("#campo_nosotros").val('');
        desactivarNosotros();
    }

    function nuevoNosotros() {
        $("#formNosotros").val('').attr('selected', 'selected');
        $("#id_nosotros").val('null');
        $("#txt_valor").val('');
        $("#campo_nosotros").val('');
        $("input:checkbox[name=CheckBoxNosotros]").attr("checked", true);
        activeNosotros();
        Swal.fire("Mensaje de aviso", "Se activo el formulario", "success");
    }

    function getNosotros() {
        var Nosotros = $("#formNosotros").val();
        $.ajax({
            url: "controller/nosotros/getNosotros.php",
            type: "post",
            data: {
                Pre: Nosotros
            },
            success: function(data) {
                var obj = JSON.parse(data);
                if (obj.status == "ok") {
                    $("#id_nosotros").val(obj.campo);
                    $("#txt_valor").val(obj.valor);
                    $("#campo_nosotros").val(obj.campo);
                    if (obj.active == 'Y') {
                        $("#CheckBoxNosotros").prop("checked", true);
                    } else {
                        $("#CheckBoxNosotros").prop("checked", false);
                    }
                    activeNosotros();
                } else {
                    Swal.fire("Mensaje de aviso", "Error: Vuelve a intentarlo mas tarde", "error");
                }
            }
        });
    }

    function guardarNosotros() {
        var formData = new FormData();
        var nosotros = $('#id_nosotros').val();

        var valor = $("#txt_valor").val();
        if (valor.length == 0) {
            Swal.fire("Mensaje de confirmación", "Campo información sin llenar", "error");
            return;
        }
        var campo = $("#campo_nosotros").val();
        if (campo.length == 0) {
            Swal.fire("Mensaje de confirmación", "Campo nombre sin llenar", "error");
            return;
        }
        var condiciones = $("#CheckBoxNosotros").is(":checked");
        if (!condiciones) {
            var activo = "N";
        } else {
            var activo = "Y";
        }

        formData.append("nosotros", nosotros);
        formData.append("valor", valor);
        formData.append("campo", campo);
        formData.append("activo", activo);
        $.ajax({
            url: "controller/nosotros/upNosotros.php",
            type: "post",
            data: formData,
            contentType: false,
            processData: false,
            success: function(data) {
                var obj = JSON.parse(data);
                if (obj.status == "ok") {
                    Swal.fire("Mensaje de confirmación", obj.msj, "success");
                    resetNosotros();
                    loadSelectNosotros();
                } else {
                    Swal.fire("Mensaje de confirmación", obj.msj, "error");
                }
            }
        });
    }