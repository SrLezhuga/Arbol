<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <?php require_once('controller/common/header.php'); ?>

  <title>Refaccionaria Arboledas | Preguntas Frecuentes</title>
</head>

<body>
  <div id="wrapper">

    <!-- Nav Menu-->
    <?php require('controller/common/nav_menu.php'); ?>
    <!-- titulo -->
    <div class="container menus rounded">
      <h2 class="mitr">PREGUNTAS FRECUENTES</h2>
    </div>

    <section>
      <div class="container mt-5 mb-3">
        <div class="justify-content-center align-items-center">
          <!-- Preguntas -->
          <div class="accordion" id="accordionPreguntas"></div>
          <!-- /Preguntas -->
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
      url: "controller/preguntas/precarga.php",
      type: "post",
      data: {
        Rs: busqueda
      },
      error: function() {
        alert("error petición ajax");
      },
      success: function(data) {
        $("#accordionPreguntas").empty();
        $("#accordionPreguntas").append(data);
      }
    });
  });
</script>