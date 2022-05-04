  //Main loader
  $(document).ready(function() {
      loadSelectGarantias();
      desactivarGarantias();
      loadMarcas();
  });

  function loadMarcas() {
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
                  $("#nombre_archivo").val(obj.archivo);
                  $("#marca_garantia").val(obj.marca_garantia).attr('selected', true);
                  if (obj.active == 'Y') {
                      var condiciones = $("#CheckBoxGarantias").is(":checked");
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
      $("#nombre_archivo").val('');
      $("#marca_garantia").val('').attr('selected', 'selected');
      desactivarGarantias();
      Swal.fire("Mensaje de aviso", "Se limpio el formulario", "success");
  }

  function resetGarantias() {
      $("input:checkbox[name=CheckBoxGarantias]").attr("checked", false);
      $("#formGarantias").val('').attr('selected', 'selected');
      $("#nombre_pdf").val('');
      $("#id_garantia").val('');
      $("#nombre_archivo").val('');
      $("#marca_garantia").val('').attr('selected', 'selected');
      desactivarGarantias();
  }

  function desactivarGarantias() {
      $("input:checkbox[name=CheckBoxGarantias]").attr("checked", false);
      $("#nombre_pdf").prop("disabled", true);
      $("#id_garantia").prop("disabled", true);
      $("#nombre_archivo").prop("disabled", true);
      $("#marca_garantia").prop("disabled", true);
      $("#InputFilePDF").prop("disabled", true);
  }

  function activeGarantias() {
      $("#nombre_pdf").prop("disabled", false);
      $("#id_garantia").prop("disabled", false);
      $("#nombre_archivo").prop("disabled", false);
      $("#marca_garantia").prop("disabled", false);
      $("#InputFilePDF").prop("disabled", false);
  }

  function nuevoGarantias() {
      $("input:checkbox[name=CheckBoxGarantias]").attr("checked", false);
      $("#formGarantias").val('').attr('selected', 'selected');
      $("#nombre_pdf").val('');
      $("#id_garantia").val('null');
      $("#nombre_archivo").val('');
      $("#marca_garantia").val('').attr('selected', 'selected');
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
      var nombre_archivo = $("#nombre_archivo").val();
      if (garantia == 'null' && (nombre_archivo.length == 0 || nombre_archivo == 'Selecciona PDF')) {
          Swal.fire("Mensaje de confirmación", "No seleccionaste una imagen", "error");
          return;
      }
      var condiciones = $("#CheckBoxGarantias").is(":checked");
      if (!condiciones) {
          var activo = "N";
      } else {
          var activo = "Y";
      }
      var InputFilePDF = $("#InputFilePDF")[0].files.length;
      if (InputFilePDF != 0) {
          var InputFilePDF = $("#InputFilePDF")[0].files[0];
      }

      formData.append("titulo", titulo);
      formData.append("informacion", informacion);
      formData.append("garantia", garantia);
      formData.append("nombre_archivo", nombre_archivo);
      formData.append("activo", activo);
      formData.append("InputFilePDF", InputFilePDF);


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
  $('#InputFilePDF').change(function() {
      var input = this;
      var url = $(this).val();
      var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
      var prefile = url.substring(url.lastIndexOf('\\') + 1);
      if (input.files && input.files[0] && (ext == "pdf")) {
          $('#nombre_archivo').val(prefile);
      } else {
          Swal.fire(
              "Mensaje de aviso",
              "Error: Solo se permiten archivos PDF",
              "error"
          );
          $('#nombre_archivo').val('Selecciona Archivo PDF');
          $('#InputFilePDF').val('');
      }
  });