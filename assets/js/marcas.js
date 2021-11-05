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
       $("#btn-guardar-marcas").prop("disabled", false);
       $("#btn-ver-marcas").prop("disabled", false);
   }

   function desactivarMarcas() {
       $("input:checkbox[name=CheckBoxMarcas]").attr("checked", false);
       $(".img_marcas").attr("src", "assets/media/img/loader/PlaceholderWeb.png");
       $("#info_marcas").prop("disabled", true);
       $("#nombre_marcas").prop("disabled", true);
       $("#imgMarcas").prop("disabled", true);
       $("#img_file_marcas").prop("disabled", true);
       $("#btn-guardar-marcas").prop("disabled", true);
       $("#btn-ver-marcas").prop("disabled", true);
   }

   function limpiarMarcas() {
       $("#formMarcas").val('').attr('selected', 'selected');
       $("#info_marcas").val('');
       $("#nombre_marcas").val('');
       $("#imgMarcas").val('');
       $("#img_file_marcas").val('');
       desactivarMarcas();
       Swal.fire("Mensaje de aviso", "Se limpio el formulario", "success");
   }

   function resetMarcas() {
       $("#formMarcas").val('').attr('selected', 'selected');
       $("#info_marcas").val('');
       $("#nombre_marcas").val('');
       $("#imgMarcas").val('');
       $("#img_file_marcas").val('');
       desactivarMarcas();
   }

   function nuevoMarcas() {
       $("#formMarcas").val('').attr('selected', 'selected');
       $("#id_marcas").val('null');
       $("#info_marcas").val('');
       $("#nombre_marcas").val('');
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