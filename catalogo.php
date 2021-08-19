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
              <input type="text" class="form-control" id="txtBuscar" placeholder="Buscar catalogo:" onchange="getBusqueda()">
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
  </div>

  <?php require('controller/common/footer.php'); ?>

</body>

</html>

<script>
  $(document).ready(function() {
    getBusqueda();
  });

  function getBusqueda() {
    var busqueda = $("#txtBuscar").val();

    Swal.fire({
      title: 'Cargando datos',
      allowEscapeKey: false,
      allowOutsideClick: false,
      timer: 50000,
      showConfirmButton: false,
      willOpen: () => {
        swal.showLoading();
      }
    });

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
        swal.close();
      }
    });
  }

  function guardarDatos() {
    var sucursal = $("#formTiendaSuc").val();
    var dir = $("#direccion").val();
    var col = $("#colonia").val();
    var cp = $("#codigo_postal").val();
    var mun = $("#municipio").val();
    var cor = $("#correo").val();
    var tel = $("#telefono").val();
    var ho1 = $("#horario1").val();
    var ho2 = $("#horario2").val();
    var mpg = $("#mapgoogle").val();
    var mpc = $("#mapcel").val();

    $.ajax({
      url: "assets/controler/directorio/carga.php",
      type: "post",
      data: {
        Suc: sucursal,
        Dir: dir,
        Col: col,
        Cp: cp,
        Mun: mun,
        Cor: cor,
        Tel: tel,
        Ho1: ho1,
        Ho2: ho2,
        Mpg: mpg,
        Mpc: mpc
      },
      success: function(data) {
        if (data == 0) {
          Swal.fire(
            "Mensaje de confirmación",
            "Se actualizaron los datos de la sucursal.",
            "success"
          );
        } else {
          Swal.fire(
            "Mensaje de confirmación",
            "Error:" + data,
            "error"
          );
        }
      }
    });
  }
</script>