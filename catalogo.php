<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <?php require_once('controller/common/header.php'); ?>

  <title>Refaccionaria Arboledas | Catálogo</title>
</head>

<body>
  <div id="wrapper">

    <!-- Nav Menu-->
    <?php require('controller/common/nav_menu.php'); ?>
    <!-- titulo -->
    <div class="container menus rounded">
      <h2 class="mitr">CATÁLOGO</h2>
    </div>

    <section>
      <div class="container mt-5 mb-3">


        <!-- Buscar -->


        <div class="row mb-3 g-0">
          <div class="col-sm-12 col-lg-11 mb-3">
            <div class="form-floating">
              <input type="text" class="form-control" id="txtBuscar" placeholder="Buscar catalogo:" onkeyup="getBusqueda()">
              <label for="floatingSelect"><i class="fas fa-search"></i> Buscar catalogo:</label>
            </div>
          </div>

          <div class="d-grid gap-2 col-lg-1 col-sm-12 mb-3">
            <button type="button" class="btn btn-lg btn-danger" onclick="getBusqueda()"><i class="fas fa-search"></i></button>
          </div>
        </div>


        <div class="justify-content-center align-items-center" style="min-height: 70vh;">
          <!-- Cards -->
          <div class="cards-deck" id="item_catalogo"></div>
          <!-- /Cards -->
        </div>
      </div>
    </section>

    <section>
      <div class="container mt-5 mb-3">

        <div class="container menus rounded">
          <h2 class="mitr">CATÁLOGO EN LÍNEA</h2>
        </div>

        <div class="justify-content-center align-items-center mt-5" style="min-height: 70vh;">
          <!-- Cards -->
          <div class="row justify-content-center align-items-center" id="item_catalogo_web"></div>
          <!-- /Cards -->
        </div>
      </div>
    </section>
  </div>

  <?php require('controller/common/footer.php'); ?>

</body>

</html>

<script>
  $(document).ready(function() {
    getBusqueda();
    showCatalogoWeb();
  });

  function getBusqueda() {
    var busqueda = $("#txtBuscar").val();

    $.ajax({
      url: "controller/catalogo/precarga.php",
      type: "post",
      data: {
        Rs: busqueda
      },
      beforeSend: function() {
        //imagen de carga
        $("#item_catalogo").html("<img src='assets/media/img/loader/loader.gif'>");
      },
      error: function() {
        alert("error petición ajax");
      },
      success: function(data) {
        $("#item_catalogo").empty();
        $("#item_catalogo").append(data);
      }
    });
  }

  function showCatalogoWeb() {

    $.ajax({
      url: "controller/catalogo/precarga_online.php",
      type: "post",
      beforeSend: function() {
        //imagen de carga
        $("#item_catalogo_web").html("<img src='assets/media/img/loader/loader.gif'>");
      },
      error: function() {
        alert("error petición ajax");
      },
      success: function(data) {
        $("#item_catalogo_web").empty();
        $("#item_catalogo_web").append(data);
      }
    });
  }
</script>