<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <?php require_once('controller/common/header.php'); ?>

  <title>REFACCIONARIA ARBOLEDAS | Inicio</title>
</head>

<body>

  <div class="container mb-3 mt-5">

    <div class="dropdown">
      <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="fas fa-search"></i>
      </button>

      <form class="dropdown-menu p-4" style="background: rgba(0, 0, 0, 0.6);">
        <!-- Parte -->
        <h6 class="text-white"><i class="fas fa-wrench"></i> Parte</h6>
        <div class="form-floating mb-3">
          <input type="text" class="form-control" id="floatingInput" placeholder="Auto / Parte">
          <label for="floatingInput">Auto / Parte</label>
        </div>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
          <button type="button" class="btn btn-danger">Buscar</button>
        </div>
        <!-- Auto -->
        <h6 class="text-white"><i class="fas fa-car"></i> Auto</h6>
        <div class="form-floating mb-1">
          <select class="form-select" id="idYearFacets" onchange="loadMakeFacets()" aria-label="Floating label select example">
            <option value="0" disabled selected>Seleccione Año</option>

          </select>
          <label for="floatingSelect">Año</label>
        </div>
        <div class="form-floating mb-1">
          <select class="form-select" id="idMakeFacets" onchange="loadModelFacets()" aria-label="Floating label select example" disabled>
            <option value="0" disabled selected>Seleccione Marca</option>
          </select>
          <label for="floatingSelect">Marca</label>
        </div>
        <div class="form-floating mb-3">
          <select class="form-select" id="idModelFacets" aria-label="Floating label select example" disabled>
            <option value="0" disabled selected>Seleccione Modelo</option>
          </select>
          <label for="floatingSelect">Modelo</label>
        </div>

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
          <button type="button" onclick="getAutoCareSearchResults()" class="btn btn-danger">Buscar</button>
        </div>
        <!-- Sistema -->
        <h6 class="text-white"><i class="fas fa-tools"></i> Sistema</h6>
        <div class="form-floating mb-3">
          <select class="form-select" id="idSistemFacets" aria-label="Floating label select example" disabled>
            <option value="0" disabled selected>Seleccione Sistema</option>

          </select>
          <label for="floatingSelect">Sistema</label>
        </div>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
          <button type="button" class="btn btn-danger">Buscar</button>
        </div>
      </form>
    </div>



  </div>
  <div class="container bg-white">
    <!-- DataTales -->
    <div class="table">
      <table class="table table-hover table-sm" id="dataTableCatalogo" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Id</th>
            <th>Imagen</th>
            <th>Marca</th>
            <th>Parte</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody id="formPreguntas">
        </tbody>
      </table>
    </div>

    <!-- DataTales End -->

  </div>



  <script>
    $(document).ready(function() {
      loadYearFacets();
      loadTable();
    });

    function loadYearFacets() {

      $.ajax({
        type: "POST",
        url: "controller/soap/getYearFacets.php",

        success: function(data) {
          var obj = JSON.parse(JSON.stringify(data));
          var count = 0;
          $('#idYearFacets').empty();
          $('#idMakeFacets').empty();
          $('#idModelFacets').empty();

          $("#idYearFacets").append("<option value='0' disabled selected>Seleccione Año</option>");
          $("#idMakeFacets").append("<option value='0' disabled selected>Seleccione Marca</option>");
          $("#idModelFacets").append("<option value='0' disabled selected>Seleccione Modelo</option>");

          obj.forEach(element => {
            $("#idYearFacets").append("<option value='" + obj[count].year + "'>" + obj[count].year + "</option>");
            count++;
          });
        }
      });
    }

    function loadMakeFacets() {

      var idYearFacets = $("#idYearFacets").val();

      $.ajax({
        type: "POST",
        url: "controller/soap/getMakeFacets.php",
        data: {
          idYearFacets: idYearFacets
        },
        success: function(data) {
          var obj = JSON.parse(JSON.stringify(data));
          var count = 0;
          $('#idMakeFacets').empty();
          $('#idModelFacets').empty();

          $("#idMakeFacets").append("<option value='0' disabled selected>Seleccione Marca</option>");
          $("#idModelFacets").append("<option value='0' disabled selected>Seleccione Modelo</option>");


          obj.forEach(element => {
            $("#idMakeFacets").append("<option value='" + obj[count].makeId + "'>" + obj[count].makeName + "</option>");
            count++;
          });
          $("#idMakeFacets").prop("disabled", false);
        }
      });
    }

    function loadModelFacets() {

      var idYearFacets = $("#idYearFacets").val();
      var idMakeFacets = $("#idMakeFacets").val();

      $.ajax({
        type: "POST",
        url: "controller/soap/getModelFacets.php",
        data: {
          idMakeFacets: idMakeFacets,
          idYearFacets: idYearFacets
        },
        success: function(data) {
          var obj = JSON.parse(JSON.stringify(data));
          var count = 0;
          $('#idModelFacets').empty();
          $("#idModelFacets").append("<option value='0' disabled selected>Seleccione Modelo</option>");

          obj.forEach(element => {
            $("#idModelFacets").append("<option value='" + obj[count].baseVehicleId + "'>" + obj[count].modelName + " " + obj[count].subModelName + "</option>");
            count++;


          });
          $("#idModelFacets").prop("disabled", false);
        }
      });
    }

    function getAutoCareSearchResults() {

      var baseVehicleId = $("#idModelFacets").val();

      $.ajax({
        type: "GET",
        url: "controller/soap/getAutoCareSearchResults.php",
        data: {
          baseVehicleId: baseVehicleId
        },
        beforeSend: function() {
          Swal.fire({
            title: 'Cargando datos',
            allowEscapeKey: false,
            allowOutsideClick: false,
            timer: 3600000,
            showConfirmButton: false,
            willOpen: () => {
              swal.showLoading();
            }
          });

        },
        success: function(data) {


          var obj = JSON.parse(JSON.stringify(data));
          var count = 0;
          $('#formPreguntas').empty();
          $('#dataTableCatalogo').DataTable().clear();
          $('#dataTableCatalogo').DataTable().destroy();

          obj.forEach(element => {
            //$("#formPreguntas").append("<b>Parte " + (count + 1) + "</b>");
            /* $("#formPreguntas").append("<p><b> partNumber: </b>" + obj[count].partNumber +
               "<br><b> brandName: </b>" + obj[count].brandName +
               "<br><b> brandCode: </b>" + obj[count].brandCode +
               "<br><b> partTypeName: </b>" + obj[count].partTypeName +
               "<br><b> logo: </b>" + obj[count].logo +
               "<img src='" + obj[count].logo + "' class='float-left' alt='" + obj[count].brandName + "'>" +
               "<img src='" + obj[count].imageURL + "' class='float-left' alt='" + obj[count].partNumber + "'>" +
               //"<br><b> quantityOfEaches: </b>" + obj[count].quantityOfEaches +
               //"<br><b> uomCode: </b>" + obj[count].uomCode +
               //"<br><b> length: </b>" + obj[count].length +
               //"<br><b> height: </b>" + obj[count].height +
               //"<br><b> width: </b>" + obj[count].width +
               "<br><b> imageURL: </b>" + obj[count].imageURL + "<br>" +
               "</p>");*/


            $("#formPreguntas").append(
              "<tr>" +
              "<td scope='row' style='text-align-last: center; vertical-align: middle;'>" +
              (count + 1) +
              "</td>" +
              "<td scope='row' style='text-align-last: center; vertical-align: middle;'>" +
              "<img class='img_marcas mx-auto d-block img-thumbnail figure-img' src='" + obj[count].imageURL + "' onerror='this.src=" + "'assets/media/img/loader/PlaceholderCatalogo.png'" + ";' style='height: 65px;'>" +
              "</td>" +
              "<td scope='row' style='text-align-last: center; vertical-align: middle;'>" +
              "<img class='img_marcas mx-auto d-block img-thumbnail figure-img' src='" + obj[count].logo + "' onerror='this.src=" + "'assets/media/img/loader/PlaceholderCatalogo.png'" + ";' style='height: 65px;'>" +
              "</td>" +
              "<td scope='row' style='text-align-last: left; vertical-align: middle;'>" +
              "<p>" +
              "<b>Parte: </b>" + obj[count].partNumber +
              "<br>" +
              "<b>Tipo: </b>" + obj[count].partTypeName +
              "</p>" +
              "</td>" +
              "<td scope='row' style='text-align-last: center; vertical-align: middle;'>" +
              "<button type='button' class='btn btn-light'><i class='fas fa-car-side'></i> Aplicaciones</button>" +
              "<button type='button' class='btn btn-light'><i class='fas fa-info-circle'></i> Detalles</button>" +
              "<button type='button' class='btn btn-light'><i class='fas fa-link'></i> </button>" +
              "</td>" +
              "</tr>"
            );
            count++;
          });
        },
        complete: function(data) {
          loadTable();
          Swal.close();
        }
      });
    }


    function loadTable() {

      $('#dataTableCatalogo').DataTable({
        "language": {
          "sProcessing": "Procesando...",
          "sLengthMenu": "Mostrar _MENU_ partes",
          "sZeroRecords": "No se encontraron resultados",
          "sEmptyTable": "Ningún dato disponible en esta tabla",
          "sInfo": "Mostrando  _START_ a _END_ partes de un total de _TOTAL_ partes",
          "sInfoEmpty": "Sin partes que mostrar",
          "sInfoFiltered": "(filtrado de un total de _MAX_ partes)",
          "sInfoPostFix": "",
          "sSearch": "Buscar:",
          "sUrl": "",
          "sInfoThousands": ",",
          "sLoadingRecords": "Cargando...",
          "oPaginate": {
            "sFirst": "<i class='fas fa-angle-double-left'></i>",
            "sLast": "<i class='fas fa-angle-double-right'></i>",
            "sNext": "<i class='fas fa-angle-right'></i>",
            "sPrevious": "<i class='fas fa-angle-left'></i>"
          },
          "oAria": {
            "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
          },
          "buttons": {
            "copy": "Copiar",
            "colvis": "Visibilidad"
          }
        }
      });

    }
  </script>


</body>

</html>


<?php


?>