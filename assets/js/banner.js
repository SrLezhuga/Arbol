  //Main loader
  $(document).ready(function() {
      loadSelectBanner();
      desactivarBanner();
  });

  //Catalogo
  function verCatalogo() {

  }

  function loadSelectBanner() {
      $.ajax({
          type: "POST",
          url: "controller/banner/getSelect.php",
          success: function(data) {
              $('#formBanner').empty();
              $("#formBanner").append(data);
          }
      });
  }

  function activeBanner() {
      $("#cedis").prop("disabled", false);
      $("#imgPc").prop("disabled", false);
      $("#img_pc").prop("disabled", false);
      $("#btn-guardar-banner").prop("disabled", false);
      //$("#btn-ver-banner").prop("disabled", false);
      $("#img_movil").prop("disabled", false);
      $("#imgMovil").prop("disabled", false);
  }

  function desactivarBanner() {
      $("input:checkbox[name=CheckBoxBanner]").attr("checked", false);
      $(".Img-PC").attr("src", "assets/media/img/loader/PlaceholderBanner.png");
      $(".Img-MOVIL").attr("src", "assets/media/img/loader/PlaceholderMovil.png");
      $("#cedis").prop("disabled", true);
      $("#imgPc").prop("disabled", true);
      $("#img_pc").prop("disabled", true);
      $("#btn-guardar-banner").prop("disabled", true);
      $("#btn-ver-banner").prop("disabled", true);
      $("#img_movil").prop("disabled", true);
      $("#imgMovil").prop("disabled", true);
  }

  function limpiarBanner() {
      $("#formBanner").val('').attr('selected', 'selected');
      $("#cedis").val('');
      $("#imgPc").val('');
      $("#img_pc").val('');
      $("#img_movil").val('');
      $("#imgMovil").val('');
      desactivarBanner();
      Swal.fire("Mensaje de aviso", "Se limpio el formulario", "success");
  }

  function resetBanner() {
      $("#formBanner").val('').attr('selected', 'selected');
      $("#cedis").val('');
      $("#imgPc").val('');
      $("#img_pc").val('');
      $("#img_movil").val('');
      $("#imgMovil").val('');
      desactivarBanner();
  }

  function nuevoBanner() {
      $("#formBanner").val('').attr('selected', 'selected');
      $("#id_slider").val('null');
      $("#cedis").val('');
      $("#imgPc").val('');
      $("#img_pc").val('');
      $("#img_movil").val('');
      $("#imgMovil").val('');
      $("input:checkbox[name=CheckBoxBanner]").attr("checked", true);
      $(".Img-PC").attr("src", "assets/media/img/loader/PlaceholderBanner.png");
      $(".Img-MOVIL").attr("src", "assets/media/img/loader/PlaceholderMovil.png");
      activeBanner();
      Swal.fire("Mensaje de aviso", "Se activo el formulario", "success");
  }

  function getBanner() {
      var Banner = $("#formBanner").val();
      $.ajax({
          url: "controller/banner/getBanner.php",
          type: "post",
          data: {
              Sli: Banner
          },
          success: function(data) {
              var obj = JSON.parse(data);
              console.log(obj);

              if (obj.status == "ok") {

                  $(".Img-PC").attr("src", "assets/media/img/banners/" + obj.img_pc);
                  $("#img_pc").val(obj.img_pc);
                  $(".Img-MOVIL").attr("src", "assets/media/img/banners/" + obj.img_movil);
                  $("#img_movil").val(obj.img_movil);
                  $("#id_slider").val(obj.id_slider);
                  $("#cedis").val(obj.cedis);

                  if (obj.active == 'Y') {
                      $("#CheckBoxBanner").prop("checked", true);
                  } else {
                      $("#CheckBoxBanner").prop("checked", false);
                  }
                  activeBanner();
              } else {
                  Swal.fire("Mensaje de aviso", "Error: Vuelve a intentarlo mas tarde", "error");
              }

          }
      });
  }

  function guardarBanner() {
      var formData = new FormData();
      var catalogo = $('#id_slider').val();

      var img_movil = $("#img_movil").val();
      if (catalogo == 'null' && (img_movil.length == 0 || img == 'Selecciona Archivo de Imagen')) {
          Swal.fire("Mensaje de confirmación", "No seleccionaste una imagen", "error");
          return;
      }
      var img_pc = $("#img_pc").val();
      if (catalogo == 'null' && (img_pc.length == 0 || img_pc == 'Selecciona Archivo de Imagen')) {
          Swal.fire("Mensaje de confirmación", "No seleccionaste una imagen", "error");
          return;
      }
      if (!condiciones) {
          var activo = "N";
      } else {
          var activo = "Y";
      }
      var imgPc = $("#imgPc")[0].files.length;
      if (imgPc != 0) {
          var imgPc = $("#imgPc")[0].files[0];
      }
      var imgMovil = $("#imgMovil")[0].files.length;
      if (imgMovil != 0) {
          var imgMovil = $("#imgMovil")[0].files[0];
      }
      formData.append("id_slider", catalogo);
      formData.append("img_movil", img_movil);
      formData.append("img_pc", img_pc);
      formData.append("imgPc", imgPc);
      formData.append("imgMovil", imgMovil);
      formData.append("activo", activo);

      $.ajax({
          url: "controller/banner/upBanner.php",
          type: "post",
          data: formData,
          contentType: false,
          processData: false,
          success: function(data) {

              var obj = JSON.parse(data);
              console.log(obj);

              if (obj.status == "ok") {
                  Swal.fire("Mensaje de confirmación", obj.msj, "success");
                  resetBanner();
                  loadSelectBanner();
              } else {
                  Swal.fire("Mensaje de confirmación", obj.msj, "error");
              }

          }
      });
  }

  $(function() {
      //Catalogo
      $('#imgPc').change(function() {
          var input = this;
          var url = $(this).val();
          var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
          var dir = url.substring(url.lastIndexOf('/') + 1);
          var img = dir.substring(dir.lastIndexOf('\\') + 1);
          if (input.files && input.files[0] && (ext == "webp" || ext == "png" || ext == "jpeg" || ext == "jpg")) {
              var reader = new FileReader();
              reader.onload = function(e) {
                  $('.Img-PC').attr('src', e.target.result);
                  $("#img_pc").val(img);
              }
              reader.readAsDataURL(input.files[0]);
          } else {
              $('.Img-PC').attr('src', 'assets/media/img/loader/PlaceholderBanner.png');
              $('#imgPc').val('');
              $("#img_pc").val('Selecciona Archivo de Imagen');
              Swal.fire(
                  "Mensaje de aviso",
                  "Error: Solo se permiten imagenes",
                  "error"
              );
          }
      });
      //Catalogo
      $('#imgMovil').change(function() {
          var input = this;
          var url = $(this).val();
          var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
          var dir = url.substring(url.lastIndexOf('/') + 1);
          var img = dir.substring(dir.lastIndexOf('\\') + 1);
          if (input.files && input.files[0] && (ext == "webp" || ext == "png" || ext == "jpeg" || ext == "jpg")) {
              var reader = new FileReader();
              reader.onload = function(e) {
                  $('.Img-MOVIL').attr('src', e.target.result);
                  $("#img_movil").val(img);
              }
              reader.readAsDataURL(input.files[0]);
          } else {
              $('.Img-MOVIL').attr('src', 'assets/media/img/loader/PlaceholderMovil.png');
              $('#imgMovil').val('');
              $("#img_movil").val('Selecciona Archivo de Imagen');
              Swal.fire(
                  "Mensaje de aviso",
                  "Error: Solo se permiten imagenes",
                  "error"
              );
          }
      });
  });