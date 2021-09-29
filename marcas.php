<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <?php require_once('controller/common/header.php'); ?>

  <title>Refaccionaria Arboledas | Marcas</title>
</head>

<body>
  <div id="wrapper">

    <!-- Nav Menu-->
    <?php require('controller/common/nav_menu.php'); ?>
    <!-- titulo -->
    <div class="container menus rounded">
      <h2 class="mitr">MARCAS</h2>
    </div>


    <section>
      <div class="container mt-5 mb-3">

        <div class="col-lg-3 col-md-4 col-sm-12">
          <div class="card h-100 overflow-hidden rounded">
            <a href="detalles?marca=4KAR">
              <img src="assets/media/img/marcas/4KAR.png" class="card-img-top imagen" alt="4KAR">
            </a>
          </div>
        </div>

        <!-- Carusel/slider marcas -->

        <!-- Marcas -->
        <div id="item_marcas" class="row g-4 justify-content-center align-items-center"></div>
        <!-- /Marcas -->

      </div>
    </section>
  </div>


  <?php require('controller/common/footer.php'); ?>

</body>



</html>

<script>
  $(document).ready(function() {
    var busqueda = 'ok';
    $.ajax({
      url: "controller/marcas/precarga.php",
      type: "post",
      data: {
        Rs: busqueda
      },
      beforeSend: function() {
        //imagen de carga
        $("#item_marcas").html("<div class='col-6'><img class='mx-auto d-block' src='assets/media/img/loader/spinning.gif'></div>");
      },
      error: function() {
        alert("error petición ajax");
      },
      success: function(data) {
        $("#item_marcas").empty();
        $("#item_marcas").append(data);
      }
    });
  });
</script>