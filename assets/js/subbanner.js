   //Main loader
   $(document).ready(function() {
       loadSelectSubBanner();
       desactivarSubBanner();
   });

   //Catalogo
   function verSubBanner() {

   }

   function loadSelectSubBanner() {
       $.ajax({
           type: "POST",
           url: "controller/subbaner/getSelect.php",
           success: function(data) {
               $('#formSubBanner').empty();
               $("#formSubBanner").append(data);
           }
       });
   }

   function activeSubBanner() {
       $("#imgSubBanner").prop("disabled", false);
       $("#img_subBanner").prop("disabled", false);
       $("#btn-guardar-subbanner").prop("disabled", false);
       //$("#btn-ver-subBanner").prop("disabled", false);
   }

   function desactivarSubBanner() {
       $("input:checkbox[name=CheckBoxSubBanner]").attr("checked", false);
       $(".Img-SubBanner").attr("src", "assets/media/img/loader/PlaceholderBanner.png");
       $("#imgSubBanner").prop("disabled", true);
       $("#img_subBanner").prop("disabled", true);
       $("#btn-guardar-subbanner").prop("disabled", true);
       $("#btn-ver-subBanner").prop("disabled", true);
   }

   function limpiarSubBanner() {
       $("#formSubBanner").val('').attr('selected', 'selected');
       $("#imgSubBanner").val('');
       $("#img_subBanner").val('');
       desactivarSubBanner();
       Swal.fire("Mensaje de aviso", "Se limpio el formulario", "success");
   }

   function resetSubBanner() {
       $("#formSubBanner").val('').attr('selected', 'selected');
       $("#imgSubBanner").val('');
       $("#img_subBanner").val('');
       desactivarSubBanner();
   }

   function nuevoSubBanner() {
       $("#formSubBanner").val('').attr('selected', 'selected');
       $("#id_Subbanner").val('null');
       $("#imgSubBanner").val('');
       $("#img_subBanner").val('');
       $("input:checkbox[name=CheckBoxSubBanner]").attr("checked", true);
       $(".Img-SubBanner").attr("src", "assets/media/img/loader/PlaceholderBanner.png");
       activeSubBanner();
       Swal.fire("Mensaje de aviso", "Se activo el formulario", "success");
   }

   function getSubBanner() {
       var Banner = $("#formSubBanner").val();
       $.ajax({
           url: "controller/subbaner/getSubBanner.php",
           type: "post",
           data: {
               Sli: Banner
           },
           success: function(data) {
               var obj = JSON.parse(data);

               if (obj.status == "ok") {

                   $(".Img-SubBanner").attr("src", "assets/media/img/banners/" + obj.img);
                   $("#img_subBanner").val(obj.img);
                   $("#id_Subbanner").val(obj.id_subslider);

                   if (obj.active == 'Y') {
                       $("#CheckBoxSubBanner").prop("checked", true);
                   } else {
                       $("#CheckBoxSubBanner").prop("checked", false);
                   }
                   activeSubBanner();
               } else {
                   Swal.fire("Mensaje de aviso", "Error: Vuelve a intentarlo mas tarde", "error");
               }

           }
       });
   }

   function guardarSubBanner() {
       var formData = new FormData();
       var subbanner = $('#id_Subbanner').val();

       var img_subBanner = $("#img_subBanner").val();
       if (subbanner == 'null' && (img_subBanner.length == 0 || img_subBanner == 'Selecciona Archivo de Imagen')) {
           Swal.fire("Mensaje de confirmación", "No seleccionaste una imagen", "error");
           return;
       }
       var condiciones = $("#CheckBoxSubBanner").is(":checked");
       if (!condiciones) {
           var activo = "N";
       } else {
           var activo = "Y";
       }
       var imgSubBanner = $("#imgSubBanner")[0].files.length;
       if (imgSubBanner != 0) {
           var imgSubBanner = $("#imgSubBanner")[0].files[0];
       }

       formData.append("id_Subbanner", subbanner);
       formData.append("img_subBanner", img_subBanner);
       formData.append("imgSubBanner", imgSubBanner);
       formData.append("activo", activo);

       $.ajax({
           url: "controller/subbaner/upSubBanner.php",
           type: "post",
           data: formData,
           contentType: false,
           processData: false,
           success: function(data) {

               var obj = JSON.parse(data);
               console.log(obj);

               if (obj.status == "ok") {
                   Swal.fire("Mensaje de confirmación", obj.msj, "success");
                   resetSubBanner();
                   loadSelectSubBanner();
               } else {
                   Swal.fire("Mensaje de confirmación", obj.msj, "error");
               }

           }
       });
   }

   $(function() {
       //Catalogo
       $('#imgSubBanner').change(function() {
           var input = this;
           var url = $(this).val();
           var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
           var dir = url.substring(url.lastIndexOf('/') + 1);
           var img = dir.substring(dir.lastIndexOf('\\') + 1);
           if (input.files && input.files[0] && (ext == "webp" || ext == "png" || ext == "jpeg" || ext == "jpg")) {
               var reader = new FileReader();
               reader.onload = function(e) {
                   $('.Img-SubBanner').attr('src', e.target.result);
                   $("#img_subBanner").val(img);
               }
               reader.readAsDataURL(input.files[0]);
           } else {
               $('.Img-SubBanner').attr('src', 'assets/media/img/loader/PlaceholderBanner.png');
               $('#imgSubBanner').val('');
               $("#img_subBanner").val('Selecciona Archivo de Imagen');
               Swal.fire(
                   "Mensaje de aviso",
                   "Error: Solo se permiten imagenes",
                   "error"
               );
           }
       });
   });