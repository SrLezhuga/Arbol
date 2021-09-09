<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <?php require_once('controller/common/header.php'); ?>

  <title>Refaccionaria Arboledas | Sistemas</title>
</head>

<body>
  <div id="wrapper">

    <!-- Nav Menu-->
    <?php require('controller/common/nav_menu.php'); ?>
    <!-- titulo -->
    <div class="container menus rounded">
      <h2 class="mitr">SISTEMAS</h2>
    </div>

    <section>
      <div class="container rounded bg-white shadow-lg justify-content-center align-items-center text-center mt-5 mb-3 pt-3 pb-3">

        <div class="row bg-white mb-3 justify-content-center align-items-center text-center">
          <!-- MOTOR -->
          <div class="col">
            <button value="MOTOR" class="btn_sistema border-0 bg-white" type="button">
              <img src="assets/media/img/iconos/IconoMotor.png" onContextMenu='return false;' draggable='false' style="height: auto; width: 50px;">
            </button>
          </div>
          <!-- ENCENDIDO -->
          <div class="col">
            <button value="ENCENDIDO" class="btn_sistema border-0 bg-white" type="button">
            <img src="assets/media/img/iconos/IconoEncendido.png" onContextMenu='return false;' draggable='false' style="height: auto; width: 50px;">
            </button>
          </div>
          <!-- SUSPENSION -->
          <div class="col">
            <button value="SUSPENSIÓN" class="btn_sistema border-0 bg-white" type="button">
            <img src="assets/media/img/iconos/IconoSuspension.png" onContextMenu='return false;' draggable='false' style="height: auto; width: 50px;">
            </button>
          </div>
          <!-- EMBRAGUE -->
          <div class="col">
            <button value="EMBRAGUE" class="btn_sistema border-0 bg-white" type="button">
            <img src="assets/media/img/iconos/IconoEmbrague.png" onContextMenu='return false;' draggable='false' style="height: auto; width: 50px;">
            </button>
          </div>
          <!-- FRENOS -->
          <div class="col">
            <button value="FRENOS" class="btn_sistema border-0 bg-white" type="button">
            <img src="assets/media/img/iconos/IconoFrenos.png" onContextMenu='return false;' draggable='false' style="height: auto; width: 50px;">
            </button>
          </div>
          <!-- TRANSMISION -->
          <div class="col">
            <button value="TRANSMISION" class="btn_sistema border-0 bg-white" type="button">
            <img src="assets/media/img/iconos/IconoTransmision.png" onContextMenu='return false;' draggable='false' style="height: auto; width: 50px;">
            </button>
          </div>
          <!-- GASOLINA -->
          <div class="col">
            <button value="GASOLINA" class="btn_sistema border-0 bg-white" type="button">
              <img src="assets/media/img/iconos/IconoMotor.png" onContextMenu='return false;' draggable='false' style="height: auto; width: 50px;">
            </button>
          </div>
          <!-- ENFRIAMIENTO -->
          <div class="col">
            <button value="ENFRIAMIENTO" class="btn_sistema border-0 bg-white" type="button">
              <img src="assets/media/img/iconos/IconoMotor.png" onContextMenu='return false;' draggable='false' style="height: auto; width: 50px;">
            </button>
          </div>
          <!-- MISCELÁNEOS -->
          <div class="col">
            <button value="MISCELÁNEOS" class="btn_sistema border-0 bg-white" type="button">
              <img src="assets/media/img/iconos/IconoMotor.png" onContextMenu='return false;' draggable='false' style="height: auto; width: 50px;">
            </button>
          </div>
          <!-- QUIMICOS -->
          <div class="col">
            <button value="QUIMICOS" class="btn_sistema border-0 bg-white" type="button">
              <img src="assets/media/img/iconos/IconoMotor.png" onContextMenu='return false;' draggable='false' style="height: auto; width: 50px;">
            </button>
          </div>
          <!-- Buscar -->
          <div class="row px-3 g-0">
            <div class="col-sm-12 col-lg-11 mb-3">
              <div class="form-floating">
                <input type="text" class="form-control" id="txtBuscar" placeholder="Buscar sistema, marca o parte:" onkeyup="getBusqueda()">
                <label for="floatingSelect"><i class="fas fa-search"></i> Buscar sistema, marca o parte:</label>
              </div>
            </div>
            <div class="d-grid gap-2 col-lg-1 col-sm-12 mb-3">
              <button type="button" class="btn btn-lg btn-danger" onclick="getBusqueda()"><i class="fas fa-search"></i></button>
            </div>
          </div>
        </div>




        <h2 class="mitr text-uppercase" id="txt_sistema">TODOS LOS SISTEMAS</h2>
        <div class="separator-top"></div>

        <div class="row mt-3 mb-5">
          <div class="col-12 overflow-auto" style="height: 70vh;">
            <div class="row justify-content-center align-items-center" id="item_sistemas">
              <!-- Sistemas -->
            </div>
          </div>
        </div>
      </div>
    </section>

  </div>

  <?php require('controller/common/footer.php'); ?>

</body>



</html>


<script>
  $(document).ready(function() {
    showSistemas();
  });

  function getBusqueda() {
    var busqueda = $("#txtBuscar").val();

    $.ajax({
      url: "controller/sistemas/busqueda.php",
      type: "post",
      data: {
        Rs: busqueda
      },
      beforeSend: function() {
        //imagen de carga
        $("#item_sistemas").html("<div class='col-6'><img class='mx-auto d-block' src='assets/media/img/loader/spinning.gif'></div>");
      },
      error: function() {
        alert("error petición ajax");
      },
      success: function(data) {
        setTimeout(function() {
          $("#item_sistemas").empty();
          $("#item_sistemas").append(data);
          if (!busqueda) {
            $("#txt_sistema").html("TODOS LOS SISTEMAS");
          } else {
            $("#txt_sistema").html("Resultado de " + busqueda);
          }
        }, 250);
      }
    });
  }

  $('.btn_sistema').on('click', function() {
    var id_button = $(this).val();
    getSistema(id_button);
  });

  function getSistema(busqueda) {

    $.ajax({
      url: "controller/sistemas/busqueda.php",
      type: "post",
      data: {
        Rs: busqueda
      },
      beforeSend: function() {
        //imagen de carga
        $("#item_sistemas").html("<div class='col-6'><img class='mx-auto d-block' src='assets/media/img/loader/spinning.gif'></div>");
      },
      error: function() {
        alert("error petición ajax");
      },
      success: function(data) {
        setTimeout(function() {
          $("#item_sistemas").empty();
          $("#item_sistemas").append(data);
          if (!busqueda) {
            $("#txt_sistema").html("TODOS LOS SISTEMAS");
          } else {
            $("#txt_sistema").html("Sistema de " + busqueda);
          }
          $("#txtBuscar").val('');
        }, 250);
      }
    });
  }

  function showSistemas() {

    $.ajax({
      url: "controller/sistemas/precarga.php",
      type: "post",
      beforeSend: function() {
        //imagen de carga
        $("#item_sistemas").html("<div class='col-6'><img class='mx-auto d-block' src='assets/media/img/loader/spinning.gif'></div>");
      },
      error: function() {
        alert("error petición ajax");
      },
      success: function(data) {
        setTimeout(function() {
          $("#item_sistemas").empty();
          $("#item_sistemas").append(data);
        }, 250);
      }
    });
  }
</script>