<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <?php require_once('controller/common/header.php'); ?>


  <title>REFACCIONARIA ARBOLEDAS | Sistemas</title>
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
      <div class="container justify-content-center align-items-center text-center mt-5 mb-3 pt-3 pb-3">

        <div class="row mb-2 justify-content-center align-items-center text-center ocultar-sistemas">
          <!-- MOTOR -->
          <div class="col">
            <button value="MOTOR" class="btn_sistema border bg-white shadow-lg" type="button">
              <img src="assets/media/img/iconos/IconoMotor.png" onContextMenu='return false;' draggable='false' style="height: 100%; width: 100%;">
            </button>
          </div>
          <!-- ENCENDIDO -->
          <div class="col">
            <button value="ENCENDIDO" class="btn_sistema border bg-white shadow-lg" type="button">
              <img src="assets/media/img/iconos/IconoEncendido.png" onContextMenu='return false;' draggable='false' style="height: 100%; width: 100%;">
            </button>
          </div>
          <!-- SUSPENSION -->
          <div class="col">
            <button value="SUSPENSIÓN Y DIRECCIÓN" class="btn_sistema border bg-white shadow-lg" type="button">
              <img src="assets/media/img/iconos/IconoSuspension.png" onContextMenu='return false;' draggable='false' style="height: 100%; width: 100%;">
            </button>
          </div>
          <!-- EMBRAGUE -->
          <div class="col">
            <button value="EMBRAGUE Y CARDÁN" class="btn_sistema border bg-white shadow-lg" type="button">
              <img src="assets/media/img/iconos/IconoEmbrague.png" onContextMenu='return false;' draggable='false' style="height: 100%; width: 100%;">
            </button>
          </div>
          <!-- FRENOS -->
          <div class="col">
            <button value="FRENOS" class="btn_sistema border bg-white shadow-lg" type="button">
              <img src="assets/media/img/iconos/IconoFrenos.png" onContextMenu='return false;' draggable='false' style="height: 100%; width: 100%;">
            </button>
          </div>
          <!-- TRANSMISION -->
          <div class="col">
            <button value="TRANSMISIÓN Y EJES" class="btn_sistema border bg-white shadow-lg" type="button">
              <img src="assets/media/img/iconos/IconoTransmision.png" onContextMenu='return false;' draggable='false' style="height: 100%; width: 100%;">
            </button>
          </div>
          <!-- GASOLINA -->
          <div class="col">
            <button value="GASOLINA" class="btn_sistema border bg-white shadow-lg" type="button">
              <img src="assets/media/img/iconos/IconoGasolina.png" onContextMenu='return false;' draggable='false' style="height: 100%; width: 100%;">
            </button>
          </div>
          <!-- ENFRIAMIENTO -->
          <div class="col">
            <button value="ENFRIAMIENTO" class="btn_sistema border bg-white shadow-lg" type="button">
              <img src="assets/media/img/iconos/IconoEnfriamiento.png" onContextMenu='return false;' draggable='false' style="height: 100%; width: 100%;">
            </button>
          </div>
          <!-- MISCELÁNEOS -->
          <div class="col">
            <button value="MISCELÁNEOS" class="btn_sistema border bg-white shadow-lg" type="button">
              <img src="assets/media/img/iconos/IconoMiscelaneos.png" onContextMenu='return false;' draggable='false' style="height: 100%; width: 100%;">
            </button>
          </div>
          <!-- QUIMICOS -->
          <div class="col">
            <button value="QUÍMICOS" class="btn_sistema border bg-white shadow-lg" type="button">
              <img src="assets/media/img/iconos/IconoQuimicos.png" onContextMenu='return false;' draggable='false' style="height: 100%; width: 100%;">
            </button>
          </div>
        </div>

        <div class="row row-cols-5 mb-3 justify-content-center align-items-center text-center ocultar-sistemas-movil">
          <!-- MOTOR -->
          <div class="col">
            <button value="MOTOR" class="btn_sistema border bg-white shadow-lg mini_btn" type="button">
              <img src="assets/media/img/iconos/IconoMotor.png" onContextMenu='return false;' draggable='false'>
            </button>
          </div>
          <!-- ENCENDIDO -->
          <div class="col">
            <button value="ENCENDIDO" class="btn_sistema border bg-white shadow-lg mini_btn" type="button">
              <img src="assets/media/img/iconos/IconoEncendido.png" onContextMenu='return false;' draggable='false'>
            </button>
          </div>
          <!-- SUSPENSION -->
          <div class="col">
            <button value="SUSPENSIÓN Y DIRECCIÓN" class="btn_sistema border bg-white shadow-lg mini_btn" type="button">
              <img src="assets/media/img/iconos/IconoSuspension.png" onContextMenu='return false;' draggable='false'>
            </button>
          </div>
          <!-- EMBRAGUE -->
          <div class="col">
            <button value="EMBRAGUE Y CARDÁN" class="btn_sistema border bg-white shadow-lg mini_btn" type="button">
              <img src="assets/media/img/iconos/IconoEmbrague.png" onContextMenu='return false;' draggable='false'>
            </button>
          </div>
          <!-- FRENOS -->
          <div class="col">
            <button value="FRENOS" class="btn_sistema border bg-white shadow-lg mini_btn" type="button">
              <img src="assets/media/img/iconos/IconoFrenos.png" onContextMenu='return false;' draggable='false'>
            </button>
          </div>
          <!-- TRANSMISION -->
          <div class="col">
            <button value="TRANSMISIÓN Y EJES" class="btn_sistema border bg-white shadow-lg mini_btn" type="button">
              <img src="assets/media/img/iconos/IconoTransmision.png" onContextMenu='return false;' draggable='false'>
            </button>
          </div>
          <!-- GASOLINA -->
          <div class="col">
            <button value="GASOLINA" class="btn_sistema border bg-white shadow-lg mini_btn" type="button">
              <img src="assets/media/img/iconos/IconoGasolina.png" onContextMenu='return false;' draggable='false'>
            </button>
          </div>
          <!-- ENFRIAMIENTO -->
          <div class="col">
            <button value="ENFRIAMIENTO" class="btn_sistema border bg-white shadow-lg mini_btn" type="button">
              <img src="assets/media/img/iconos/IconoEnfriamiento.png" onContextMenu='return false;' draggable='false'>
            </button>
          </div>
          <!-- MISCELÁNEOS -->
          <div class="col">
            <button value="MISCELÁNEOS" class="btn_sistema border bg-white shadow-lg mini_btn" type="button">
              <img src="assets/media/img/iconos/IconoMiscelaneos.png" onContextMenu='return false;' draggable='false'>
            </button>
          </div>
          <!-- QUIMICOS -->
          <div class="col">
            <button value="QUÍMICOS" class="btn_sistema border bg-white shadow-lg mini_btn" type="button">
              <img src="assets/media/img/iconos/IconoQuimicos.png" onContextMenu='return false;' draggable='false'>
            </button>
          </div>
        </div>
        <!-- Buscar -->
        <div class="row px-3 g-0">
          <div class="col-sm-12 col-lg-11 mb-3">
            <div class="form-floating">
              <input type="text" class="form-control" id="txtBuscar" placeholder="Buscar sistema, marca o parte:" onkeyup="getBusqueda()">
              <label for="floatingSelect"><i class="fas fa-search"></i> Buscar:</label>
            </div>
          </div>
          <div class="d-grid gap-2 col-lg-1 col-sm-12 mb-3">
            <button type="button" class="btn btn-danger" onclick="getBusqueda()"><i class="fas fa-search"></i></button>
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


<script type="text/javascript" src="assets/js/js_sistemas.js"></script>

</html>