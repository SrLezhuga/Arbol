$(document).ready(function() {
    var busqueda = 'ok';
    $.ajax({
        url: "controller/banner/precarga_promociones.php",
        type: "post",
        data: {
            Rs: busqueda
        },
        error: function() {
            alert("error petición ajax");
        },
        success: function(data) {
            $("#promo-slider").empty();
            $("#promo-slider").append(data);
        }
    });
});


$('#verPromocionesModal').click(function() {
    //Some code

    var myModal = new bootstrap.Modal(document.getElementById('ModalIndex'));

    myModal.show();

});

function suscripcion() {
    var formData = new FormData();
    var nom = $('#txt_nombre').val();
    var tel = $('#txt_telefono').val();
    var cor = $('#txt_correo').val();

    formData.append("nom", nom);
    formData.append("tel", tel);
    formData.append("cor", cor);

    $.ajax({
        url: "controller/suscripcion/upSuscripcion.php",
        type: "post",
        data: formData,
        contentType: false,
        processData: false,
        success: function(data) {
            console.log(data);
            var obj = JSON.parse(data);
            if (obj.status == "ok") {
                Swal.fire("Mensaje de confirmación", obj.msj, "success");
                $('#txt_nombre').val('');
                $('#txt_telefono').val('');
                $('#txt_correo').val('');
            } else {
                Swal.fire("Mensaje de confirmación", obj.msj, "error");
            }
        }
    });

}