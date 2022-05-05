  //Main loader
  $(document).ready(function() {
      loadSelectPreguntas();
      desactivarPreguntas();
  });

  //Catalogo Web
  function verModalPreguntas() {
      $('#modalNombreMarcas').html($("#txt_pregunta").val());
      $('#modalInfoMarcas').html($("#txt_respuesta").val());
      $('#modalMarcas').modal({
          show: true
      });
  }

  function loadSelectPreguntas() {
      $.ajax({
          type: "POST",
          url: "controller/preguntas/getSelect.php",
          success: function(data) {
              $('#formPreguntas').empty();
              $("#formPreguntas").append(data);
          }
      });
  }

  function activePreguntas() {
      $("#txt_respuesta").prop("disabled", false);
      $("#txt_pregunta").prop("disabled", false);
      $("#btn-guardar-preguntas").prop("disabled", false);
  }

  function desactivarPreguntas() {
      $("input:checkbox[name=CheckBoxPreguntas]").attr("checked", false);
      $("#txt_respuesta").prop("disabled", true);
      $("#txt_pregunta").prop("disabled", true);
      $("#btn-guardar-preguntas").prop("disabled", true);
      $("#btn-ver-preguntas").prop("disabled", true);
  }

  function limpiarPreguntas() {
      $("#formPreguntas").val('').attr('selected', 'selected');
      $("#txt_respuesta").val('');
      $("#txt_pregunta").val('');
      desactivarPreguntas();
      Swal.fire("Mensaje de aviso", "Se limpio el formulario", "success");
  }

  function resetPreguntas() {
      $("#formPreguntas").val('').attr('selected', 'selected');
      $("#txt_respuesta").val('');
      $("#txt_pregunta").val('');
      desactivarPreguntas();
  }

  function nuevoMarcas() {
      $("#formPreguntas").val('').attr('selected', 'selected');
      $("#id_preguntas").val('null');
      $("#txt_respuesta").val('');
      $("#txt_pregunta").val('');
      $("input:checkbox[name=CheckBoxPreguntas]").attr("checked", true);
      activePreguntas();
      Swal.fire("Mensaje de aviso", "Se activo el formulario", "success");
  }

  function getPreguntas() {
      var Pregunta = $("#formPreguntas").val();
      $.ajax({
          url: "controller/preguntas/getPreguntas.php",
          type: "post",
          data: {
              Pre: Pregunta
          },
          success: function(data) {

              var obj = JSON.parse(data);
              if (obj.status == "ok") {
                  $("#id_preguntas").val(obj.id_pregunta);
                  $("#txt_respuesta").val(obj.respuesta);
                  $("#txt_pregunta").val(obj.pregunta);
                  if (obj.active == 'Y') {
                      $("#CheckBoxPreguntas").prop("checked", true);
                  } else {
                      $("#CheckBoxPreguntas").prop("checked", false);
                  }
                  activePreguntas();
              } else {
                  Swal.fire("Mensaje de aviso", "Error: Vuelve a intentarlo mas tarde", "error");
              }
          }
      });
  }

  function guardarPreguntas() {
      var formData = new FormData();
      var preguntas = $('#id_preguntas').val();

      var respuesta = $("#txt_respuesta").val();
      if (respuesta.length == 0) {
          Swal.fire("Mensaje de confirmación", "Campo información sin llenar", "error");
          return;
      }
      var pregunta = $("#txt_pregunta").val();
      if (pregunta.length == 0) {
          Swal.fire("Mensaje de confirmación", "Campo nombre sin llenar", "error");
          return;
      }
      var condiciones = $("#CheckBoxPreguntas").is(":checked");
      if (!condiciones) {
          var activo = "N";
      } else {
          var activo = "Y";
      }

      formData.append("preguntas", preguntas);
      formData.append("respuesta", respuesta);
      formData.append("pregunta", pregunta);
      formData.append("activo", activo);
      $.ajax({
          url: "controller/preguntas/upPreguntas.php",
          type: "post",
          data: formData,
          contentType: false,
          processData: false,
          success: function(data) {
              var obj = JSON.parse(data);
              if (obj.status == "ok") {
                  Swal.fire("Mensaje de confirmación", obj.msj, "success");
                  resetPreguntas();
                  loadSelectPreguntas();
              } else {
                  Swal.fire("Mensaje de confirmación", obj.msj, "error");
              }
          }
      });
  }