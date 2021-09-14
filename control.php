<?php include "controller/conexion.php"; ?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <?php require_once('controller/common/header.php'); ?>

  <title>Refaccionaria Arboledas | Configuración</title>
</head>

<body>
  <div id="wrapper">

    <!-- titulo -->
    <div class="container menus rounded mt-5">
      <h2 class="mitr">CONFIGURACIÓN</h2>
    </div>

    <section>
      <div class="container mt-5 mb-3">
        <div class="justify-content-center align-items-center">

          <div class="d-flex align-items-start">
            <div class="nav flex-column nav-pills me-3 bg-white shadow-lg" id="v-pills-tab" role="tablist" aria-orientation="vertical">
              <button class="nav-link active" id="v-pills-catalogos-tab" data-bs-toggle="pill" data-bs-target="#v-pills-catalogos" type="button" role="tab" aria-controls="v-pills-catalogos" aria-selected="true">CATALOGOS</button>
              <button class="nav-link" id="v-pills-marcas-tab" data-bs-toggle="pill" data-bs-target="#v-pills-marcas" type="button" role="tab" aria-controls="v-pills-marcas" aria-selected="false">MARCAS</button>
              <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">SISTEMAS</button>
              <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">PRODUCTOS</button>
              <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">PREGUNTAS</button>
              <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">DIRECTORIO</button>
              <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">NOSOTROS</button>
              <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">BANNERS</button>
              <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">AVISOS</button>




            </div>
            <div class="tab-content" id="v-pills-tabContent" style="width: 100%;">
              <div class="tab-pane fade show active" id="v-pills-catalogos" role="tabpanel" aria-labelledby="v-pills-catalogos-tab">
                <?php include('controller/catalogo/config.php'); ?>
              </div>
              <div class="tab-pane fade" id="v-pills-marcas" role="tabpanel" aria-labelledby="v-pills-marcas-tab">
                a
              </div>
              <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">...</div>
              <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">...</div>
            </div>
          </div>


        </div>
      </div>
    </section>

  </div>

</body>



</html>