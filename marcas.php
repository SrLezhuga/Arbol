<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <?php require_once('controller/common/header.php'); ?>

  <title>Refaccionaria Arboledas | Marcas</title>
</head>

<body class="d-flex flex-column h-100">

  <!-- Nav Menu-->
  <?php require('controller/common/nav_menu.php'); ?>
  <!-- titulo -->
  <div class="container menus rounded">
    <h2 class="mitr">MARCAS</h2>
  </div>

  <header>
    <div class="container mt-5 mb-3">
      <div class="row justify-content-center align-items-center text-center">
        <div class="col-12">
          <h2 class="mitr">MARCAS</h2>
          <div class="separator-top"></div>
        </div>
      </div>
    </div>
  </header>

  <section>
    <div class="container mt-5 mb-3">
      <!-- Carusel/slider marcas -->


      <div class="row g-4">
        <div class="col">



          <a data-bs-toggle="modal" data-bs-target="#staticBackdrop">




            <div class="card h-100 bg-white rounded shadow-lg">
              <img src="assets/media/img/marcas/WAGNER.png" class="card-img-top" alt="...">
              <div class="card-body" style="border-top: 3px solid #d41636; background-color: #d41636;">
                <h5 class="card-title text-white mitr">WAGNER</h5>
              </div>
            </div>
          </a>
        </div>
        <div class="col">
          <div class="card h-100">
            <div class="card-body">
              <p class="card-text">This is a short card.</p>

              <img src="..." class="card-img-top" alt="...">

              <h5 class="card-title">Card title</h5>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card h-100">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content.</p>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card h-100">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            </div>
          </div>
        </div>
      </div>







    </div>




    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">WAGNER</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            Deje que Wagner lo mantenga seguro en el camino con frenos de alta calidad. Wagner continúa entregando piezas de rendimiento superior durante más de 125 años.
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-times"></i> Cerrar</button>
          </div>
        </div>
      </div>
    </div>


  </section>



  <?php require('controller/common/footer.php'); ?>

</body>



</html>