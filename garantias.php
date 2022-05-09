<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <?php require_once('controller/common/header.php'); ?>

  <title>REFACCIONARIA ARBOLEDAS | Detalles de Marcas</title>
</head>

<body>
  <div id="wrapper">

    <!-- Nav Menu-->
    <?php require('controller/common/nav_menu.php'); ?>
    <!-- titulo -->
    <div class="container menus rounded">
      <h2 class="mitr" id="titulo">Garantias</h2>
    </div>

    <section>
      <div class="container mt-5 mb-3">
        <!-- Marcas -->
        <div id="item_marcas" class="small row mt-5 mb-3 row-cols-lg-4 row-cols-sm-2 justify-content-center align-items-center">
          <!-- /Marcas -->

        </div>
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
      url: "controller/garantias/precarga_garantias.php",
      type: "post",
      data: {
        Rs: busqueda
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