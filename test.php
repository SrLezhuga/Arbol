<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <?php require_once('controller/common/header.php'); ?>

  <title>REFACCIONARIA ARBOLEDAS | Inicio</title>
</head>

<body>
  <div class="container bg-white border mb-3 mt-5">
 
    <!-- Auto -->
    <div class="row">
      <div class="col-10 mb-3 mt-3">
        <div class="input-group">
          <span class="input-group-text"><i class="fas fa-tools"></i></span>
          <input class="form-control form-control-sm" type="text" placeholder="Auto / Parte" name="idSearchQuery" id="idSearchQuery">
        </div>
      </div>
      <div class="col-2 mb-3 mt-3">
        <div class="d-grid gap-2">
          <button type="button" onclick="searchQuery()" class="btn btn-danger btn-sm"> <i class="fas fa-search"></i> Buscar</button>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-3 col-sm-12 mb-3 mt-3">
        <select name="idVehicleYear" id="idVehicleYear" class="mi-selector custom-select form-control" onchange="loadVehicleMakes()" disabled>
          <option value="0" selected disabled>Seleccione Año</option>
        </select>
      </div>
      <div class="col-lg-3 col-sm-12 mb-3 mt-3">
        <select name="idVehicleMake" id="idVehicleMake" class="mi-selector custom-select form-control" onchange="loadVehicleModels()" disabled>
          <option value="0" selected disabled>Seleccione Marca</option>
        </select>
      </div>
      <div class="col-lg-3 col-sm-12 mb-3 mt-3">
        <select name="idVehicleModel" id="idVehicleModel" class="mi-selector custom-select form-control" disabled>
          <option value="0" selected disabled>Seleccione Modelo</option>
        </select>
      </div>
      <div class="col-lg-3 col-sm-12 mb-3 mt-3">

        <div class="d-grid gap-2 ">
          <button type="button" onclick="getMultiformatSearchResults()" class="btn btn-danger btn-sm"> <i class="fas fa-search"></i> Buscar</button>
        </div>
      </div>


    </div>
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
          <tr>
            <td scope='row' style='text-align-last: center; vertical-align: middle;'>
              0
            </td>
            <td scope='row' style='text-align-last: center; vertical-align: middle;'>
              <img class='mx-auto d-block figure-img' alt='Refaccionaria Arboledas' src='assets/media/img/loader/PlaceholderCatalogo.png' style='max-width: 100px; max-height: 100px;'>

            </td>
            <td scope='row' style='text-align-last: center; vertical-align: middle;'>
              <img class='mx-auto d-block figure-img' src='assets/media/img/loader/PlaceholderCatalogo.png' style='max-width: 100px; max-height: 100px;'>

            </td>
            <td scope='row' style='text-align-last: left; vertical-align: middle;'>
              <p>
                <b>Parte: </b>
                <br>
                <b>Tipo: </b>
              </p>
            </td>
            <td scope='row' style='text-align-last: center; vertical-align: middle;'>
              <button type='button' class='btn btn-light' disabled><i class='fas fa-car-side'></i> Compatibilidad</button>
              <button type='button' class='btn btn-light' disabled><i class='fas fa-info-circle'></i> Detalles</button>
              <button type='button' class='btn btn-light' disabled><i class='fas fa-link'></i> </button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <!-- DataTales End -->

  </div>

  <!-- Modal -->
  <div class="modal fade" id="modalAutoCareApplication" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modalAutoCareApplicationLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content" style="background-color: #fff !important;">
        <div class="modal-header">
          <h5 class="modal-title" id="modalAutoCareApplicationLabel">
            <legend class="w-auto">Compatibilidad:</legend>
          </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="top: 1rem; position: absolute; right: 1rem; z-index: 100;"></button>

        </div>
        <div class="modal-body">

          <ol class="list-group" id="getApplication">
            <li class=" d-flex justify-content-between align-items-start">
              <div class="ms-2 me-auto">
                <p class="h4 fw-bold mb-0"><i class='fas fa-car-side'></i> Subheading</p>
                <p class="text-danger h6 mb-0">Cras justo odio</p>
                <p class="text-muted h6 small mb-0">
                  2000
                  2001
                  2010
                </p>
              </div>
            </li>
          </ol>

        </div>
      </div>
    </div>
  </div>

  <style>
    .zoom-image-container {

      position: relative;
      top: 50%;
      left: 50%;
      transform: translate(-50%, 0%);

    }

    .zoom-image {

      position: relative;

    }

    .zoom-image img {

      cursor: none;

      border-radius: 5px;
      box-shadow: 0 18px 5px -15px rgba(0, 0, 0, .5);

    }

    .hover-image {

      position: fixed;
      width: 300px;
      height: 300px;

      border-radius: 50%;

      transform: translate(-50%, -20%);

      pointer-events: none;

      box-shadow: 0 0 10px rgba(0, 0, 0, .5);

    }
  </style>

  <script>
    jQuery(document).ready(function($) {

      $('.zoom-image img').click(function(event) {
        var ix = $(this).offset().left;
        var iy = $(this).offset().top;
        console.log(ix + '-' + iy);

        var mx = event.pageX;
        var my = event.pageY;
        console.log(mx + '-' + my);
      })

      $('.zoom-image img').hover(function() {

        var img = $(this).attr('src');

        $(this).after("<div class='hover-image' style='background-image: url(" + img + "); background-size: 1000px;'></div>");

        $(this).mousemove(function(event) {

          // Mouse Position
          var mx = event.pageX;
          var my = event.pageY;

          // Image Position
          var ix = $(this).offset().left;
          var iy = $(this).offset().top;

          // Mouse Position Relavtive to Image
          var x = mx - (ix);
          var y = my - (iy);

          // Image Height and Width
          var w = $(this).width();
          var h = $(this).height();

          // Mouse Position Relative to Image, in %
          var xp = (-x / w) * -100;
          var yp = (-y / h) * -100;

          $(this).parent().find('.hover-image').attr('style',

            "background-image: url(" + img + "); background-size: 1200px; background-repeat: no-repeat; background-position: " + xp + "% " + yp + "%; top: " + y + "px; left: " + x + "px;");

        });

      }, function() {

        $(this).parent().find('.hover-image').remove();

      });

    });
  </script>

  <!-- Modal -->
  <div class="modal fade" id="detallesModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="detallesModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content" style="background-color: #fff !important;">
        <div class="modal-header">
          <h4 class="modal-title" id="detallesModalLabel"> <b>Detalles de Parte: </b> 510</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <!-- Imagenes -->

          <div id="carouselExampleCaptions" class="carousel carousel-dark slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1">
                <img src="https://digital-assets.opticatonline.com/images/800/2c82bdde573efe7fc75bf41e1cc038b17520449a.jpg" class="d-block w-100">
              </button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2">
                <img src="https://digital-assets.opticatonline.com/images/800/782b923e2a02631f1010d8f43124c6bfb5ade0dc.jpg" class="d-block w-100">
              </button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3">
                <img src="https://digital-assets.opticatonline.com/images/800/f3ba9360b2534a68f059b9fc1954c994e00eb14e.jpg" class="d-block w-100">
              </button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4">
                <img src="https://digital-assets.opticatonline.com/images/800/b3f11c02fa6144a232635fafe7adce313eed31c3.jpg" class="d-block w-100">
              </button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4" aria-label="Slide 5">
                <img src="https://digital-assets.opticatonline.com/images/800/86fc63c72839ba9547283a11baad51638f867a23.jpg" class="d-block w-100">
              </button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="5" aria-label="Slide 6">
                <img src="https://digital-assets.opticatonline.com/images/800/7d9fd3ffabc4a5685a509bbcead44743eaf2f96c.jpg" class="d-block w-100">
              </button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">

                <div class="zoom-image-container">
                  <div class="zoom-image" data-image="https://digital-assets.opticatonline.com/images/800/2c82bdde573efe7fc75bf41e1cc038b17520449a.jpg">
                    <img width="450px" src="https://digital-assets.opticatonline.com/images/800/2c82bdde573efe7fc75bf41e1cc038b17520449a.jpg" />
                  </div>
                </div>

              </div>
              <div class="carousel-item">

                <div class="zoom-image-container">
                  <div class="zoom-image" data-image="https://digital-assets.opticatonline.com/images/800/782b923e2a02631f1010d8f43124c6bfb5ade0dc.jpg">
                    <img width="450px" src="https://digital-assets.opticatonline.com/images/800/782b923e2a02631f1010d8f43124c6bfb5ade0dc.jpg" />
                  </div>
                </div>

              </div>
              <div class="carousel-item">

                <div class="zoom-image-container">
                  <div class="zoom-image" data-image="https://digital-assets.opticatonline.com/images/800/f3ba9360b2534a68f059b9fc1954c994e00eb14e.jpg">
                    <img width="450px" src="https://digital-assets.opticatonline.com/images/800/f3ba9360b2534a68f059b9fc1954c994e00eb14e.jpg" />
                  </div>
                </div>

              </div>
              <div class="carousel-item">

                <div class="zoom-image-container">
                  <div class="zoom-image" data-image="https://digital-assets.opticatonline.com/images/800/b3f11c02fa6144a232635fafe7adce313eed31c3.jpg">
                    <img width="450px" src="https://digital-assets.opticatonline.com/images/800/b3f11c02fa6144a232635fafe7adce313eed31c3.jpg" />
                  </div>
                </div>

              </div>
              <div class="carousel-item">

                <div class="zoom-image-container">
                  <div class="zoom-image" data-image="https://digital-assets.opticatonline.com/images/800/86fc63c72839ba9547283a11baad51638f867a23.jpg">
                    <img width="450px" src="https://digital-assets.opticatonline.com/images/800/86fc63c72839ba9547283a11baad51638f867a23.jpg" />
                  </div>
                </div>

              </div>
              <div class="carousel-item">

                <div class="zoom-image-container">
                  <div class="zoom-image" data-image="https://digital-assets.opticatonline.com/images/800/7d9fd3ffabc4a5685a509bbcead44743eaf2f96c.jpg">
                    <img width="450px" src="https://digital-assets.opticatonline.com/images/800/7d9fd3ffabc4a5685a509bbcead44743eaf2f96c.jpg" />
                  </div>
                </div>

              </div>
            </div>
          </div>

          <!-- Detalles  -->
          <div class="d-grid gap-2">
            <a data-bs-toggle="collapse" href="#collapseDetalles" role="button" aria-expanded="false" aria-controls="collapseDetalles">
              <legend class="w-auto"><b><i class="fas fa-info-circle"></i> Detalles:</b></legend>
            </a>
          </div>

          <div class="collapse" id="collapseDetalles">
            <div class="card card-body">
              <p> <b> Marca:</b> MOOG Driveline Products
                <br> <b>Codigo de Parte:</b> 510
                <br> <b> Tipo: </b> Articulación, eje de transmisión
              </p>
              <a href="https://digital-assets.opticatonline.com/pdf/90ce7e0b19b5a6a4f38f787d26c01bc2bef44d31.pdf?response-content-disposition=inline%3Bfilename%3DMOOG+U-Joint+Premium+Bulletin-MG181069.pdf" target="_blank"><i class="fas fa-download"></i> Consultar PDF</a>
            </div>
          </div>

          <!-- Atributos  -->
          <div class="d-grid gap-2">
            <a data-bs-toggle="collapse" href="#collapseAtributos" role="button" aria-expanded="false" aria-controls="collapseAtributos">
              <legend class="w-auto"><b><i class="fas fa-ruler-combined"></i> Atributos:</b></legend>
            </a>
          </div>

          <div class="collapse" id="collapseAtributos">
            <div class="card card-body">
              <p><b>GTIN: </b>00080066082653
                <br><b>Cantidad por Empaque: </b> 1
                <br><b>Altura: </b> 1.2500 IN
                <br><b>Ancho: </b> 3.5000 IN
                <br><b>Largo: </b> 3.5000 IN
              </p>
            </div>
          </div>


          <!-- Intercambios  -->

          <div class="d-grid gap-2">
            <a data-bs-toggle="collapse" href="#collapseIntercambios" role="button" aria-expanded="false" aria-controls="collapseIntercambios">
              <legend class="w-auto"><b><i class="fas fa-ruler-combined"></i> Intercambios:</b></legend>
            </a>
          </div>

          <div class="collapse" id="collapseIntercambios">
            <div class="card card-body">
              <p> <b>Marca: </b> Autopar
                <br> <b>Codigo de Parte: </b> 0W00125060A
              </p>
            </div>
          </div>



          <!-- Proveedor  -->
          <div class="d-grid gap-2">
            <a data-bs-toggle="collapse" href="#collapseProveedor" role="button" aria-expanded="false" aria-controls="collapseProveedor">
              <legend class="w-auto"><b><i class="fas fa-star"></i> Proveedor:</b></legend>
            </a>
          </div>

          <div class="collapse" id="collapseProveedor">
            <div class="card card-body">
              <p> <b> Nombre:</b> MOOG Driveline Products
                <br> <b> Website: </b> <a href="https://www.moogparts.com/" target="_blank" rel="noopener noreferrer">https://www.moogparts.com/</a>
              </p>
            </div>
          </div>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger"><i class="fas fa-shopping-cart"></i> Comprar</button>
        </div>
      </div>
    </div>
  </div>



  <script>
    $(document).ready(function() {
      loadTable();
      loadVehicleYears();
      reset();
    });

    jQuery(document).ready(function($) {
      $(document).ready(function() {
        $('.mi-selector').select2();
      });
    });

    function reset() {

      $('#formPreguntas').empty();
      $('#dataTableCatalogo').DataTable().clear();
      $('#dataTableCatalogo').DataTable().destroy();

      for (i = 0; i < 10; i++) {
        $("#formPreguntas").append(
          "<tr>" +
          "<td scope='row' style='text-align-last: center; vertical-align: middle;'>" +
          i +
          "</td>" +
          "<td scope='row' style='text-align-last: center; vertical-align: middle;'>" +
          "<img class='img-thumbnail img_marcas mx-auto d-block figure-img' src='assets/media/img/loader/PlaceholderCatalogo.png' style='max-width: 100px; max-height: 100px;'>" +
          "</td>" +
          "<td scope='row' style='text-align-last: center; vertical-align: middle;'>" +
          "<img class='img_marcas mx-auto d-block figure-img' src='assets/media/img/loader/PlaceholderLogo.png' style='max-width: 100px; max-height: 100px; transform: rotateZ(-90deg);'>" +
          "</td>" +
          "<td scope='row' style='text-align-last: left; vertical-align: middle;'>" +
          "<p>" +
          "<b>Marca: </b>Refaccionaria Arboledas" +
          "<br>" +
          "<b>N° de parte: </b>WX-510" +
          "</p>" +
          "</td>" +
          "<td scope='row' style='text-align-last: center; vertical-align: middle;'>" +
          "<button type='button' class='btn btn-light' data-bs-toggle='modal' data-bs-target='#modalAutoCareApplication'><i class='fas fa-car-side'></i> Compatibilidad</button>" +
          "<button type='button' class='btn btn-light' data-bs-toggle='modal' data-bs-target='#detallesModal'><i class='fas fa-info-circle'></i> Detalles</button>" +
          "</td>" +
          "</tr>"
        );

      }
      loadTable();
    }

    function loadVehicleYears() {
      $.ajax({
        type: "POST",
        url: "controller/soap/getYearFacets.php",

        success: function(data) {
          var obj = JSON.parse(JSON.stringify(data));
          var count = 0;
          $('#idVehicleYear').empty();
          $('#idVehicleMake').empty();
          $('#idVehicleModel').empty();

          $("#idVehicleYear").append("<option value='0' disabled selected>Seleccione Año</option>");
          $("#idVehicleMake").append("<option value='0' disabled selected>Seleccione Marca</option>");
          $("#idVehicleModel").append("<option value='0' disabled selected>Seleccione Modelo</option>");

          $("#idVehicleMake").prop("disabled", true);
          $("#idVehicleModel").prop("disabled", true);

          obj.forEach(element => {
            $("#idVehicleYear").append("<option value='" + obj[count].year + "'>" + obj[count].year + "</option>");
            count++;
          });
          $("#idVehicleYear").prop("disabled", false);
        }
      });
    }

    function loadVehicleMakes() {
      var vehicleYear = $("#idVehicleYear").val();
      console.log(vehicleYear);

      $.ajax({
        type: "POST",
        url: "controller/soap/getMakeFacets.php",
        data: {
          vehicleYear: vehicleYear
        },
        success: function(data) {
          var obj = JSON.parse(JSON.stringify(data));
          console.log(obj);
          var count = 0;
          $('#idVehicleMake').empty();
          $('#idVehicleModel').empty();

          $("#idVehicleMake").append("<option value='0' disabled selected>Seleccione Marca</option>");
          $("#idVehicleModel").append("<option value='0' disabled selected>Seleccione Modelo</option>");

          $("#idVehicleModel").prop("disabled", true);

          obj.forEach(element => {
            $("#idVehicleMake").append("<option value='" + obj[count].makeId + "'>" + obj[count].makeName + "</option>");
            count++;
          });
          $("#idVehicleMake").prop("disabled", false);
        }
      });

    }

    function loadVehicleModels() {

      var vehicleMake = $("#idVehicleMake").val();
      var vehicleYear = $("#idVehicleYear").val();

      console.log(vehicleMake);

      $.ajax({
        type: "POST",
        url: "controller/soap/getModelFacets.php",
        data: {
          vehicleMake: vehicleMake,
          vehicleYear: vehicleYear
        },
        success: function(data) {

          var obj = JSON.parse(JSON.stringify(data));
          console.log(obj);
          var count = 0;
          $('#idVehicleModel').empty();

          $("#idVehicleModel").append("<option value='0' disabled selected>Seleccione Modelo</option>");

          obj.forEach(element => {
            $("#idVehicleModel").append("<option value='" + obj[count].baseVehicleId + "'>" + obj[count].modelName + " " + obj[count].subModelName + "</option>");
            count++;
          });

        }
      });

      $("#idVehicleModel").prop("disabled", false);
    }

    function getMultiformatSearchResults() {

      var baseVehicleId = $("#idVehicleModel").val();
      console.log(baseVehicleId);

      var txt_make = $("#idVehicleYear").find('option:selected').text();
      var txt_model = $("#idVehicleMake").find('option:selected').text();
      var txt_year = $("#idVehicleModel").find('option:selected').text();

      var busqueda = txt_make + " " + txt_model + " " + txt_year;
      console.log(busqueda);

      $.ajax({
        type: "POST",
        url: "controller/soap/getSearchResultsFacets.php",
        data: {
          baseVehicleId: baseVehicleId
        },
        beforeSend: function() {
          Swal.fire({
            title: 'Buscando refacciones para <b>' + busqueda + '</b>',
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

            $("#formPreguntas").append(
              "<tr>" +
              "<td scope='row' style='text-align-last: center; vertical-align: middle;'>" + obj[count].count +
              "</td>" +
              "<td scope='row' style='text-align-last: center; vertical-align: middle;'>" +
              "<img class='img-thumbnail mx-auto d-block figure-img' alt='" + obj[count].partNumber + "' src='" + obj[count].imageURL + "' onerror='this.src=" + "'assets/media/img/loader/PlaceholderCatalogo.png'" + ";' style='max-width: 100px; max-height: 100px;'>" +
              "<label style='display: none;'>" + obj[count].partNumber + "</label>" +
              "</td>" +
              "<td scope='row' style='text-align-last: center; vertical-align: middle;'>" +
              "<img class='mx-auto d-block figure-img'  alt='" + obj[count].brandName + "' src='" + obj[count].logo + "' onerror='this.src=" + "'assets/media/img/loader/PlaceholderLogo.png'" + ";' style='max-width: 100px; max-height: 100px; transform: rotateZ(-90deg);'>" +
              "<label style='display: none;'>" + obj[count].brandName + "</label>" +
              "</td>" +
              "<td scope='row' style='text-align-last: left; vertical-align: middle;'>" +
              "<p>" +
              "<b>Marca: </b>" + obj[count].brandName +
              "<br>" +
              "<b>N° de parte: </b>" + obj[count].partNumber +
              "</p>" +
              "</td>" +
              "<td scope='row' style='text-align-last: center; vertical-align: middle;'>" +
              "<button type='button' class='btn btn-light' onclick='getAplication(`" + obj[count].brandCode + "`,`" + obj[count].partNumber + "`,this)' data-toggle='modal' data-target='#modalAutoCareApplication' value='este es un valor'><i class='fas fa-car-side'></i> Compatibilidad</button>" +
              "<button type='button' class='btn btn-light' data-bs-toggle='modal' data-bs-target='#detallesModal'><i class='fas fa-info-circle'></i> Detalles</button>" +
              "</td>" +
              "</tr>"
            );
            count++;
          });
        },
        complete: function() {
          loadTable();
          Swal.close();
        }
      });
    }

    function searchQuery() {
      var textQuery = $("#idSearchQuery").val();
      console.log(textQuery);
      if (textQuery.length == 0) {
        Swal.fire("Mensaje de confirmación", "Campo de busqueda sin llenar", "error");
        return;
      }

      $.ajax({
        type: "POST",
        url: "controller/soap/getSearchResults.php",
        data: {
          textQuery: textQuery
        },
        beforeSend: function() {
          Swal.fire({
            title: 'Buscando "' + textQuery + '"',
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

            $("#formPreguntas").append(
              "<tr>" +
              "<td scope='row' style='text-align-last: center; vertical-align: middle;'>" + obj[count].count +
              "</td>" +
              "<td scope='row' style='text-align-last: center; vertical-align: middle;'>" +
              "<img class='img-thumbnail mx-auto d-block figure-img' alt='" + obj[count].partNumber + "' src='" + obj[count].imageURL + "' onerror='this.src=" + "'assets/media/img/loader/PlaceholderCatalogo.png'" + ";' style='max-width: 100px; max-height: 100px;'>" +
              "<label style='display: none;'>" + obj[count].partNumber + "</label>" +
              "</td>" +
              "<td scope='row' style='text-align-last: center; vertical-align: middle;'>" +
              "<img class='mx-auto d-block figure-img' alt='" + obj[count].brandName + "' src='" + obj[count].logo + "' onerror='this.src=" + "'assets/media/img/loader/PlaceholderLogo.png'" + ";' style='max-width: 100px; max-height: 100px; transform: rotateZ(-90deg);'>" +
              "<label style='display: none;'>" + obj[count].brandName + "</label>" +
              "</td>" +
              "<td scope='row' style='text-align-last: left; vertical-align: middle;'>" +
              "<p>" +
              "<b>Marca: </b>" + obj[count].brandName +
              "<br>" +
              "<b>N° de parte: </b>" + obj[count].partNumber +
              "</p>" +
              "</td>" +
              "<td scope='row' style='text-align-last: center; vertical-align: middle;'>" +
              "<button type='button' class='btn btn-light' onclick='getAplication(`" + obj[count].brandCode + "`,`" + obj[count].partNumber + "`,this)' data-toggle='modal' data-target='#modalAutoCareApplication' value='este es un valor'><i class='fas fa-car-side'></i> Compatibilidad</button>" +
              "<button type='button' class='btn btn-light' data-bs-toggle='modal' data-bs-target='#detallesModal'><i class='fas fa-info-circle'></i> Detalles</button>" +
              "</td>" +
              "</tr>"
            );
            count++;
          });
        },
        complete: function() {
          loadTable();
          Swal.close();
        }
      });
    }

    // Modal tarjeta cliente
    function getAplication(make, part) {

      console.log(make, part);
      $.ajax({
        type: "POST",
        url: "controller/soap/getPartApplications.php",
        data: {
          id_make: make,
          id_part: part
        },
        beforeSend: function() {
          Swal.fire({
            title: 'Buscando autos compatibles',
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
          console.log(data);
          var obj = JSON.parse(JSON.stringify(data));
          var count = 0;
          var subcount = 0;
          $('#getApplication').empty();
          obj.forEach(element => {
            if (obj[count].makeName) {
              $("#getApplication").append("<li class='d-flex justify-content-between align-items-start'>" +
                "<div class='ms-2 me-auto'>" +
                "<p class='h4 fw-bold mb-0'><i class='fas fa-car-side'></i> " + obj[count].makeName + "</p>" +
                "<p class='text-danger h6 mb-0'>" + obj[count].modelName + "</p>" +
                "<p class='text-muted h6 small mb-0'>" + obj[count].years + "</p>" +
                "</div>" +
                "</li>");
            }
            count++;
          });
        },
        complete: function() {
          var myModal = new bootstrap.Modal('#modalAutoCareApplication');

          myModal.show();
          Swal.close();
        }
      });

    }

    /* function getDetails(make, part) {

    }
*/
    function loadTable() {


      $('#dataTableCatalogo').DataTable({
        "scrollY": '55vh',
        "scrollCollapse": true,
        "stateSave": true,
        "searching": false,
        "paging": true,
        "ordering": true,
        "info": false,
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