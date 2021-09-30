<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <?php require_once('controller/common/header.php'); ?>

  <title>Refaccionaria Arboledas | Detalles de Marcas</title>
</head>

<body>
  <div id="wrapper">

    <!-- Nav Menu-->
    <?php require('controller/common/nav_menu.php'); ?>
    <!-- titulo -->
    <div class="container menus rounded">
      <h2 class="mitr" id="titulo">Refaccionaria Arboledas</h2>
    </div>


    <section>
      <div class="container mt-5 mb-3">
        <div class="card">
          <div class="card-body bg-white">
            <div class="row">
              <div class="col-lg-4">
                <div class="row">
                  <div class="col-lg-12 mb-2">
                    <img class="mx-auto d-block img-thumbnail img_marca_detalle" src="assets/media/img/loader/PlaceholderWeb.png" onerror="this.src='assets/media/img/loader/PlaceholderWeb.png';" style="width: 310px; height: 160px;">
                  </div>
                  <div class="col-lg-12 mb-2 text-center">
                    <p id="txt_detalle">Refaccionaria Arboledas</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-8">
                <h4 class="mitr">GARANTIAS</h4>
                <div class="row border-bottom mb-2 mt-2">
                  <div class="col-10">
                    <h3><i class="fas fa-file-pdf"></i> Ejemplo archivo</h3>
                  </div>
                  <div class="col-2 text-end">
                    <h3><a href=""><i class="fas fa-download"></i></a></h3>
                  </div>
                </div>
                <div class="row border-bottom mb-2 mt-2">
                  <div class="col-10">
                    <h3><i class="fas fa-file-pdf"></i> Ejemplo archivo</h3>
                  </div>
                  <div class="col-2 text-end">
                    <h3><a href=""><i class="fas fa-download"></i></a></h3>
                  </div>
                </div>
                <div class="row border-bottom mb-2 mt-2">
                  <div class="col-10">
                    <h3><i class="fas fa-file-pdf"></i> Ejemplo archivo</h3>
                  </div>
                  <div class="col-2 text-end">
                    <h3><a href=""><i class="fas fa-download"></i></a></h3>
                  </div>
                </div>
              </div>
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
    var x = location.search;
    var Rs = x.substring(x.lastIndexOf('=') + 1);

    $.ajax({
      url: "controller/marcas/precarga_detalle.php",
      type: "post",
      data: {
        Rs: Rs
      },
      error: function() {
        alert("error petición ajax");
      },
      success: function(data) {
        var obj = JSON.parse(data);
        if (obj.status == "ok") {
          $(".img_marca_detalle").attr("src", "assets/media/img/marcas/" + obj.img_marca);
          $('#titulo').html(obj.nombre_marca);
          $("#txt_detalle").html(obj.info_marca);
        } 
      }
    });
  });
</script>