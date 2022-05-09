 //Main loader
 $(document).ready(function() {
     loadSelectAvisos();
     desactivarAvisos();
 });

 //Aviso
 function verAviso() {

 }

 function loadSelectAvisos() {
     $.ajax({
         type: "POST",
         url: "controller/avisos/getSelect.php",
         success: function(data) {
             $('#formAviso').empty();
             $("#formAviso").append(data);
         }
     });
 }

 function activeAviso() {
     $("#btn-guardar-aviso").prop("disabled", false);
     //$("#btn-ver-aviso").prop("disabled", false);
     $("#img_promo").prop("disabled", false);
     $("#imgPromo").prop("disabled", false);
     $("#url_promo").prop("disabled", false);
 }

 function desactivarAvisos() {
     $("input:checkbox[name=CheckBoxPromo]").attr("checked", false);
     $(".Img-PROMOCIONAL").attr("src", "assets/media/img/loader/PlaceholderMovil.png");
     $("#btn-guardar-aviso").prop("disabled", true);
     $("#btn-ver-aviso").prop("disabled", true);
     $("#img_promo").prop("disabled", true);
     $("#imgPromo").prop("disabled", true);
     $("#url_promo").prop("disabled", true);
 }

 function limpiarAvisos() {
     $("#formAviso").val('').attr('selected', 'selected');
     $("#img_promo").val('');
     $("#imgPromo").val('');
     $("#url_promo").val('');
     desactivarAvisos();
     Swal.fire("Mensaje de aviso", "Se limpio el formulario", "success");
 }

 function resetAviso() {
     $("#formAviso").val('').attr('selected', 'selected');
     $("#img_promo").val('');
     $("#imgPromo").val('');
     $("#url_promo").val('');
     desactivarAvisos();
 }

 function nuevoAviso() {
     $("#formAviso").val('').attr('selected', 'selected');
     $("#id_promo").val('null');
     $("#img_promo").val('');
     $("#imgPromo").val('');
     $("#url_promo").val('');
     $("input:checkbox[name=CheckBoxPromo]").attr("checked", true);
     $(".Img-PROMOCIONAL").attr("src", "assets/media/img/loader/PlaceholderMovil.png");
     activeAviso();
     Swal.fire("Mensaje de aviso", "Se activo el formulario", "success");
 }

 function getAvisos() {
     var Aviso = $("#formAviso").val();
     $.ajax({
         url: "controller/avisos/getAvisos.php",
         type: "post",
         data: {
             Avi: Aviso
         },
         success: function(data) {
             var obj = JSON.parse(data);

             if (obj.status == "ok") {

                 $(".Img-PROMOCIONAL").attr("src", "assets/media/img/modal/" + obj.img_promo);
                 $("#img_promo").val(obj.img_promo);
                 $("#url_promo").val(obj.url_promo);
                 $("#id_promo").val(obj.id_promo);

                 if (obj.active == 'Y') {
                     $("#CheckBoxPromo").prop("checked", true);
                 } else {
                     $("#CheckBoxPromo").prop("checked", false);
                 }
                 activeAviso();
             } else {
                 Swal.fire("Mensaje de aviso", "Error: Vuelve a intentarlo mas tarde", "error");
             }

         }
     });
 }

 function guardarAviso() {
     var formData = new FormData();
     var id_aviso = $('#id_promo').val();

     var img_promo = $("#img_promo").val();
     if (id_aviso == 'null' && (img_promo.length == 0 || img_promo == 'Selecciona Archivo de Imagen')) {
         Swal.fire("Mensaje de confirmación", "No seleccionaste una imagen", "error");
         return;
     }
     var url_promo = $("#url_promo").val();
     if (url_promo.length == 0) {
         Swal.fire("Mensaje de confirmación", "Url vacia, para desactivar escribe '#'", "error");
         return;
     }
     var condiciones = $("#CheckBoxPromo").is(":checked");
     if (!condiciones) {
         var activo = "N";
     } else {
         var activo = "Y";
     }

     var imgPromo = $("#imgPromo")[0].files.length;
     if (imgPromo != 0) {
         var imgPromo = $("#imgPromo")[0].files[0];
     }
     formData.append("id_promo", id_aviso);
     formData.append("img_promo", img_promo);
     formData.append("url_promo", url_promo);
     formData.append("imgPromo", imgPromo);
     formData.append("activo", activo);

     $.ajax({
         url: "controller/avisos/upAvisos.php",
         type: "post",
         data: formData,
         contentType: false,
         processData: false,
         success: function(data) {
             console.log(data);
             var obj = JSON.parse(data);
             console.log(obj);

             if (obj.status == "ok") {
                 Swal.fire("Mensaje de confirmación", obj.msj, "success");
                 resetAviso();
                 loadSelectAvisos();
             } else {
                 Swal.fire("Mensaje de confirmación", obj.msj, "error");
             }
         }
     });
 }

 $(function() {

     //Catalogo
     $('#imgPromo').change(function() {
         var input = this;
         var url = $(this).val();
         var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
         var dir = url.substring(url.lastIndexOf('/') + 1);
         var img = dir.substring(dir.lastIndexOf('\\') + 1);
         if (input.files && input.files[0] && (ext == "webp" || ext == "png" || ext == "jpeg" || ext == "jpg")) {
             var reader = new FileReader();
             reader.onload = function(e) {
                 $('.Img-PROMOCIONAL').attr('src', e.target.result);
                 $("#img_promo").val(img);
             }
             reader.readAsDataURL(input.files[0]);
         } else {
             $('.Img-PROMOCIONAL').attr('src', 'assets/media/img/loader/PlaceholderMovil.png');
             $('#imgPromo').val('');
             $("#img_promo").val('Selecciona Archivo de Imagen');
             Swal.fire(
                 "Mensaje de aviso",
                 "Error: Solo se permiten imagenes",
                 "error"
             );
         }
     });
 });